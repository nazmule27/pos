<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Payment;
use Response;

class PaymentController extends Controller
{
    public function index()
    {
        //$all_data=Product::all();
        $all_data = \DB::select('SELECT p.* FROM payment p');
        return view('payment.home', ['all_data' => $all_data]);
    }
    public function create()
    {
        $paymentCategories = \DB::table('payment_type')->lists('payment_title', 'ptid');
        return view('payment.create')->with('paymentCategories', $paymentCategories);
    }
    public function store(Request $request)
    {
        /*$input=$request->all();
        Payment::create($input);*/
        \DB::insert('INSERT INTO payment(ptid, payment_title, purpose, amount, status, created_at, updated_at) VALUES ("'.$request->get('ptid').'", "'.$request->get('payment_title').'", "Others bill", "'.$request->get('amount').'", "OK", NOW(), NOW())');

        return redirect('payment');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {

    }
    public function update(Request $request, $id)
    {

    }
    public function destroy($id)
    {

    }

}
