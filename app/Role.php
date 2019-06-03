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
        return $this->belongsToMany(User::class);
    }
    public function task(){
        return $this->belongsToMany(Task::class);
    }
    public function listtask(){
        return $this->belongsToMany(Listtask::class);
    }
}
