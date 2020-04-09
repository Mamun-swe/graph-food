<?php

namespace App\Http\Controllers\Website;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordResetController extends Controller
{
    public function index(){
        return view('change-password');
    }

    public function resetPass(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required|string|min:8',
        ]);
        $form_data = array(
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        );

        $data = User::where('email', $request->email)->get();
        if(count($data) > 0){
            $record = User::where('email', $request->email);
            $record->update($form_data);
            return redirect()->back()->with('success', 'Password successfully reset.');
        }else{
            return redirect()->back()->with('errorx', 'Account not found, Try with correct e-mail.');
        }
    }
}
