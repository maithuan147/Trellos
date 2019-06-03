<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $fillable = [
        'title',
        'description',
        'status',
    ];
    public function listtask(){
        return $this->belongstoMany( Listtask::class , 'roles','task_id','listtask_id');
    }
    
    public function attachment(){
        return $this->hasMany(Attachments::class);
    }

    public function checklist(){
        return $this->hasMany(Checklist::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function label(){
        return $this->hasMany(Label::class);
    }
}
