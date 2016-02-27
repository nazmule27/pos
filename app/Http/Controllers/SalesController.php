<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Session;
use App\Sales;
use Response;
use Auth;


class SalesController extends Controller
{
    public function index()
    {
        //$all_data=Stock::all();
        $all_data= \DB::select('select s.* from sales s order by created_at desc');
        return view('sales.home', ['all_data' => $all_data]);
    }
    public function return_list()
    {
        $all_data= \DB::select('select * from return_list order by created_at desc');
        return view('sales.returns', ['all_data' => $all_data]);
    }
    public function create()
    {
        $categories = \DB::table('product_category')->lists('c_name', 'cid');
        $invoice= \DB::select('SELECT SUBSTR(s.invoice_no, 6) AS invoice_no FROM sales s ORDER BY s.id DESC LIMIT 1');
        return view('sales.create', ['categories'=>$categories, 'invoice'=>$invoice]);
    }
    public function store(Request $request)
    {
        $categories='';
        $productNames='';
        $products='';
        $unit_prices='';
        $quantities='';
        $amounts='';
        for($i=1; $i<41; $i++){
            $category=$request->get('category'.$i);
            $product=$request->get('productName'.$i);
            $productName=$request->get('products'.$i);
            $unit_price=$request->get('price'.$i);
            $quantity=$request->get('quantity'.$i);
            $amount=$request->get('amount'.$i);

            if(isset($category)){
                $categories=$categories.$category.',';
            }
            if(isset($product)){
                $products=$products.$product.',';
                \DB::update('UPDATE stock SET quantity=round(quantity-'.$quantity.',2) WHERE cid='.$category.' AND pid='.$product);
            }
            if(isset($productName)){
                $productNames=$productNames.$productName.',';
            }
            if(isset($unit_price)){
                $unit_prices=$unit_prices.$unit_price.',';
            }
            if(isset($quantity)){
                $quantities=$quantities.$quantity.',';
            }
            if(isset($amount)){
                $amounts=$amounts.$amount.',';
            }
        }

        $invoice= \DB::select('SELECT SUBSTR(s.invoice_no, 6) AS invoice_no FROM sales s ORDER BY s.id DESC LIMIT 1');
        if(isset($invoice[0]->invoice_no)) {
            $inv=$invoice[0]->invoice_no;
        } else $inv=0;
        $next_invoice=date('Y-').(string)(($inv)+1);

        $input = array(
            'total_price' => $request->get('total_price'),
            'invoice_no' => $next_invoice,
            'customer_id' => $request->get('customerName'),
            'customer_address' => $request->get('address'),
            'categories' => $categories,
            'products' => $products,
            'productNames' => $productNames,
            'unit_price' => $unit_prices,
            'quantity' => $quantities,
            'amount' => $amounts,
            'total_price' => $request->get('total_price'),
            'vat' => $request->get('vat'),
            'total_price_vat' => $request->get('totalAmountVat'),
            'discount' => $request->get('discount'),
            'discount_price' => $request->get('discountAmount'),
            'paid' => $request->get('paid'),
            'dues' => $request->get('dues'),
            'profit' => $request->get('net_profit'),
            'sold_by' => Auth::user()->name,
        );
        \DB::insert('insert into income(invoice_no, income_title, amount, status, collected_by, created_at, updated_at) VALUES
("'.$next_invoice.'", "'.'Sales'.'" , "'.$request->get('paid').'", "'.'Valid'.'", "'.Auth::user()->name.'", "'.date('Y-m-d H:i:s').'", "'.date('Y-m-d H:i:s').'")');
        \DB::insert('insert into net_balance(transaction_title, address, credit, debit, status, collected_by, created_at, updated_at) VALUES
("'.'Sales Profit'.'", "'.$next_invoice.'",  "'.$request->get('net_profit').'", "0", "'.'Valid'.'", "'.Auth::user()->name.'", "'.date('Y-m-d H:i:s').'", "'.date('Y-m-d H:i:s').'")');
        Sales::create($input);
        session()->put('sale_input', $input);
        return redirect('/prints');
    }
    public function show($id)
    {
        $old_sale=Sales::where('id', '=', $id)->first()->toArray();
        session()->put('old_sale', $old_sale);
        $categories = \DB::table('product_category')->lists('c_name', 'cid');
        $invoice= \DB::select('SELECT * FROM sales s where s.id='.$id);
        return view('sales.exchange', ['categories'=>$categories, 'invoice'=>$invoice]);
    }

    public function edit($id)
    {
        $sales=Sales::findOrFail($id);
        $categories = \DB::table('product_category')->lists('c_name', 'cid');
        return view('sales.edit', ['sales'=>$sales, 'categories'=>$categories]);
    }
    public function update(Request $request, $id)
    {
        \DB::update('UPDATE sales SET paid='.$request->get('old_paid').'+'.$request->get('paid').', dues='.$request->get('due').'  WHERE id='.$id);
        \DB::insert('insert into income(invoice_no, income_title, amount, status, collected_by, created_at, updated_at) VALUES ("'.$request->get('invoice_no').'", "'.'Sales (Arrear)'.'" , "'.$request->get('paid').'", "'.'Valid'.'", "'.Auth::user()->name.'", "'.date('Y-m-d H:i:s').'", "'.date('Y-m-d H:i:s').'")');
        return redirect('sales');

    }

    public function destroy(Request $request,$id)
    {
        $products=explode(",", $request->get('products'));
        $quantity=explode(",", $request->get('quantity'));

        for ($i = 0; $i < count($products); ++$i) {
            \DB::update('UPDATE stock SET quantity=quantity+"'.$quantity[$i].'" where pid="'.$products[$i].'"');
        }
        \DB::delete('DELETE FROM income WHERE invoice_no='.'"'.$request->get('invoice_no').'"');
        \DB::delete('DELETE FROM net_balance WHERE address='.'"'.$request->get('invoice_no').'"');
        \DB::insert('INSERT INTO return_list SELECT `id`, `invoice_no`, `customer_id`, `customer_address`, `categories`, `products`, `unit_price`, `quantity`, `amount`, `total_price`, `vat`, `total_price_vat`, `discount`, `discount_price`, `paid`, `dues`, `sold_by`, '.'"'.Auth::user()->name.'"'.' as return_by,  `created_at`, "'.date('Y-m-d H:i:s').'" as updated_at FROM sales WHERE id='.'"'.$id.'"');
        $data=Sales::findOrFail($id);
        $data->delete();
        return redirect('sales');
    }
    public function exchange(Request $request, $id)
    {
        $products=explode(",", session()->get('old_sale')['products']);
        $quantity=explode(",", session()->get('old_sale')['quantity']);
        for ($i = 0; $i < count($products); ++$i) {
            \DB::update('UPDATE stock SET quantity=quantity+"'.$quantity[$i].'" where pid="'.$products[$i].'"');
        }
        $categories='';
        $productNames='';
        $products='';
        $unit_prices='';
        $quantities='';
        $amounts='';
        for($i=1; $i<41; $i++){
            $category=$request->get('category'.$i);
            $product=$request->get('productName'.$i);
            $productName=$request->get('products'.$i);
            $unit_price=$request->get('price'.$i);
            $quantity=$request->get('quantity'.$i);
            $amount=$request->get('amount'.$i);

            if(isset($category)){
                $categories=$categories.$category.',';
            }
            if(isset($product)){
                $products=$products.$product.',';
                \DB::update('UPDATE stock SET quantity=round(quantity-'.$quantity.',2) WHERE cid='.$category.' AND pid='.$product);
            }
            if(isset($productName)){
                $productNames=$productNames.$productName.',';
            }
            if(isset($unit_price)){
                $unit_prices=$unit_prices.$unit_price.',';
            }
            if(isset($quantity)){
                $quantities=$quantities.$quantity.',';
            }
            if(isset($amount)){
                $amounts=$amounts.$amount.',';
            }
        }

        $input = array(
            'total_price' => $request->get('total_price'),
            'invoice_no' => $request->get('invoiceNo'),
            'customer_id' => $request->get('customerName'),
            'customer_address' => $request->get('address'),
            'categories' => $categories,
            'products' => $products,
            'productNames' => $productNames,
            'unit_price' => $unit_prices,
            'quantity' => $quantities,
            'amount' => $amounts,
            'total_price' => $request->get('total_price'),
            'vat' => $request->get('vat'),
            'total_price_vat' => $request->get('totalAmountVat'),
            'discount' => $request->get('discount'),
            'discount_price' => $request->get('discountAmount'),
            'paid' => $request->get('paid'),
            'dues' => $request->get('dues'),
            'profit' => $request->get('net_profit'),
            'sold_by' => Auth::user()->name,
        );

        $data=Sales::findOrFail($id);
        $data->update($input);

        \DB::delete('DELETE FROM income WHERE invoice_no='.'"'.$request->get('invoiceNo').'"');
        \DB::insert('insert into income(invoice_no, income_title, amount, status, collected_by, created_at, updated_at) VALUES
("'.$request->get('invoiceNo').'", "'.'Sales (Exchange)'.'" , "'.$request->get('paid').'", "'.'Valid'.'", "'.Auth::user()->name.'", "'.date('Y-m-d H:i:s').'", "'.date('Y-m-d H:i:s').'")');
        \DB::delete('DELETE FROM net_balance WHERE address='.'"'.$request->get('invoiceNo').'"');
        \DB::insert('insert into net_balance(transaction_title, address, credit, debit, status, collected_by, created_at, updated_at) VALUES
("'.'Sales Profit (Exchange)'.'", "'.$request->get('invoiceNo').'",  "'.$request->get('net_profit').'", "0", "'.'Valid'.'", "'.Auth::user()->name.'", "'.date('Y-m-d H:i:s').'", "'.date('Y-m-d H:i:s').'")');
        session()->put('sale_input', $input);
        return redirect('/prints');
    }

}
