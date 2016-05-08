<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Consumer;
use Response;
use Auth;

class ConsumerController extends Controller
{
    public function index()
    {
        $all_data=Consumer::all();
        //$all_data = \DB::select('SELECT l.* FROM loan l');
        //$all_data= \DB::select('SELECT * FROM loan s where status="'."active".'"');
        return view('consumer.home', ['all_data' => $all_data]);
    }

    public function create()
    {
        if(Auth::user()->role==='superadmin'){
            return view('consumer.create');
        }
        else{
            return redirect('auth/login');
        }
    }
    public function store(Request $request)
    {
        if(Auth::user()->role==='superadmin'){
            $input=$request->all();
            Consumer::create($input);

            /*\DB::insert('INSERT INTO consumer(name, taken_amount, duration_in_month, installment_count, installment_remain, installment_taka, created_at, updated_at) VALUES ("'.$request->get('loan_title').'", "'.$request->get('taken_amount').'",
"'.$request->get('duration_in_month').'", "'.$request->get('installment_count').'", "'.$request->get('installment_count').'", "'.$request->get('installment_taka').'", "'.date('Y-m-d H:i:s').'", "'.date('Y-m-d H:i:s').'")');*/

            return redirect('consumer');
        }
        else{
            return redirect('auth/login');
        }

    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        if(Auth::user()->role==='superadmin'){
            $consumer=Consumer::findOrFail($id);
            //$loan= \DB::select('SELECT * FROM loan s where lid='.$id);
            return view('consumer.edit', ['consumer'=>$consumer]);
        }
        else{
            return redirect('auth/login');
        }
    }
    public function update(Request $request, $id)
    {
        if(Auth::user()->role==='superadmin'){
            $input=$request->all();
            $data=Consumer::findOrFail($id);
            $data->update($input);
            return redirect('consumer');
        }
        else{
            return redirect('auth/login');
        }

    }
    public function destroy($id)
    {
    }

}
