<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    protected $fillable = [
        'content',
        'task_id',
        'user_id'
    ];
    
    public function task(){
        return $this->belongsTo(Task::class);
    }

    protected $table = 'comments';
}
