<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use Response;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$all_data=Product::all();
        $all_data = \DB::select('SELECT c.*, p.* FROM product p, product_category c WHERE c.`cid`=p.`cid`');
        return view('product.home', ['all_data' => $all_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role==='superadmin'){
            $categories = \DB::table('product_category')->lists('c_name', 'cid');
            return view('product.create')->with('categories', $categories);
        }
        else{
            return redirect('auth/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->role==='superadmin'){
            $input=$request->all();
            Product::create($input);
            return redirect('product');
        }
        else{
            return redirect('auth/login');
        }
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
        if(Auth::user()->role==='superadmin'){
            $product=Product::findOrFail($id);
            $categories = \DB::table('product_category')->lists('c_name', 'cid');
            return view('product.edit', ['product'=>$product, 'categories'=>$categories]);
        }
        else{
            return redirect('auth/login');
        }
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
        if(Auth::user()->role==='superadmin'){
            $input=$request->all();
            $data=Product::findOrFail($id);
            $data->update($input);
            return redirect('product');
        }
        else{
            return redirect('auth/login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->role==='superadmin'){
            $data=Product::findOrFail($id);
            $data->delete();
            return redirect('product');
        }
        else{
            return redirect('auth/login');
        }
    }

}
