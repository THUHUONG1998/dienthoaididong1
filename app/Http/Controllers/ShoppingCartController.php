<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\products;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  Cart::add('234', 'Products', 1, 9000);
        return view('shopping_cart');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart($id){
        $product = products::where('id', $id)->first();
        if($product->promotion_price!= 0 && $product->promotion_price < $product->price){
            $unit_price = $product->promotion_price;
        }else{
            $unit_price = $product->price; 
        }
        Cart::add($id, $product->name, 1, $unit_price, ['image' => $product->image]);

        return back();
    }
    public function infoCart()
    {
        return view('shopping_cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateCart(Request $request){
        $rowId = $request->txtRowID;
        $qTy = $request->txtSoLuong;
        Cart::update($rowId, $qTy);
        return redirect('/info-cart');
    }

    public function deleteCart($id) {
        Cart::remove($id); 
        return redirect()->back()->with('success','Delete successful');
    }
   
}
