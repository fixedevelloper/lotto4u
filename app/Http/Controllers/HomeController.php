<?php


namespace App\Http\Controllers;



use App\Helper\Helper;
use App\Helper\PaymentApi;
use App\Helper\PaymentApiService;
use App\Models\Contact;
use App\Models\Fixture;
use App\Models\GamePlay;
use App\Models\LottoFixture;
use App\Models\LottoFixtureItem;
use App\Models\Message;
use App\Models\Payment;
use App\Models\PlayingFixture;
use App\Models\RegisterOnline;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Flasher\Prime\Flasher;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\IpUtils;
use function Carbon\Traits\ne;
use function Ramsey\Uuid\Generator\timestamp;

class HomeController extends Controller
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

    public function home(Request $request)
    {  if (is_null($request->get('date'))) {
        $date_ = Carbon::today()->format('Y-m-d');
        $timestamp = Carbon::today()->getTimestamp();
    } else {
        $date_ = $request->get('date');
        $timestamp = Carbon::parse($date_)->getTimestamp();
    }
    $list=LottoFixture::query()->where('date_play','=',$date_)->orderByDesc('id')->limit(5)->get();
        return view('home', [
            "lotto_fixtures" => $list,
            'date' => $date_
        ]);
    }
    public function resultats(Request $request)
    {
        if (is_null($request->get('date'))) {
            $date_ = Carbon::yesterday()->format('Y-m-d');
            $timestamp = Carbon::today()->getTimestamp();
        } else {
            $date_ = $request->get('date');
            $timestamp = Carbon::parse($date_)->getTimestamp();
        }
        $list=LottoFixture::query()->where('date_play','=',$date_)->orderByDesc('id')->limit(5)->get();
        return view('all_results', [
            'date' => $date_,
            "lotto_fixtures" => $list,
        ]);
    }
    public function help(Request $request)
    {
        return view('help', [

        ]);
    }
    public function contact(Request $request)
    {
        return view('contact', [

        ]);
    }
    public function resultatDetail(Request $request, $id)
    {
        $lotto = LottoFixture::find($id);
        $list_items = LottoFixtureItem::query()->where(['lotto_fixture_id' => $id])->get();
        $is_then = Carbon::parse($lotto->end_date)->diffInMinutes(Carbon::today()) > 0;
        $games=Payment::query()
            ->leftJoin('game_plays','game_plays.id','=','payments.game_play_id')
            ->leftJoin('lotto_fixtures','lotto_fixtures.id','=','game_plays.lotto_fixture_id')
            ->where(['lotto_fixtures.id'=>$id,'status'=>'success'])->get(['game_plays.id','game_plays.user_id']);
        $winners = [];
        foreach ($games as $game) {
            $count = 0;
            $choices=[];
            $lists = PlayingFixture::query()->where(['game_play_id' => $game->id])->get();
            foreach ($lists as $list) {
                $fixture = Fixture::query()->firstWhere(['fixture_id' => $list->lotto_fixture_item->fixture_id]);
                if ($fixture->score_ft_home>$fixture->score_ft_away && $list->value == 1) {
                    $count++;
                } elseif ($fixture->score_ft_home<$fixture->score_ft_away && $list->value == 2) {
                    $count++;
                } elseif ($fixture->score_ft_home==$fixture->score_ft_away && $list->value == 3) {
                    $count++;
                }
            }
            $user=User::query()->find($game->user_id);
            $winners[] = [
                "game_id" => $game->id,
                "user" => $user->name,
                "user_id" => $user->id,
                "phone" => $user->phone,
                "count" => $count,
            ];
        }
        $count_items = LottoFixtureItem::query()->where(['lotto_fixture_id' => $id])->count();

        $winners=Helper::ccountWinner($winners,$count_items);

        return view('resultat-detail', [
            "list_items" => $list_items,
            "lotto" => $lotto,
            "is_then" => $is_then,
            'winners'=>$winners,
            'count_players'=>count($games)
        ]);

    }
    public function game(Request $request, $id)
    {
        $user = Auth::user();
        $lotto = LottoFixture::find($id);

        if (is_null($lotto)) {
            return redirect("/");
        }
        $is_then = 0;
        $data = LottoFixtureItem::query()->where(['lotto_fixture_id' => $id])->get();
        $now = new DateTime('now', new \DateTimeZone("Africa/Brazzaville"));
        $interval = new DateTime($lotto->end_time);
        if ($now->format("Y-m-d H:i") > $interval->format("Y-m-d H:i")) {
            $is_then = 1;
        }
        return view('game', [
            "fixtures" => $data,
            "user" => $user,
            "lotto" => $lotto,
            "is_then" => $is_then
        ]);

    }
    public function resultat(Request $request, $id)
    {
        $address = Session::get("address_connect");
        $lotto = LottoFixture::find($id);
        $data = LottoFixtureItem::query()->where(['lotto_fixture_id' => $id])->get();
        $is_then = Carbon::parse($lotto->end_date)->diffInMinutes(Carbon::today()) > 0;
        logger($lotto->end_date);
        return view('resultat', [
            "fixtures" => $data,
            "address" => $address,
            "lotto" => $lotto,
            "is_then" => $is_then
        ]);

    }
    public function about()
    {

        return view('about', [

        ]);
    }
    public function waitingpayment(Request $request)
    {
        $refer=Session::get('trans_ref');
        if ($request->method()=="POST"){
            if (isset($refer)){
                $rest=$this->paymentApiService->getPayID([
                    'transactionId'=>$refer,
                ]);
                logger($rest);
                if (isset($rest['id'])){
                    $payment=Payment::query()->firstWhere(['reference'=>$refer]);
                    if ($rest['status']=="Success"){
                        if ($payment->status!="success"){
                            $payment->status="success";
                            $payment->save();
                        }
                        flash()->success('Votre paiement pour la grille à été prise en compte');
                        return redirect()->route('mygame');
                    }
                }
            }
        }

        return view('waitingpayment', [

        ]);
    }
    public function payment(Request $request,$id)
    {
        $game=GamePlay::query()->find($id);
        if ($request->method()=='POST'){
         $rest=$this->paymentApiService->payment([
                'phone'=>$request->phone,
                'amount'=>intval($request->amount),
                'country'=>$request->country,
                'carrier'=>$request->carrier
            ]);
            logger($rest);
           if ($rest['status']=='true'){
                $paymen=new Payment();
                $paymen->user_id=\auth()->id();
                //$paymen->type=$request->country;
                $paymen->amount=$request->amount;
               $paymen->game_play_id=$game->id;
                $paymen->carrier=$request->carrier;
                    $paymen->phone=$request->phone;
                 $paymen->reference=$rest['transactionId'];
                $paymen->save();
                Session::put('trans_ref',$rest['transactionId']);
                flash()->success('Operation completed successfully');
                return redirect()->route('waitingpayment',['req'=>Helper::generatealeatoire(88)]);
            }
            flash()->error('Operation echec');
        }

        return view('payment', [
            'game'=>$game

        ]);
    }
    public function postConbinaison(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $ob = $data['ob'];
        DB::beginTransaction();
        $loto_fixture = new LottoFixture();
        $loto_fixture->title = $data['title'];
        $end_time = $data['end_date'] . ' ' . $data['end_time'];
        $loto_fixture->end_time = new \DateTime($end_time);
        $loto_fixture->date_play = $data['end_date'];
        $loto_fixture->save();

        for ($i = 0; $i < sizeof($ob); ++$i) {
            $item = new LottoFixtureItem();
            $item->fixture_id = $ob[$i]['id'];
            $item->lotto_fixture_id = $loto_fixture->id;
            $item->save();
        }
        DB::commit();
        flash()->success('Operation completed successfully');
        return response()->json($ob);

    }

    public function postGame(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $ob = $data['ob'];
        DB::beginTransaction();
        $user = Auth::user();
        if (is_null($user)) {
            flash()->error('User not logged');
            return response("User not logged", 403);
        }
/*        if ($user->sold < env("PRICE_GAME")) {
            return response("Amount not set", 403);
        }*/
        $game = new GamePlay();
        $game->user_id = $user->id;
        $game->lotto_fixture_id = $data['lotto_fixture_id'];
        $game->save();
        for ($i = 0; $i < sizeof($ob); ++$i) {
            if (!isset($ob[$i]['value'])){
                flash()->error('Grille not Completed');
                return response("Grille not Completed", 403);
            }
            $item = new PlayingFixture();
            $item->value = $ob[$i]['value'];
            $item->game_play_id = $game->id;
            $item->loto_fixture_item_id = $ob[$i]['id'];
            $item->save();
        }
        //$user->sold -= env("PRICE_GAME");
        $user->save();
        DB::commit();
        flash()->success('Operation completed successfully');
        return response()->json(['id'=>$game->id]);
    }
    function registerFormation(Request $request){
        if ($request->method()=='POST'){
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'phone' => 'required',
                'service' => 'required',
                'email' => 'required|email'
            ]);
            if ($validator->fails()) {
                flash()->error('Operation echec.');
                return back()->with($validator->errors()->getMessages());
            }
            DB::beginTransaction();
            $contact=Contact::query()->firstWhere(['email'=>$request->email]);
            if (is_null($contact)){
                $contact=new Contact();
                $contact->email=$request->email;
            }
            $contact->name=$request->name;
            $contact->save();
            $register=new RegisterOnline();
            $register->date_born=$request->date_born;
            $register->service=$request->service;
            $register->contact_id=$contact->id;
            $register->save();
            Helper::send_contact([
                'name'=>$request->name,
                'email'=>$request->email,
                'message'=>$request->message
            ]);
            DB::commit();
            flash()->success('Operation completed successfully');
        }
        return view('form.register');
    }
    function registerNewletter(Request $request){
        //toastr()->success('Data has been saved successfully!');
        if ($request->method()=='POST'){
            $validator = Validator::make($request->all(), [
                'email' => 'required|email'
            ]);
            if ($validator->fails()) {
                flash()->error('Adresse email non valide');
                return back()->with($validator->errors()->getMessages());
            }
            DB::beginTransaction();
            $contact=Contact::query()->firstWhere(['email'=>$request->email]);
            if (is_null($contact)){
                $contact=new Contact();
                $contact->email=$request->email;
            }
            $contact->name=$request->name;
            $contact->save();
            Helper::send_contact([
                'name'=>$request->name,
                'email'=>$request->email,
                'message'=>$request->message
            ]);
            DB::commit();
            flash()->success('Operation completed successfully');
        }
        return back();
    }
}
