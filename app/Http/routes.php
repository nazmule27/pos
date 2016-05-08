<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Http\Request;

use App\Product;
use App\Loan;
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('/', function () {
    return view('home');
});
Route::get('/home', function (){
    return view('home');
});
Route::resource('contact', 'ContactController');
Route::post('contact_request','ContactController@getContactUsForm');
Route::any('contact_success','ContactController@success');
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
Route::group(['middleware' => 'auth'], function() {
// Registration routes...
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');

    Route::resource('stock', 'StockController');
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
    Route::resource('sales', 'SalesController');
    Route::any('sales/exchange/{id}', 'SalesController@exchange');
    Route::any('return_list', 'SalesController@return_list');
    Route::get('/prints', function (){
        return view('sales.print');
    });
    Route::resource('stock_pay', 'StockPayController');
    Route::get('/report/payment', function (){
        $payments=\DB::select('SELECT * FROM payment');
        return view('report.payment',['payments'=>$payments]);
    });
    Route::resource('payment_type', 'PaymentTypeController');
    Route::resource('payment', 'PaymentController');
    Route::resource('loan', 'LoanController');
    Route::resource('installment', 'LoanInstallmentController');
    Route::resource('balancesheet', 'BalancesheetController');
    Route::resource('consumer', 'ConsumerController');
    //Route::get('sales.exchange_edit', 'SalesController@editExchange');
    //Route::post('sales.exchange_update', 'SalesController@updateExchange');

});

Route::get('/ajax-product', function (){
    $cid=Input::get('cid');
    $products=Product::where('cid', '=', $cid)->orderBy('p_name')->get();
    return Response::json($products);
});
Route::get('/ajax-product-stock', function (){
    $pid=Input::get('pid');
    $products=Product::where('pid', '=', $pid)->get();
    //$products=\DB::select('SELECT p.pid, p.cid, p.p_name, p.buying_price, p.selling_price,s.quantity FROM product p, stock s WHERE p.pid=s.pid AND p.pid='.$pid);
    return Response::json($products);
});
Route::get('/ajax-product-price', function (){
    $pid=Input::get('pid');
    //$products=Product::where('pid', '=', $pid)->get();
    $products=\DB::select('SELECT p.pid, p.cid, p.p_name, ROUND(p.buying_price,2) as buying_price, ROUND(p.selling_price, 2) as selling_price, ROUND(s.quantity, 2) as quantity FROM product p, stock s WHERE p.pid=s.pid AND p.pid='.$pid);
    return Response::json($products);
});
Route::get('/ajax-stock-product-price', function (){
    $pid=Input::get('pid');
    $products=Product::where('pid', '=', $pid)->get();
    return Response::json($products);
});
Route::get('/ajax-loan-installment', function (){
    $lid=Input::get('lid');
    $loan=Loan::where('lid', '=', $lid)->get();
    return Response::json($loan);
});
Route::get('/balance', function (){
    $sheet=\DB::select('SELECT @a:=@a+1 sl, xx.* FROM
(SELECT income_title AS title, invoice_no AS address, "-" AS dr, amount AS cr, created_at FROM income
UNION ALL
SELECT payment_title AS title, purpose AS address, amount AS dr, "-" AS cr, created_at FROM payment ORDER BY created_at DESC) xx, (SELECT @a:= 0) AS a;');
    return Response::json($sheet);
});

Route::get('/ajax-client', function (){
    $cname=Input::get('term');
    $client=\DB::select('SELECT name, address FROM consumer WHERE type='.'"client" and name like '.'"%'.$cname.'%"');
    foreach ($client as $row) {
        $data[] = $row->name;
    }
    if( isset($data) && ($data!=null) ) {
        return Response::json($data);
    }

});
Route::get('/ajax-client-address', function (){
    $cname=Input::get('name');
    $address=\DB::select('SELECT DISTINCT address FROM consumer WHERE type='.'"client" and name='.'"'.$cname.'"');
    return Response::json($address);
});

Route::get('/ajax-vendor', function (){
    $vname=Input::get('term');
    $vendor=\DB::select('SELECT name, address FROM consumer WHERE type='.'"vendor" and name like '.'"%'.$vname.'%"');
    foreach ($vendor as $row) {
        $data[] = $row->name;
    }
    if( isset($data) && ($data!=null) ) {
        return Response::json($data);
    }
});
Route::get('/ajax-vendor-address', function (){
    $vname=Input::get('name');
    $address=\DB::select('SELECT DISTINCT address FROM consumer WHERE type='.'"vendor" and name='.'"'.$vname.'"');
    return Response::json($address);
});