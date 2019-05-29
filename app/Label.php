<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    protected $timestamps = false; 
    protected $table = 'attachments';
    protected $fillable = [
    	'name','task_id'
    ];
    public function task(){
        return $this->belongsTo(Task::class);
    }
}
