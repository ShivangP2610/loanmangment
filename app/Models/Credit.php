<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;  

    protected $fillable = [
        'customer_id', 
        'lon_id', 
        'cam_uplod', 
        'excel_uplod'
    ];
}
