<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    public function terminal_msgs(){
        return $this->hasMany('App\Terminal_msg');
    }


}
