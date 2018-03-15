@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-2">
                <div class="list-group">
                    <a href="{{url('page/terminal')}}" class="list-group-item {{ \Illuminate\Support\Facades\Request::is('page/terminal') || \Illuminate\Support\Facades\Request::is('page/terminal_msg/*') ? 'active' : '' }}">控制设备管理</a>
                    <a href="{{url('page/people')}}" class="list-group-item {{ \Illuminate\Support\Facades\Request::is('page/people') || \Illuminate\Support\Facades\Request::is('page/user_msg/*')  ? 'active' : '' }} ">人员管理</a>
                    <a href="{{url('page/object')}}" class="list-group-item {{ \Illuminate\Support\Facades\Request::is('page/object') ? 'active' : '' }} ">移动物体监测</a>
                    <a href="{{url('page/map')}}" class="list-group-item {{ \Illuminate\Support\Facades\Request::is('page/map') ? 'active' : '' }} ">移动物体监测地图</a>
                    {{--<a  class="list-group-item {{ \Illuminate\Support\Facades\Request::is('page/tr_msg/*') ? 'active' : '' }}">收发信息</a>--}}
                </div>
            </div>

            <div class="col-md-10">
                @yield('content-right')
            </div>
        </div>
    </div>

@endsection



