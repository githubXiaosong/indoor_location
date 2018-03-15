<?php

namespace App\Http\Controllers\Service;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * 添加用户接口
     */
    public function addUser(){

        $validator = Validator::make(
            rq(),
            [
                'name'=>'required',
                'location'=>'required',
                'ip_address'=>'required',
                'authority'=>'required',
                'is_ban'=>'required',
            ],
            [
            ]
        );
        if ($validator->fails())
            return back()->with('err_msg', $validator->messages());

        $user = new User();
        $user->name = rq('name');
        $user->location = rq('location');
        $user->ip_address = rq('ip_address');
        $user->authority = rq('authority');
        $user->is_ban = rq('is_ban');
        if ($user->save())
            return  back()->with('suc_msg', '创建成功');
        return back()->with('err_msg', 'Server创建失败 数据库出错');
    }

    /**
     * 删除用户接口
     */
    public function removeUser(){
        $validator = Validator::make(
            rq(),
            [

            ],
            [
            ]
        );
        if ($validator->fails())
            return back()->with('err_msg', $validator->messages());

        $res1 = DB::table('user_msgs')->where('user_id',rq('user_id'))->delete();
        $res2 = DB::table('users')->where('id',rq('user_id'))->delete();
        if(!$res1 && !$res2)
            return back()->with('err_msg','删除失败 数据库出错');
        return back()->with('suc_msg','删除成功');
    }

    /**
     * 修改用户接口
     */
    public function modifyUser(){

        //校验

        //修改
    }

    /**
     * 发送消息接口
     */
    public function transmitMsg(){

        //验证

        //存进数据库

        //curl发送
    }

    /**
     * 接收消息接口
     */
    public function receiveMsg(){
        //存进数据库
    }

    /**
     * 上报位置接口
     */
    public function getLocation(){

    }
}
