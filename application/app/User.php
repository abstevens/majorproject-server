<?php

namespace app;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Is required only to get the "Student Code"
     * Since we want to keep one User entry but allow Switching schools
     * and each school will assign a different student code
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function schoolUsers()
    {
        return $this->hasMany('app\SchoolUser');
    }

    public function schools()
    {
        return $this->belongsToMany('app\School');
    }

    public function marks()
    {
        return $this->hasOne('app\Mark');
    }

    public function details()
    {
        return $this->hasMany('app\Detail');
    }

    public function contacts()
    {
        return $this->hasMany('app\Contact');
    }

    public function addresses()
    {
        return $this->hasOne('app\Address');
    }

    public function events()
    {
        return $this->hasMany('app\Event');
    }

    public function eventAttendances()
    {
        return $this->belongsToMany('app\EventAttendance');
    }

    public function finances()
    {
        return $this->hasOne('app\Finance');
    }

    public function courses()
    {
        return $this->belongsToMany('app\Course');
    }

    public function classes()
    {
        return $this->belongsToMany('app\Class');
    }

    public function news()
    {
        return $this->hasMany('app\News');
    }

    public function payments()
    {
        return $this->hasOne('app\Payment');
    }

    public function roles()
    {
        return $this->belongsToMany('app\Role');
    }
}
