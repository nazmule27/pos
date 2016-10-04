<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table="stock";
    protected $primaryKey="id";
    protected $fillable=['id', 'cid', 'pid', 'quantity', 'branch'];
}
