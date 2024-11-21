<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Proprietor extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $table = 'proprietor_details';
    protected $primaryKey = 'proprietor_id';
}
