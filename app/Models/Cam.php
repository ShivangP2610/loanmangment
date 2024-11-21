<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cam extends Model
{
    use HasFactory; 


    protected $fillable = [
        'customer_id', 
        'lon_id', 
        'excel_uplod',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function loan()
    {
        return $this->belongsTo(FormOffice::class, 'lon_id');
    }
}
