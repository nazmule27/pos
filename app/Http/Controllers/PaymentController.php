<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Payment;
use Response;
use Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $branch=Auth::user()->branch;
        //$all_data=Product::all();
        $all_data = \DB::select('SELECT p.* FROM payment p where p.branch='."'".$branch."'".' order by created_at desc');
        return view('payment.home', ['all_data' => $all_data]);
    }
    public function create()
    {
        $paymentCategories = \DB::table('payment_type')->orderBy('payment_title')->lists('payment_title', 'ptid');
        return view('payment.create')->with('paymentCategories', $paymentCategories);
    }
    public function store(Request $request)
    {
        $branch=Auth::user()->branch;
        /*$input=$request->all();
        Payment::create($input);*/
        \DB::insert('INSERT INTO payment(payment_title, purpose, amount, branch, status, created_at, updated_at) VALUES ("'.$request->get('payment_title').'", "'.$request->get('purpose').'", "'.$request->get('amount').'", "'.$branch.'", "Valid", "'.date('Y-m-d H:i:s').'", "'.date('Y-m-d H:i:s').'")');
        \DB::insert('insert into net_balance(transaction_title, address, credit, debit, branch, status, collected_by, created_at, updated_at) VALUES
("'.$request->get('payment_title').'", "'.$request->get('purpose').'", "0", "'.$request->get('amount').'", "'.$branch.'", "Valid", "'.Auth::user()->name.'", "'.date('Y-m-d H:i:s').'", "'.date('Y-m-d H:i:s').'")');
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
