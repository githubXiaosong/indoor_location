<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Object;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class ObjectController extends Controller
{

    /**
     * 添加物体接口
     */
    public function addObject()
    {
        $validator = Validator::make(
            rq(),
            [
                'name' => 'required',
                'x' => 'required',
                'y' => 'required',
                'ip_address' => 'required',
                'status' => 'required',
            ],
            [
            ]
        );
        if ($validator->fails())
            return back()->with('err_msg', $validator->messages());

        $object = new Object();
        $object->name = rq('name');
        $object->x = rq('x');
        $object->y = rq('y');
        $object->ip_address = rq('ip_address');
        $object->status = rq('status');
        if ($object->save())
            return back()->with('suc_msg', '创建成功');
        return back()->with('err_msg', 'Server创建失败 数据库出错');


    }

    /**
     * 删除物体接口
     */
    public function removeObject()
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


        $res1 = DB::table('objects')->where('id', rq('object_id'))->delete();
        if (!$res1)
            return back()->with('err_msg', '删除失败 数据库出错');
        return back()->with('suc_msg', '删除成功');
    }


    //
    /**
     * 上报位置接口
     */
    public function getList()
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

        return Object::get();
    }

    /**
     * 接收消息接口
     */
    public function updateLocation()
    {
        //存进数据库
        $validator = Validator::make(
            rq(),
            [
                'id'=>'required|exists:objects,id',
                'x' => 'required',
                'y' => 'required',
                'status' => 'required',
            ],
            [
            ]
        );
        if ($validator->fails())
            return ['res_code' => 2,'err_msg'=> $validator->messages()];


        $object = Object::find(rq('id'));
        $object->x = rq('x');
        $object->y = rq('y');
        $object->status = rq('status');
        $object->save();
        return ['res_code'=>0];

    }



}
