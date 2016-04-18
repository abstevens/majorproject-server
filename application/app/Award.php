<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    public function courses()
    {
        return $this->belongsTo('app\Course');
    }
}
