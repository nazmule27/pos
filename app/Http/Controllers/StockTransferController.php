<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
//use App\StockTransfer;
use App\Stock;
use Response;
use DB;
use Auth;

class StockTransferController extends Controller
{
    public function index(){
        $branch=Auth::user()->branch;
        if(Auth::user()->role==='superadmin'){
            $all_data = \DB::select('SELECT s.id, c.`c_name`, p.`p_name`, ROUND(p.`buying_price`,2) as buying_price, ROUND(p.`selling_price`,2) as selling_price, ROUND(s.`quantity`,2) as quantity, s.`updated_at` FROM stock s, product p, product_category c WHERE s.`pid`=p.`pid` AND s.`cid`=c.`cid` AND s.branch='."'".$branch."'".' ORDER BY s.`updated_at` DESC');
            return view('stock_transfer.home', ['all_data' => $all_data]);
        }
        else{
            return redirect('auth/login');
        }
    }
    public function create(){

    }
    public function store(Request $request){

    }
    public function show($id){

    }
    public function edit($id)
    {
        $branch=array(Auth::user()->branch);
        if(Auth::user()->role==='superadmin'){
            $stock=Stock::findOrFail($id);
            $product_detail = \DB::select('SELECT s.id, s.cid, s.pid, c.`c_name`, p.`p_name`, p.`buying_price`, p.`selling_price`, s.`quantity`, s.`branch` FROM `stock` s, `product` p, `product_category` c WHERE s.`pid`=p.`pid` AND s.`cid`=c.`cid` AND s.id='."'".$id."'".'');
            $branch = \DB::table('branch')->whereNotIn('branch_name', $branch)->lists('branch_name', 'branch_name');
            return view('stock_transfer.edit', ['stock'=>$stock, 'product_detail'=>$product_detail, 'branch'=>$branch]);
        }
        else{
            return redirect('auth/login');
        }
    }
    public function update(Request $request, $id)
    {
        if(Auth::user()->role==='superadmin'){

            $categoryId=$request->get('cid');
            $productId=$request->get('pid');
            //$branch=$request->get('branch');
            $branch=Auth::user()->branch;
            $quantity=$request->get('quantity');
            $new_branch=$request->get('new_branch');

            $product =  \DB::select('SELECT * FROM `stock` WHERE pid='.$productId.' AND branch='."'".$new_branch."'".' LIMIT 1');
            if( sizeof($product)==0){
                \DB::insert('INSERT INTO stock(cid, pid, quantity, branch, created_at, updated_at) VALUES ("'.$categoryId.'", "'.$productId.'", "'.$quantity.'", "'.$new_branch.'", "'.date('Y-m-d H:i:s').'", "'.date('Y-m-d H:i:s').'")');
                \DB::update('UPDATE stock SET quantity=quantity-'.$quantity.', updated_at="'.date('Y-m-d H:i:s').'" WHERE id='.$id);
            }
            else {
                /*\DB::update('UPDATE stock SET quantity=quantity+'.$quantity.', updated_at="'.date('Y-m-d H:i:s').'" WHERE pid="'.$productId.'" and branch="'.$new_branch.'"' );
                \DB::update('UPDATE stock SET quantity=quantity-'.$quantity.', updated_at="'.date('Y-m-d H:i:s').'" WHERE pid="'.$productId.'" and branch="'.$branch.'"');*/
                \DB::update('UPDATE stock SET quantity=quantity+'.$quantity.', updated_at="'.date('Y-m-d H:i:s').'" WHERE pid="'.$productId.'" and branch="'.$new_branch.'"' );
                \DB::update('UPDATE stock SET quantity=quantity-'.$quantity.', updated_at="'.date('Y-m-d H:i:s').'" WHERE id='.$id);
            }
            return redirect('stock_transfer');
        }
        else{
            return redirect('auth/login');
        }
    }

    public function destroy($id){

    }

}
