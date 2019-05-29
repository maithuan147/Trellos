<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listtask extends Model
{
   // protected $table = 'listtasks';
    protected $fillable = [
    	'title'
    ];
    public function role(){
        return $this->belongsTo(Role::class);
    }
}
