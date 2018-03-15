<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    public function user_msgs(){
        return $this->hasMany('App\User_msg');
    }
}
