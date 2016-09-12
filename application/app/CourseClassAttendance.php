<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseClassAttendance extends Model
{
    protected $table = 'course_class_attendance';

    public function courseUsers()
    {
        return $this->belongsToMany('App\CourseUser');
    }

    public function classes()
    {
        return $this->belongsToMany('App\CourseClass');
    }
}
