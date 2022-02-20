<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];

    public function getActiveAttribute($attribute)
    {
        return $this->activeOptions()[$attribute];

    }


    protected $attributes = [
        'active' =>1,
    ]; //default active



    public function scopeActive($query)
    {
        return $query->where('active',1);
    }
    public function scopeInactive($query)
    {
        return $query->where('active',0);
    }

    //customer has belong to company
    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function activeOptions()
    {

        return [
            1 => 'Active',
            0 => 'Inactive'

        ];
    }
}
