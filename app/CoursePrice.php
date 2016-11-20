<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoursePrice extends Model
{
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    public function courses()
    {
        return $this->belongsTo('App\Course');
    }
}
