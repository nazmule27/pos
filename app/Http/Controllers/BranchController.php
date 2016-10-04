<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Branch;
use Auth;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if((Auth::user()->role==='superadmin') && (Auth::user()->email==='nlnazmul@gmail.com')){
            $all_data=Branch::all();
            return view('branch.home', compact('all_data'));
        }
        else{
            return redirect('auth/login');
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if((Auth::user()->role==='superadmin') && (Auth::user()->email==='nlnazmul@gmail.com')){
            return view('branch.create');
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
        if((Auth::user()->role==='superadmin') && (Auth::user()->email==='nlnazmul@gmail.com')){
            $input=$request->all();
            Branch::create($input);
            return redirect('branch');
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
            $branch=Branch::findOrFail($id);
            return view('branch.edit', compact('branch'));
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
            $data=Branch::findOrFail($id);
            $data->update($input);
            return redirect('branch');
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
            $data=Branch::findOrFail($id);
            $data->delete();
            return redirect('branch');
        }
        else{
            return redirect('auth/login');
        }
    }

}
