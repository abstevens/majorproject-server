<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function users()
    {
        return $this->belongsTo('app\User');
    }
}
