<?php


namespace App\Http\Controllers;



use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function login(Request $request)
    {
        if ($request->method() == "POST") {
            $validator = Validator::make($request->all(), $rules = [
                'phone' => ['required'],
                'password' => 'required',

            ], $messages = [
                'phone.required' => 'phone field is required!',
                'password.required' => 'password  is required!',
            ]);
            if ($validator->fails()) {
                flash()->error("Email or password required");
                return redirect()->back()
                    ->withErrors($validator)->with(['message' => $messages])
                    ->withInput();
            }

            if (Auth::attempt(['phone' => $request->phone, 'password' => $request->password, 'activate' => true], $request->remember)) {
                flash()->success("Authentication successful");
                $request->session()->regenerate();
                if (Auth::user()->user_type==User::CUSTOMER_TYPE){
                    return redirect()->route('home');
                }elseif (Auth::user()->user_type==User::ADMIN_TYPE){
                    return redirect()->route('dashboard');
                }

            }
            flash()->error("User not found or User not activate");
            return redirect()->route('login');
        }
        return view('login.login');

    }
    public function register(Request $request)
    {
        if ($request->method()=="POST"){
            $user=new User();
            $user->name=$request->name;
            $user->phone=$request->phone;
            $user->parrain_id=isset($request->parrain_id)?$request->parrain_id:1;
            $user->user_type=1;
            $user->password=bcrypt($request->get('password'));
            $user->save();
        }
        return view('login.register');

    }
}
