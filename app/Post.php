<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
        
        // Post belongs to a user
        return $this->belongsTo('App\User');
    }
}
