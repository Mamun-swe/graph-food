<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::where('status', '=', 'pending')->orderBy('id', 'DESC')->get();
        return view('admin.order.index', compact('orders'));
    }


    public function show($id, $uid){
        $user = Order::where('user_id', '=', $uid)->take(1)->get();
        $data = Order::join('carts', 'carts.user_id', '=', 'orders.user_id')
            ->join('products', 'products.id', '=', 'carts.product_id')
            ->where('orders.id', '=', $id)
            ->where('carts.status', '=', 'ordered')
            ->where('orders.user_id', '=', $uid)
            ->get();
        return view('admin.order.show', compact('data', 'user', 'uid'));
    }

    public function acceptOrder(Request $request){
        $order = Order::where('user_id', '=', $request->user_id)->update(['status' => 'acceptd']); 
        $cart = Cart::where('user_id', '=', $request->user_id)->where('status', '=', 'ordered')->update(['status' => 'accepted']); 

        return response()->json('success');
    }
}
