<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class EventAttendance extends Model
{
    public function users()
    {
        return $this->belongsToMany('app\User');
    }

    public function events()
    {
        return $this->belongsToMany('app\Event');
    }
}
