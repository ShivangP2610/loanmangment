<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Remainingpartner extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $table = 'partners_details';
    protected $primaryKey = 'co_partner_id';

    public function setPartnersNameAttribute($value)
    {
        $this->attributes['partners_name'] = strtoupper($value);
    }
}
