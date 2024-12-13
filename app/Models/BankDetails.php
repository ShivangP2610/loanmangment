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

    protected $fillable = [
        'loan_id',
        'cust_id',
        'bank_name',
        'branch_address',
        'account_holder_name',
        'account_number',
        'Type_of_Account',
        'account_oprete_since',
        'ifsc_code',
        'micr_code',
    ];

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
