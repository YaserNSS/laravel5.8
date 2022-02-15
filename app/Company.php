<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];

    //company has manay customers
    public function customers()
    {
        return $this->hasMany('App\Customer');
    }

}
