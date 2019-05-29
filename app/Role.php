<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // protected $timestamps = false;
    protected $table = 'roles';
    protected $fillable = [
    	'author','content_code','type','user_id','listtask_id','task_id',
    ];
    public function user(){
        return $this->hasMany(User::class);
    }
    public function task(){
        return $this->hasMany(Task::class);
    }
    public function listtask(){
        return $this->hasMany(Listtask::class);
    }
}
