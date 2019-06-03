<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listtask extends Model
{
   // protected $table = 'listtasks';
    protected $fillable = [
    	'title'
    ];
    public function task(){
        return $this->belongstoMany(Task::class,'roles','listtask_id','task_id');
    }
}
