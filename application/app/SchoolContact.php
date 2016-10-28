<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolContact extends Model
{
    protected $hidden = [
        'id', 'school_id', 'created_at', 'updated_at', 'deleted_at',
    ];

    public function users()
    {
        return $this->belongsTo('App\School');
    }
}
