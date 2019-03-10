<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $cartItems = Cart::content();
        return view('cart.index',compact('cartItems'));
    }

    public function add_Item($id){
        $product = Product::findOrFail($id);
        Cart::add($id,$product->name,1,0,['img'=>$product->image]);
        return back();
    }

    public function Update(Request $request, $id){
        $qty = $request->qty;
        $pro_id = $request->proId;
        $product = Product::findOrFail($pro_id);


            Cart::update($id,$qty);
            return back()->with('status','cart Is Updated');

    }

    public function Remove($id){
        Cart::remove($id);
        return back()->with('status','Removed Item with id '.$id);

    }
}
