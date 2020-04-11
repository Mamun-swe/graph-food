<?php

namespace App\Http\Controllers\Website;

use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\BanglaFood;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home(){
        $banners = Banner::orderBy('id', 'DESC')->get();
        $testimonials = Testimonial::orderBy('id', 'DESC')->get();
        return view('website.welcome', compact('banners', 'testimonials'));
    }

    public function contact(){
        return view('website.contact');
    }

    public function category($id){
        $category = Category::find($id);
        $products = Product::where('category_id', '=', $id)
                ->where('product_status', '=', 1)
                ->orderBy('id', 'DESC')
                ->paginate(16);
        return view('website.category', compact('category', 'products'));
    }

    public function service(){
        return view('website.service');
    }

    public function search(Request $request){
        $searchData = $request->search_data;
        $data = Product::where('product_name', 'like', '%' . $searchData . '%')
            ->where('product_status', '=', 1)
            ->get();
            if(count($data) > 0){
                return view('website.search-result', compact('data'));
            }else{
                $category = Category::where('cat_name', 'like', '%' . $searchData . '%')->get();
                foreach($category as $cat ){
                    $data = Product::where('category_id', $cat->id)
                        ->where('product_status', '=', 1)
                        ->get();
                    return view('website.search-result', compact('data'));
                }
            }
        return view('website.search-result', compact('data'));
    }

    // Bangla food
    public function banglaItems(){
        $breakFastData = Product::where('item_type', '=', 'break-fast')->where('product_status', '=', 1)->orderBy('id', 'DESC')->get();
        $launceData = Product::where('item_type', '=', 'lunch')->where('product_status', '=', 1)->orderBy('id', 'DESC')->get();
        $dinnerData = Product::where('item_type', '=', 'dinner')->where('product_status', '=', 1)->orderBy('id', 'DESC')->get();
        return view('website.bangla-food', compact('breakFastData', 'launceData', 'dinnerData'));
    }

    // Offer
    public function FlashOffer(){
        $offerData = Product::where('item_type', '=', 'offer')->where('product_status', '=', 1)->orderBy('id', 'DESC')->get();
        return view('website.offer', compact('offerData'));
    }

    public function denied(){
        return view('denied');
    }

}
