<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Product_Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        $product = Product::all();

        return view('index',['category'=>$category,'product'=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required',
            'desc' => 'required',
            'category'=>'required',
            'image'=>'required',
            'mainimage'=>'required',
            'Rating'=>'required',
        ]);
        $request_data = $request->except(['image','mainimage']);

        if($request->mainimage){
            Image::make($request->mainimage)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/'.$request->mainimage->hashName()));
            $request_data['mainimage'] = $request->mainimage->hashName();
        }

        $product =new Product;
        $product->name = $request_data['name'];
        $product->desc = $request_data['desc'];
        $product->category_id = $request_data['category'];
        $product->image = $request_data['mainimage'];
        $product->rating = $request_data['Rating'];
        $product->save();



        $product_new = DB::table('products')->orderBy('id', 'desc')->first();



        if($request->image){
            foreach ($request->image as $image)
            {
                Image::make($image)->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/'.$image->hashName()));

                $product_id=$product_new->id;
                $imagee = $image->hashName();
                Product_Images::create(['image'=>$imagee,'product_id'=>$product_id]);

            }

        }

       //

        session()->flash('success',"Confirm Add Product Successfully");
        return redirect()->route('product.index');
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
        $category = Category::all();
        $product = Product::find($id);
        return view('edit',['category'=>$category,'product'=>$product]);
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
            'name' => 'required',
            'desc' => 'required',
            'category'=>'required',
            'mainimage'=>'required',
            'Rating'=>'required'
        ]);
        $request_data = $request->except(['image','mainimage']);

        if($request->mainimage !=null){
            Image::make($request->mainimage)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/'.$request->mainimage->hashName()));
            $request_data['mainimage'] = $request->mainimage->hashName();
        }


        $product =Product::find($id);
        $product->name = $request_data['name'];
        $product->desc = $request_data['desc'];
        $product->category_id = $request_data['category'];
        $product->image = $request_data['mainimage'];
        $product->rating = $request_data['Rating'];

        $product->save();



        //$product_new = DB::table('products')->where('id',$id)->first();




        if($request->image != null){

            Product_Images::where('product_id', $id)->delete();
            foreach ($request->image as $image)
            {
                Image::make($image)->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/'.$image->hashName()));

                $product_id = $id;
                $imagee = $image->hashName();

                Product_Images::create(['image'=>$imagee,'product_id'=>$product_id]);
                //

            }

        }

        //

        session()->flash('success',"Confirm Add Product Successfully");
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Images = Product_Images::where('product_id', $id)->first();

        Storage::disk('public_uploads')->delete('/'.$Images->image);

        Product_Images::where('product_id', $id)->delete();
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('product.index');

    }
}
