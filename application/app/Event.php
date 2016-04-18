<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function users()
    {
        return $this->belongsTo('app\User');
    }

    public function eventAttendances()
    {
        return $this->belongsToMany('app\EventAttendance');
    }
}
