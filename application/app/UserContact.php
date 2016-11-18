<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
