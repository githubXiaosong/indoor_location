<?php


namespace App\Http\Controllers\Page;

use App\Object;
use App\Terminal;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\Controller;

class CommonController extends Controller
{
    public function terminal(){

        $terminals = Terminal::get();

        return view("module.terminal")->with(['terminals' => $terminals]);
    }

    public function people(){

        $users = User::get();

        return view("module.people")->with(['users' => $users]);
    }

    public function object(){
        $objects = Object::get();
        return view("module.object")->with(['objects' => $objects]);
    }


    public function map(){
        return view("module.map");
    }


    public function terminal_msg($terminal_id){
        $terminal_msgs = Terminal::where('id',$terminal_id)->with(['terminal_msgs'])->first();
        if (!$terminal_msgs)
            return back();

        return view('module.terminal_msg')->with(['terminal_msgs' => $terminal_msgs]);
    }

    public function user_msg($user_id){
        $user_msgs = User::where('id',$user_id)->with(['user_msgs'])->first();
        if (!$user_msgs)
            return back();

        return view('module.user_msg')->with(['user_msgs' => $user_msgs]);
    }

}
