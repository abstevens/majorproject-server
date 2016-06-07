<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * Enable the file listing of related uploaded files
     */
    use \App\Traits\Files;
    protected $appends = ['files'];

    public function users()
    {
        return $this->belongsToMany('App\Event_attendance');
    }

    public function classes()
    {
        return $this->hasMany('App\Class');
    }

    public function awards()
    {
        return $this->hasMany('app\Award');
    }
}
