<?php

namespace App\Http\Controllers\Admin;

use App\Models\BanglaFood;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BanglaFoodControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BanglaFood::orderBy('id', 'DESC')->paginate(10);
        return view('admin.bangla-food.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bangla-food.create');
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
            'product_name' => 'required',
            'total_item' => 'required',
            'product_price' => 'required',
            'item_details' => 'required',
            'product_image' => 'required',
        ]);

        $file = $request->file('product_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('products', $filename);


        $form_data = array(
            'category'=> $request->category,
            'product_name'=> $request->product_name,
            'total_item'=> $request->total_item,
            'product_price'=> $request->product_price,
            'item_details'=> $request->item_details,
            'product_status'=> 1,
            'product_image'=> $filename,
        );

        BanglaFood::create($form_data);
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
        $data = BanglaFood::find($id);
        return view('admin.bangla-food.edit', compact('data'));
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
            'product_name' => 'required',
            'total_item' => 'required',
            'product_price' => 'required',
            'item_details' => 'required',
        ]);

        $form_data = array(
            'product_name'=> $request->product_name,
            'total_item'=> $request->total_item,
            'product_price'=> $request->product_price,
            'item_details'=> $request->item_details,
            'product_status'=> 1,
        );

        $record = BanglaFood::find($id);
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
        BanglaFood::where('id',$id)->delete();
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

        $record = BanglaFood::find($id);
        $record->update($form_data);
        return redirect()->back();
    }
}
