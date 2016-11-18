<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'username', 'email', 'password', 'date_of_birth'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at', 'deleted_at',
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
        return $this->hasMany('App\SchoolUser');
    }

    public function schools()
    {
        return $this->belongsToMany('App\School');
    }

    public function marks()
    {
        return $this->hasOne('App\UserMark');
    }

    public function details()
    {
        return $this->hasMany('App\UserDetail');
    }

    public function contacts()
    {
        return $this->hasMany('App\UserContact');
    }

    public function addresses()
    {
        return $this->hasOne('App\UserAddress');
    }

    public function payments()
    {
        return $this->hasOne('App\UserPayment');
    }

    public function events()
    {
        return $this->hasMany('App\Event');
    }

    public function eventAttendances()
    {
        return $this->belongsToMany('App\Event_attendance');
    }

    public function finances()
    {
        return $this->hasOne('App\Finance');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Course');
    }

    public function classes()
    {
        return $this->belongsToMany('App\CourseClass');
    }

    public function news()
    {
        return $this->hasMany('App\News');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}
