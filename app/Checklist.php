<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $table = 'checklists';
    protected $fillable = [
    	'content','task_id'
    ];
    public function task(){
        return $this->belongsTo(Task::class);
    }
}
