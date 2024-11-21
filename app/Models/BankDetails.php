<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankDetails extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'account_details';
    protected $primaryKey = 'account_id';

    public function setBankNameAttribute($value)
    {
        $this->attributes['bank_name'] = ucwords($value);
    }
    public function setAccountHolderNameAttribute($value)
    {
        $this->attributes['account_holder_name'] = ucwords($value);
    }
    public function setTypeOfAccountAttribute($value)
    {
        $this->attributes['Type_of_Account'] = ucwords($value);
    }
}
