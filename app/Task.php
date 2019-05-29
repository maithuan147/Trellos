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
    public function role(){
        return $this->belongsTo(Role::class);
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
