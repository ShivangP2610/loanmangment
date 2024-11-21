<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory; 

    protected $fillable = [
        'customer_id', 
        'lon_id', 
        'identity_proof', 
        'bank_statement', 
        'salary_slip', 
        'proprietor_id',  
        'status',
        'business_proof',
        'adresss_proof'
       

      
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function loan()
    {
        return $this->belongsTo(FormOffice::class, 'lon_id');
    }  

    public function  proprietorDetails()
    {
        return $this->belongsTo(Proprietor::class,'proprietor_id','proprietor_id');
    }
     
}
