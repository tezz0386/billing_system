<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $fillable=['shop_name', 'shop_assress', 'contact_no', 'pan_no', 'date_type'];
}
