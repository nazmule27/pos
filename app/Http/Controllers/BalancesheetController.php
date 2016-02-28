<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\LoanInstallment;
use Response;
use Auth;

class BalancesheetController extends Controller
{
    public function index()
    {
        //$all_data=Product::all();
        $all_data = \DB::select('SELECT @a:=@a+1 sl, xx.* FROM
(SELECT income_title AS title, invoice_no AS address, "-" AS dr, amount AS cr, created_at FROM income
UNION ALL
SELECT payment_title AS title, purpose AS address, amount AS dr, "-" AS cr, created_at FROM payment ORDER BY created_at DESC) xx, (SELECT @a:= 0) AS a;');
        return view('report.balancesheet', ['all_data' => $all_data]);
    }
    public function create()
    {
        $all_data = \DB::select('SELECT transaction_title, address, credit, debit, status, updated_at from net_balance ORDER BY created_at desc');
        return view('report.netbalancesheet', ['all_data' => $all_data]);
    }
    public function store(Request $request)
    {

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
