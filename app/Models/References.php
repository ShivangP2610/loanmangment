<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class References extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $table = 'customer_reference';
    protected $primaryKey = 'ref_id'; 

    protected $fillable = [
        'loan_id',
        'cust_id',
        'Name',
        'Address',
        'City',
        'pincode',
        'State',
        'Country',
        'Phone',
        'Mobile',
        'Email',
        'Relation_with_applicant',
    ]; 

}
