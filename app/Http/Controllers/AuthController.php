<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Register View
    public function registerView(){
        if (Auth()->User()){
            if(Auth()->User()->admin == 1) {
                return redirect()->route('dashboard');
            }else if (Auth()->User() && Auth()->User()->admin == 0) {
                return redirect()->route('account.profile');
            }
        }else{
            return view('auth.register');
        }
    }

    // Login View
    public function loginView(){
        if (Auth()->User()){
            if(Auth()->User()->admin == 1) {
                return redirect()->route('dashboard');
            }else if (Auth()->User() && Auth()->User()->admin == 0) {
                return redirect()->route('account.profile');
            }
        }else{
            return view('auth.login');
        }
    }

    // Reset View
    public function resetView(){
        if (Auth()->User()){
            if(Auth()->User()->admin == 1) {
                return redirect()->route('dashboard');
            }else if (Auth()->User() && Auth()->User()->admin == 0) {
                return redirect()->route('account.profile');
            }
        }else{
            return view('auth.reset');
        }
    }


    // Regisration
    public function registration(Request $request){
        $rules = [
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'required|string|min:8|confirmed',
        ];
        $this->validate($request,$rules);
  
          User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->back()->with('success', 'Successfully account created.');
    }

    // Login
    public function login(Request $request){
        $data = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];
        if (Auth::attempt($data)) {
            if (Auth()->User() && Auth()->User()->admin == 0) {
                return redirect()->route('account.profile');
            }

            if (Auth()->User() && Auth()->User()->admin == 1) {
                return redirect()->route('dashboard');
            }
        }else{
            return redirect()->back()->with('error', 'Email or password incorrect');
        }
        // dd($request->all());
    }


    
    // Reset
    public function resetPass(Request $request){
        dd($request);
        // $rules = [
        //     'phone' => 'required|regex:/(01)[0-9]{9}/',
        //     'password' => 'required|string|min:8',
        // ];
        // $this->validate($request,$rules);

        // $form_data = array(
        //     'password' => Hash::make($request['password']),
        // );
        

        // $user = User::where('phone', '=', $request->phone)
        //         ->where('account_type', '!=', 'admin')
        //         ->first();
        // if($user){
        //     User::where('phone', '=', $request->phone)->where('account_type', '!=', 'admin')->update($form_data);
        //     return redirect()->back()->with('success', 'পাসওয়ার্ড পরিবর্তন হয়েছে ।');
        // }else{
        //     return redirect()->back()->with('error', 'মোবাইল নাম্বার সঠিক নয় ।');
        // }
    }

    // Logout
    public function logout(Request $request){
        Session::flush();
        Auth::logout();
        return back();
    }
}
