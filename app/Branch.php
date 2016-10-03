<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table="branch";
    protected $primaryKey="id";
    protected $fillable=['branch_name'];
}
