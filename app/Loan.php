<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $table="loan";
    protected $primaryKey="lid";
    protected $fillable=['lid', 'loan_title', 'taken_amount', 'duration_in_month', 'installment_count', 'installment_taka', 'status'];
}
