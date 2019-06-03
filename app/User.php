<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // public $timestamps = false;
    //protected $table = 'users';
    protected $fillable = [
        'name',
        'password',
        'email',
        'image',
        'status'
    ];
    public function role(){
        return $this->belongsToMany(User::class , 'roles','task_id','user_id');
    }
}
