<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function users()
    {
        return $this->belongsToMany('app\Event_attendance');
    }

    public function classes()
    {
        return $this->hasMany('app\Class');
    }

    public function awards()
    {
        return $this->hasMany('app\Award');
    }
}
