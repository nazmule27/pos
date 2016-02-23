<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table="sales";
    protected $primaryKey="id";
    protected $fillable=['id', 'invoice_no', 'customer_id', 'customer_address', 'categories', 'products', 'unit_price', 'quantity', 'amount', 'total_price', 'vat', 'total_price_vat', 'discount', 'discount_price', 'paid', 'dues', 'profit', 'sold_by', 'created_at'];
}
