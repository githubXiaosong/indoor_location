@extends('layouts.stream')


@section('content-right')


    @if (session('suc_msg'))
        <div class="alert alert-success">
            {{ session('suc_msg') }}
        </div>
    @endif

    @if (session('err_msg'))
        <div class="alert alert-danger">
            {{ session('err_msg') }}
        </div>
    @endif

    <div class="panel-heading" style="margin-bottom: 4%">
        <div class="pull-left">
            <strong>id:{{ $terminal_msgs->id }}&nbsp;&nbsp;终端名:{{ $terminal_msgs->name }}
                &nbsp;&nbsp;地址:{{ $terminal_msgs->ip_address }}&nbsp;&nbsp;</strong>&nbsp;&nbsp;
            <button type="button" class="btn btn-default btn-xs btn_refresh">
                <span class="glyphicon  glyphicon-refresh" aria-hidden="true"></span>
            </button>
        </div>
    </div>
    <div class="panel-body">
        <strong>历史记录</strong>
        <table class="table table-hover">
            <tr>
                <th>信息</th>
                <th>收/发</th>
                <th>时间</th>
            </tr>
            @foreach($terminal_msgs->terminal_msgs as $msg)
                <tr>
                    <td>{{ $msg->text }}</td>
                    <td>{{ $msg->tr==0?'发送':'接收' }}</td>
                    <td>{{ $msg->created_at }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="panel-body">
        <strong>发送消息</strong>
        <form action="{{ url('api/transmitMsg') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="terminal_id" value={{ $terminal_msgs->id }}>
            <div class="form-group">
                <input name="text" type="text" class="form-control" id="msg" placeholder="消息">
            </div>
            <button type="submit" class="btn btn-default">发送</button>
        </form>
    </div>





@endsection

@section('script')

@endsection
