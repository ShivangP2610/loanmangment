<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Repayment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'repeyment_details';
    protected $primaryKey = 'repayment_id';

}
