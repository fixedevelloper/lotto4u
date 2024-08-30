<?php


namespace App\Http\Controllers;


use App\Helper\PaymentApiService;
use App\Models\GamePlay;
use App\Models\LottoFixture;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{

    protected $paymentApiService;

    /**
     * HomeController constructor.
     * @param $paymentApiService
     */
    public function __construct(PaymentApiService $paymentApiService)
    {
        $this->paymentApiService = $paymentApiService;
    }
    public function dashboard(Request $request)
    {
        $id=Session::get("id_connect");
        $user=User::query()->find($id);
        $address=Session::get("address_connect");
        return view('account.dashboard', [
            "address"=>$address,
            "id"=>$id,
            'route'=>"dashboard"
        ]);
    }
    public function settings(Request $request)
    {
        $address=Session::get("address_connect");
        return view('setting', [
            'route'=>"settings"
        ]);
    }
    public function bonus(Request $request)
    {

        return view('bonus', [
            'route'=>"bonus"
        ]);
    }
    public function deposit(Request $request)
    {
        $user=Auth::user();
        if ($request->method()=="POST"){
            $transaction=new Transaction();
            $transaction->user_id=$user->id;
            $transaction->method=$request->get("method");
            $transaction->idproof=$request->get("idproof");
            $transaction->type="deposit";
            $transaction->status="pending";
            $transaction->save();
            return redirect()->route("transaction");
        }
        return view('account.deposit', [
            'route'=>"deposit",
            "user"=>$user
        ]);
    }
    public function withdraw(Request $request)
    {
        $user=Auth::user();
        return view('withdraw', [
            'route'=>"withdraw",
            'user'=>$user
        ]);
    }
    public function withdrawPay(Request $request)
    {
        $user=Auth::user();
        if ($request->method()=="POST"){
            if (is_null($user)){
                flash()->error('Please loggedIn');
                return back();
            }
            if ($user->sold<$request->amount){
                flash()->error('Please loggedIn');
                return back();
            }
            $rest=$this->paymentApiService->withdraw([
                'phone'=>$request->phone,
                'amount'=>intval($request->amount),
                'country'=>$request->country,
                'carrier'=>$request->carrier
            ]);
            if ($rest['status']=='true'){
                DB::beginTransaction();
                $withdraw=new Withdraw();
                $withdraw->user_id=$user->id;
                $withdraw->amount=$request->amount;
                $withdraw->phone=$request->phone;
                $withdraw->reference=$rest['transactionId'];
                $withdraw->save();
                $user->sold-=$request->amount;
                $user->save();
                DB::commit();
            }else{
                flash()->error('Please Internal error');
                return back();
            }
            flash()->success('Operation Successfull');
            return redirect()->route('withdraw');
        }
        return view('withdraw_pay', [
            'route'=>"withdraw",
            'user'=>$user
        ]);
    }
    public function transaction(Request $request)
    {
        $user=Auth::user();
        if (is_null($request->get('date_end'))) {
            $begin = Carbon::today()->format('Y-m-d');
            $end = Carbon::today()->addDays(1)->format("Y-m-d");
        } else {
            $begin = $request->get('date_begin');
            $end = $request->get('date_end');
        }
        $transactions=Transaction::query()->where(['user_id'=>$user->id])
            ->whereBetween('created_at',[$begin,$end])->get();
        return view('account.transaction', [
            'route'=>"transaction",
            'transactions'=>$transactions,
            'end_date'=>$end,
            'begin_date'=>$begin
        ]);
    }
    public function myGame(Request $request)
    {
        if (is_null($request->get('date'))) {
            $date_ = Carbon::today()->format('Y-m-d');
            $timestamp = Carbon::today()->addDays(1)->format("Y-m-d h:i");
        } else {
            $date_ = $request->get('date');
            $timestamp = Carbon::parse($date_)->addDays(1)->format("Y-m-d h:i");
        }
        $user=Auth::user();
        $mygames=Payment::query()->where(['user_id'=>$user->id,'status'=>'success'])->whereBetween('created_at',[$date_,$timestamp])->get();
      //  $mygames=GamePlay::query()->where(['user_id'=>$user->id])->whereBetween('created_at',[$date_,$timestamp])->get();
        return view('mygame', [
            "user"=>$user,
            'mygames'=>$mygames,
            'route'=>"mygame",
            'date'=>$date_
        ]);
    }
    public function identity(Request $request)
    {
        $address=Session::get("address_connect");
        return view('account.identity', [
            "address"=>$address,
            'route'=>"dashboard"
        ]);
    }
    public function logout(Request $request)
    {
        Session::remove("address_connect");
        Session::remove("id_connect");
        return redirect("/");
    }
}
