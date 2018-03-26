<?php

namespace App\Http\Controllers\Service;

use App\Terminal;
use App\Terminal_msg;
use App\Utils\Helper;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TerminalController extends Controller
{

    public function getList(){
        return Terminal::get();
    }


    /**
     * 发送消息接口  0 APP->WEB   1 WEB->APP
     */
    public function transmitMsg()
    {

        //验证
        $validator = Validator::make(
            rq(),
            [
                'terminal_id' => 'required|exists:terminals,id',
                'text' => 'required',
            ],
            [
            ]
        );
        if ($validator->fails())
            return back()->with('err_msg', $validator->messages());

        dd(Helper::post(url("test"),['key' => "value"],4));


//        //存进数据库
//        $msg = new Terminal_msg();
//        $msg->terminal_id = rq('terminal_id');
//        $msg->text = rq('text');
//        $msg->tr = 1;
//        if ($msg->save())
//            return back()->with('suc_msg', '发送成功');
//        return back()->with('err_msg', 'Server创建失败 数据库出错');
    }

    /**
     * 接收消息接口
     */
    public function receiveMsg()
    {
        //存进数据库
    }

    /**
     * 添加终端接口
     */
    public function addTerminal()
    {
        $validator = Validator::make(
            rq(),
            [
                'name' => 'required',
                'location' => 'required',
                'ip_address' => 'required',
                'status' => 'required',
            ],
            [
            ]
        );
        if ($validator->fails())
            return back()->with('err_msg', $validator->messages());

        $terminal = new Terminal();
        $terminal->name = rq('name');
        $terminal->location = rq('location');
        $terminal->ip_address = rq('ip_address');
        $terminal->status = rq('status');
        if ($terminal->save())
            return back()->with('suc_msg', '创建成功');
        return back()->with('err_msg', 'Server创建失败 数据库出错');
    }

    /**
     * 删除终端接口
     */
    public function removeTerminal()
    {
        $validator = Validator::make(
            rq(),
            [

            ],
            [
            ]
        );
        if ($validator->fails())
            return back()->with('err_msg', $validator->messages());

        $res1 = DB::table('terminal_msgs')->where('terminal_id', rq('terminal_id'))->delete();
        $res2 = DB::table('terminals')->where('id', rq('terminal_id'))->delete();
        if (!$res1 && !$res2)
            return back()->with('err_msg', '删除失败 数据库出错');
        return back()->with('suc_msg', '删除成功');
    }

    /**
     * 修改终端接口
     */
    public function modifyTerminal()
    {

    }

    /**
     * 上报位置接口
     */
    public function getLocation()
    {

    }
}
