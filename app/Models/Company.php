<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
