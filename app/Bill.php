<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    protected $fillable=['bill_no', 'byer_name', 'byer_address', 'date'];
}
