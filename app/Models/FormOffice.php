<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class FormOffice extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'loan_application';
    protected $primaryKey = 'loan_id';

}
