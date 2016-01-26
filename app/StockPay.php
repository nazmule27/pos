<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockPay extends Model
{
    protected $table="stock_pay";
    protected $primaryKey="id";
    protected $fillable=['id', 'pid', 'total_price', 'discount', 'net_price', 'paid', 'due'];
}
