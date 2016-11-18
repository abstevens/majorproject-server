<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolCourse extends Model
{
    protected $table = 'school_course';

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    public function schools()
    {
        return $this->belongsToMany('App\School');
    }

    public function users()
    {
        return $this->belongsToMany('App\Course');
    }
}
