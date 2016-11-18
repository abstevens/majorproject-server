<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventAttendance extends Model
{
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function events()
    {
        return $this->belongsToMany('App\Event');
    }
}
