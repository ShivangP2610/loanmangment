<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adjustable extends Model
{
    use HasFactory; 

    protected $fillable = [ 
        'loan_id',
        'cust_id',
        'charges_detail',
        'percentage',
        'amount', 
        'total_amount'
    ];
}
