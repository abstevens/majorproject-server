<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * Enable the file listing of related uploaded files
     */
    use Traits\Files;
    protected $appends = ['files'];

    protected $hidden = [
        'created_at', 'pivot', 'updated_at', 'deleted_at',
    ];

    public function users()
    {
        return $this->belongsToMany('App\Event_attendance');
    }

    public function classes()
    {
        return $this->hasMany('App\CourseClass');
    }

    public function awards()
    {
        return $this->hasMany('app\CourseAward');
    }
}
