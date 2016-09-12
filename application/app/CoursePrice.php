<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoursePrice extends Model
{
    public function courses()
    {
        return $this->belongsTo('App\Course');
    }
}
