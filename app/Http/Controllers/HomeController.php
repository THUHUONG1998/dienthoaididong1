<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use App\bill_detail;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {  
        $topseller = bill_detail::orderBy('quantity', 'ASC')->get();
       $onseller = products::orderBy('id', 'ASC')->limit(3)->get();
       $newproducts = DB::table('products')->where('new', '=', 1)->limit(3)->get();
       $slide = DB::select('select * from slide where status = 1');
        $featuredProducts = DB::select('SELECT products.* 
        FROM products
        WHERE products.status = 1');
        return view('home', [ 'newproducts'=>$newproducts, 'topseller'=>$topseller, 'slide'=>$slide, 'featuredProducts'=>$featuredProducts, 'onseller'=>$onseller ]);
    }
    public function show($id)
    {    $type = DB::table('categories')->select('id', 'name')->get();
        $retaled_product= array();
        foreach($type as $value){
             $retaled_product[$value->name]=DB::table('products')->where('id',$value->id)->get()->toArray();
        }
        $single_product= DB::table('products')->where('id', $id)->first();
        if($single_product== null)
            return redirect('/');
        else{
            return view('single_product', ['single_product'=>$single_product, 'type'=>$type, 'retaled_product'=>$retaled_product]);
        }
       
    }
}
