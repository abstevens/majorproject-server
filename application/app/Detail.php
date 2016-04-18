<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    public function users()
    {
        return $this->belongsTo('app\User');
    }
}
