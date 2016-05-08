<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consumer extends Model
{
    protected $table="consumer";
    protected $primaryKey="id";
    protected $fillable=['id', 'name', 'address', 'type'];
}
