<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Stock;
use Response;
use DB;
use Auth;

class StockController extends Controller
{
    public function index(){
        $all_data = \DB::select('SELECT c.`c_name`, p.`p_name`, ROUND(p.`buying_price`,2) as buying_price, ROUND(p.`selling_price`,2) as selling_price, ROUND(s.`quantity`,2) as quantity, s.`updated_at` FROM stock s, product p, product_category c WHERE s.`pid`=p.`pid` AND s.`cid`=c.`cid` ORDER BY s.`updated_at` DESC');
        return view('stock.home', ['all_data' => $all_data]);
    }
    public function create(){
        $categories = \DB::table('product_category')->lists('c_name', 'cid');
        return view('stock.create', ['categories'=>$categories]);
    }
    public function store(Request $request){
        for($i=1; $i<41; $i++) {
            $categoryId=$request->get('category'.$i);
            $productId=$request->get('productName'.$i);
            $quantity=$request->get('quantity'.$i);
            if(isset($productId)){
                $product = Stock::where('pid', '=',  $productId)->first();
                if($product===null){
                    \DB::insert('INSERT INTO stock(cid, pid, quantity, created_at, updated_at) VALUES ("'.$categoryId.'", "'.$productId.'", "'.$quantity.'", "'.date('Y-m-d H:i:s').'", "'.date('Y-m-d H:i:s').'")');
                }
                else {
                    \DB::update('UPDATE stock SET quantity=quantity+"'.$quantity.'", updated_at="'.date('Y-m-d H:i:s').'" WHERE pid="'.$productId.'"');
                }
            }
        }
        \DB::insert('INSERT INTO stock_pay(bill_no ,vendor_name, vendor_address, total_price, discount, net_price, paid, due, bill_date, created_at, updated_at) VALUES ("'.$request->get('bill_no').'", "'.$request->get('vendor_name').'", "'.$request->get('vendor_address').'",
"'.$request->get('total_price').'", "'.$request->get('discount').'", "'.$request->get('discountAmount').'", "'.$request->get('paid').'", "'.$request->get('dues').'", "'.$request->get('bill_date').'", "'.date('Y-m-d H:i:s').'", "'.date('Y-m-d H:i:s').'")');
        \DB::insert('INSERT INTO payment(payment_title, purpose, amount, status, created_at, updated_at) VALUES ("Vendor Bill", "'.$request->get('vendor_name').'", "'.$request->get('paid').'", "Valid", "'.date('Y-m-d H:i:s').'", "'.date('Y-m-d H:i:s').'")');
        return redirect('stock');
    }
    public function show($id){

    }
    public function update(Request $request, $id){
        $input=$request->all();
        $data=Stock::findOrFail($id);
        $data->update($input);
        return redirect('stock');
    }
    public function destroy($id){
        $data=Stock::findOrFail($id);
        $data->delete();
        return redirect('stock');
    }

}
