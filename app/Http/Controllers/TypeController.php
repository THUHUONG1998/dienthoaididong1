<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\type;
class TypeController extends Controller
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
        
        $type = type::orderBy('id','DESC')->paginate(8);
        return view('type.index',compact('type'))
            ->with('i', (request()->input('page', 1) - 1) * 8);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type.create');
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
            'icon' => 'required',
            'status' =>'required'
        ]);


        Product::create($request->all());


        return redirect()->route('type.index')
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
        return view('type.show',compact('product'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\products  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = type::find($id);
        return view('type.edit',compact('type'));
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
        $this->validate($request, [
            'name' => 'required',
            'icon' => 'required'.$id,
        ]);

        $type = type::find($id);
        $type->update($request->all());
        $type->save();

        return redirect()->route('type.index')
                        ->with('success','type updated successfully');
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


        return redirect()->route('type.index')
                        ->with('success','Product deleted successfully');
    }
}
