<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    protected $table="payment_type";
    protected $primaryKey="ptid";
    protected $fillable=['ptid', 'payment_title'];
}
