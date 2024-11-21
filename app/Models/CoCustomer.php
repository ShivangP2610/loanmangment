<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoCustomer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'co_customer_details';
    protected $primaryKey = 'co_cust_id';
}
