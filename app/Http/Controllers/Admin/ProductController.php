<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::join('products', 'products.category_id', '=', 'categories.id')->paginate(10);
        return view('admin.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'item_type' => 'required',
            'product_name' => 'required',
            'product_price' => 'required',
            'product_type' => 'required',
            'total_items' => 'required',
            'item_details' => 'required',
            'product_image' => 'required',
        ]);

        $file = $request->file('product_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('products', $filename);
        
        
        $form_data = array(
            'category_id'=> $request->category,
            'item_type' => $request->item_type,
            'product_name'=> $request->product_name,
            'product_price'=> $request->product_price,
            'product_type'=> $request->product_type,
            'total_items'=> $request->total_items,
            'item_details'=> $request->item_details,
            'product_status'=> 1,
            'product_image'=> $filename,
        );

        Product::create($form_data);
        return redirect()->back()->with('success', 'Successfully product created .');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::find($id);
        $category = Category::all();
        return view('admin.product.edit', compact('data', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
            'product_name' => 'required',
            'product_price' => 'required',
            'product_type' => 'required',
            'product_image' => 'required',
        ]);

        $file = $request->file('product_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('products', $filename);


        $form_data = array(
            'category_id'=> $request->category,
            'product_name'=> $request->product_name,
            'product_price'=> $request->product_price,
            'product_type'=> $request->product_type,
            'product_status'=> 1,
            'product_image'=> $filename,
        );

        $record = Product::find($id);
        $record->update($form_data);
        return redirect()->back()->with('success', 'Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id',$id)->delete();
        return redirect()->back()->with('success', 'Delete successfully');
    }


    /**
     * Update the specified resource status.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, $id)
    {
        $form_data = array(
            'product_status'=> $request->new_status
        );

        $record = Product::find($id);
        $record->update($form_data);
        return redirect()->back();
    }
}
