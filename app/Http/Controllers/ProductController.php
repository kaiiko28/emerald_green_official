<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();

        return view('shop.product_list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.create_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'p_name' => 'required',
            'p_price' => 'required',
            'p_category' => 'required',
        ]);

        // return $request->input('p_image');

        if($request->hasfile('p_image')) {
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename =  pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extention = $request->file('p_image')->getClientOriginalExtension();
            $filenametostore = $filename . '_' . time() . '.' . $extention;

            $path = $request->file('cover_image')->storeAs('public/product_images', $filenametostore);

        }
        else {
            $filenametostore = $request->input('p_image');
        }



        $product = new Products;
        $product->product_code = 'LS' . '_'  .  str_random(2) . '-' . str_random(5) . '_' . 'serial_code';
        $product->name = $request->input('p_name');
        $product->price = $request->input('p_price');
        $product->discount = $request->input('p_discount');
        $product->cover_image = $filenametostore;
        $product->preview_image = $request->input('preview_image');
        $product->discription = $request->input('p_disc');
        $product->featured = $request->input('p_feature');
        $product->category = $request->input('p_category');

        $product->save();

        return redirect()->route('shop.product_list')->with('success', 'Product Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Products::where('id',$id)->first();

        return view('shop.single_page', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_product = Products::where('id',$id)->first();

        return view('shop.edit_product', compact('edit_product'));
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
        $this->validate($request,[
            'p_name' => 'required',
            'p_price' => 'required',
            'cathegory' => 'required',
            'p_image' => 'required'
        ]);

        //insert update content

        return route('admin.product_list')->with('success', 'Product Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
