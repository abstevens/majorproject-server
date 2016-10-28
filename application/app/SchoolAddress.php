<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolAddress extends Model
{
    protected $hidden = [
        'id', 'school_id', 'created_at', 'updated_at', 'deleted_at',
    ];

    public function schools()
    {
        return $this->belongsTo('App\School');
    }
}
