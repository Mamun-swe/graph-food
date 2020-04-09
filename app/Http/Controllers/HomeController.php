<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Order;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $admin = User::where('admin', 1)->get()->count();
        $users = User::where('admin', 0)->get()->count();
        $order = Order::where('status', '=', 'acceptd')->get()->count();
        $pending = Order::where('status', '=', 'pending')->get()->count();
        $category = Category::all()->count();
        $products = Product::all()->count();
        return view('admin.home', compact('admin', 'users', 'order', 'pending', 'category', 'products'));
    }
}
