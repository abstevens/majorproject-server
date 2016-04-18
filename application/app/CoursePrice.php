<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class CoursePrice extends Model
{
    public function users()
    {
        return $this->belongsTo('app\User');
    }

    public function courses()
    {
        return $this->belongsTo('app\Course');
    }
}
