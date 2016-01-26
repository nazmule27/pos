<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="product_category";
    protected $primaryKey="cid";
    protected $fillable=['c_name'];
}
