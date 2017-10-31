<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
    // Authentication - All we need to be able to authenticate user
    use \Illuminate\Auth\Authenticatable;

    public function posts(){

        // user can have many posts
        return $this->hasMany('App\Post');
    }
}
