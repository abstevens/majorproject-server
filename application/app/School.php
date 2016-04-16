<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use SoftDeletes;

    /**
     * Is required only to get the "Student Code"
     * Since we want to keep one User entry but allow Switching schools
     * and each school will assign a different student code
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
//    public function schoolUsers()
//    {
//        return $this->hasMany('App\SchoolUser');
//    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
