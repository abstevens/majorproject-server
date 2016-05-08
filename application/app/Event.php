<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function eventAttendances()
    {
        return $this->belongsToMany('App\EventAttendance');
    }
}
