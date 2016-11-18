<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    public function users()
    {
        return $this->belongsTo('app\User');
    }
}
