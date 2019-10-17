<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    // $specialty->users
    //Relacion mucho a mucho con tabla specialties
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    // $specialty->appointments
}
