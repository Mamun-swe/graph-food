<?php

namespace App\Http\Controllers\Website;

use App\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function account(){
        return view('website.account.profile');
    }

    public function updateUser(Request $request){
        $request->validate([
            'name' => 'required',
            'password' => 'required|string|min:8',
        ]);
        $form_data = array(
            'name'=> $request->name,
            'password'=> Hash::make($request->password),
        );

        $record = User::where('email', Auth::User()->email);
        $record->update($form_data);
        return redirect()->back()->with('success', 'Update successfully');
    }

    public function history(){
        $data = Product::join('carts', 'carts.product_id', '=', 'products.id')->where('carts.user_id', Auth::User()->id)->where('carts.status', '=', 'accepted')->paginate(30);
        return view('website.account.history', compact('data'));
    }

   

}
