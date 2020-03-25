<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use Notifiable;

    private $upload = '/image/';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','photo_path', 'role_id', 'is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function getPhotoPathAttribute($photo){
        if ($photo){
        return $this->upload.$photo;
        }else{
            return null;
        }
    }

    public function isAdmin(){
        return $this->role_id == 1 ? true : false;
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }
}
