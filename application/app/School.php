<?php

namespace app;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'date'];

    /**
     * @param string $name
     * @return bool
     */
    public function setName($name)
    {
        if (!empty($name) && strlen($name) > 3) {
            $this->name = $name;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Is required only to get the "Student Code"
     * Since we want to keep one User entry but allow Switching schools
     * and each school will assign a different student code
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
//    public function schoolUsers()
//    {
//        return $this->hasMany('App\SchoolUser');
//    }

    public function users()
    {
        return $this->belongsToMany('app\User');
    }
}
