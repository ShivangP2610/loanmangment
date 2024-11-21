<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CountryCode extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'countrycode';
    protected $primaryKey = 'id';
}
