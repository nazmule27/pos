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
Route::get('/contact', function (){
    return view('contact');
});

Route::group(['middleware' => 'auth'], function() {
// Registration routes...
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');

    Route::resource('stock', 'StockController');
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
    Route::resource('sales', 'SalesController');
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
    //Route::get('sales.exchange_edit', 'SalesController@editExchange');
    //Route::post('sales.exchange_update', 'SalesController@updateExchange');
});

Route::get('/ajax-product', function (){
    $cid=Input::get('cid');
    $products=Product::where('cid', '=', $cid)->get();
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
