<?php

namespace App\Http\Controllers\Website;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $data = Product::join('carts', 'carts.product_id', '=', 'products.id')->where('carts.user_id', Auth::User()->id)->where('carts.status', '=', 'unordered')->get();
        return view('website.cart.index', compact('data'));
    }

    public function store(Request $request){
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
        ]);

        $form_data = array(
            'user_id'=> $request->user_id,
            'product_id'=> $request->product_id
        );

        $data = Cart::where('user_id', $request->user_id)
                    ->where('product_id', $request->product_id)
                    ->where('status', '=', 'unordered')
                    ->get();
        if(count($data) > 0){
            return response()->json('exist');
        }else{
            Cart::create($form_data);
            return response()->json('success');
        }
    }

    public function destroy($id){
        Cart::where('id',$id)->delete();
        return redirect()->back();
    }


    public function incrementQuantity(Request $request){
        $record = Cart::where('user_id', $request->user_id)->where('product_id', $request->product_id)->increment('quantity');
        return redirect()->back();
    }

    public function decrementQuantity(Request $request){
        $record = Cart::where('user_id', $request->user_id)->where('product_id', $request->product_id)->decrement('quantity', 1);
        return redirect()->back();
    }

    public function checkOut(){
        $data = Product::join('carts', 'carts.product_id', '=', 'products.id')->where('carts.user_id', Auth::User()->id)->where('carts.status', '=', 'unordered')->get();
        return view('website.cart.check-out', compact('data'));
    }

    public function placeOrder(Request $request){
        $request->validate([
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'location' => 'required',
        ]);

        $form_data = array(
            'user_id' => Auth::User()->id,
            'user_name' => Auth::User()->name,
            'phone' => $request->phone,
            'location' => $request->location
        );

        $cart = Cart::where('user_id',  Auth::User()->id)->where('status', '=', 'unordered')->update(['status' => 'ordered']); 
        $order = Order::create($form_data);
        return redirect()->route('account.cart')->with('success', 'Successfully your order placed .');
    }

}
