<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','activation_code','reset_password_code'
    ];

public function verified()
{
    $this->activated = 1;
    $this->activation_code = null;
    $this->save();
}
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

 public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

     public function hiremanagers()
    {
        return $this->hasOne('App\HireManager','id');
    }

     public function freelancer()
    {
        return $this->hasOne('App\Freelancer','id');
    }

     public function userprofile()
    {
        return $this->hasOne('App\Userprofile','user_id');
    }

    public function testimonies()
    {
        return $this->hasMany('App\Testmony');
    }

    public function awards()
    {
        return $this->hasMany('App\Award','id');
    }
    public function chatmessages()
    {
        return $this->hasMany('App\ChatMessage','id');
    }

    public function answertsheets()
    {
        return $this->hasMany('App\TestAnswerSheet','id');
    }
}



