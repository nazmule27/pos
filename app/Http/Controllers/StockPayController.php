<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\StockPay;
use Response;
use DB;
use Auth;

class StockPayController extends Controller
{
    public function index(){
        $all_data=StockPay::all();
        return view('stock_pay.home', ['all_data' => $all_data]);
    }
    public function create(){

    }
    public function store(Request $request){

    }
    public function show($id){

    }
    public function edit($id){
        $stock_pay=StockPay::findOrFail($id);
        return view('stock_pay.edit', ['stock_pay'=>$stock_pay]);
    }

    public function update(Request $request, $id){
        \DB::update('UPDATE stock_pay SET paid=paid+'.$request->get('paid').', due='.$request->get('due').', updated_at="'.date('Y-m-d H:i:s').'" WHERE id='.$id);
        \DB::insert('INSERT INTO payment(payment_title, purpose, amount, status, created_at, updated_at) VALUES ("Vendor bill (Due)",
"'.$request->get('p_name').'", "'.$request->get('paid').'", "Valid", "'.date('Y-m-d H:i:s').'", "'.date('Y-m-d H:i:s').'")');
        return redirect('stock_pay');
    }
    public function destroy($id){

    }

}
