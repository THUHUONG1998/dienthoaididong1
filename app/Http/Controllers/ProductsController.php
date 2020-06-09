<?php


namespace App\Http\Controllers;


use App\products;
use DB;
use Illuminate\Http\Request;


class ProductsController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //      $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:product-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $products = products::orderBy('id','DESC')->paginate(8);
        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 8);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);


        Product::create($request->all());


        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\products  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = products::find($id);
        return view('products.show',compact('product'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\products  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = DB::table('categories')->get();
        $product = products::find($id);
        return view('products.edit',compact('product', 'type'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         request()->validate([
            'name' => 'required',
            'detail' => 'required',
            'id_type'=>'required'
        ]);
        $product = products::find($id);

       // $product->update($request->all());
        $input = $request->all();
        $product->update($input);
        $product->save();
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        products::find($id)->delete();


        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}
