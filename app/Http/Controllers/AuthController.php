<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
Use Str;
use Auth;
use Mail;
use App\Mail\ForgotPasswordMail;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        return view('login');
    }

    public function forgot_password(Request $request)
    {
        
         return view('forgot_password');
    }

    public function forgot_password_post(Request $request){
        // dd($request->all());

        $count = User::where('email', '=' ,$request->email)->count();
        if ($count > 0) {
            $user = User::where('email', '=' ,$request->email)->first();
            $random_pass = rand(111111, 999999);
            $user->password = Hash::make($random_pass);
            $user->save();
            
            $user->random_pass = $random_pass;
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('Success','Password Has been send email');
        }
        else{

           return redirect()->back()->with('error', 'Email Not Found');
        }
    }
    public function register(Request $request)
    {
        
          return view('register');
    }
    public function register_post(Request $request)
    {
    //  dd($request->all()); 
    $user = new User; // Initialize $user here

    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'confirm_password' => 'required_with:password|same:password|min:6'
    ]);
        $user = new User;
        $user->name           = trim($request->name);
        $user->email          = trim($request->email);
        $user->password       = Hash::make($request->password);
        $user->remember_token = Str::random(50);
        $user->is_role =1;
        $user->save();
        
        return redirect('/')->with('success','Register successfully');
    }
    
    public function checkemail(Request $request)
    {
            $email = $request->input('email');
            $isExists = User::where('email',$email)->first(); 
            if ($isExists) {
                return response()->json(array("exists"=>true));
            }
            else{
                return response()->json(array("exists"=>false));
            }
            
    }
    public function login_post(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password],true))
        {
            if(Auth::User()->is_role == '1'){
                return redirect()->intended('admin/dashboard');
            }
            else if(Auth::User()->is_role == '0'){

                return redirect()->intended('employee/dashboard');
            }
            else{
                return redirect('/')->with('error','No HR Availbles.. please check');
            }
        }
        else{
            return redirect()->back()->with('error','Please enter the correct credentials');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect(url('/'));
    }
}
