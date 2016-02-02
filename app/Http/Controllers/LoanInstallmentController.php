<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\LoanInstallment;
use Response;
use Auth;

class LoanInstallmentController extends Controller
{
    public function index()
    {
        //$all_data=Product::all();
        $all_data = \DB::select('SELECT li.*, l.loan_title FROM loan_installment li, loan l where l.lid=li.lid');
        return view('installment.home', ['all_data' => $all_data]);
    }
    public function create()
    {
        $loans = \DB::table('loan')->orderBy('loan_title')->lists('loan_title', 'lid');
        return view('installment.create')->with('loans', $loans);
    }
    public function store(Request $request)
    {
        //$input=$request->all();
        //Loan::create($input);
        \DB::insert('INSERT INTO loan_installment(lid, installment_amount, drcr, installment_count, created_at, updated_at) VALUES ("'.$request->get('lid').'", "'.$request->get('installment_amount').'",
"Dr", "'.$request->get('installment_count').'", NOW(), NOW())');
        \DB::update('UPDATE loan SET installment_remain=installment_remain-"'.$request->get('installment_count').'" WHERE lid="'.$request->get('lid').'"');
        return redirect('installment');
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
