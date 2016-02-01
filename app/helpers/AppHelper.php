<?php
/**
 * Created by PhpStorm.
 * User: Nazmul
 * Date: 2/1/2016
 * Time: 1:40 PM
 */
use App\Http\Requests;

class AppHelper {
    public static function getProductByCid($cid){
        $products = \DB::table('product')->where('cid',$cid)->lists('p_name', 'pid');
        return $products;
    }
    public static function getBoughtPrice($pid){
        $boughtPrice= \DB::select('SELECT ROUND(buying_price , 2) AS buying_price FROM product where pid='.$pid);
        return $boughtPrice;
    }
    public static function getAvailable($pid){
        $available = \DB::select('SELECT ROUND(quantity , 2) AS quantity FROM stock where pid='.$pid);
        return $available;
    }
    public static function getProductName($pid){
        $productName= \DB::select('SELECT p_name FROM product where pid='.$pid);
        return $productName;
    }
}