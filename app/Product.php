<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="product";
    protected $primaryKey="pid";
    protected $fillable=['cid', 'p_name', 'buying_price', 'selling_price'];
}
