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

    <div class="panel-heading">
        <div class="pull-left">
            <strong>人员列表</strong>&nbsp;&nbsp;
            <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-addUser">
                <span class="glyphicon  glyphicon-plus" aria-hidden="true"></span>
            </button>
            <!-- Modal -->
            <div class="modal fade" id="modal-addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <form action="{{ url('api/addUser') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">添加设备</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>姓名</label>
                                    <input type="text" class="form-control" name="name"
                                           placeholder="终端名">
                                </div>
                                <div class="form-group">
                                    <label>初始位置</label>
                                    <input type="text" class="form-control" name="location"
                                           placeholder=" {''x'':00,''y'':00,''z'':00}">
                                </div>
                                <div class="form-group">
                                    <label>IP地址</label>
                                    <input type="text" class="form-control" name="ip_address"
                                           placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label>初始状态</label>
                                    <input type="text" class="form-control" name="authority"
                                           placeholder="0 1 2 3 4">
                                </div>
                                <div class="form-group">
                                    <label>初始状态</label>
                                    <input type="text" class="form-control" name="is_ban"
                                           placeholder="0 or 1">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                <button type="submit" class="btn btn-primary">添加</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>


        <div class="clearfix"></div>
    </div>




    <div class="panel-body">
        <table class="table tbl_streams">
            <tr>
                <th></th>
                <th>id</th>
                <th>姓名</th>
                <th>位置</th>
                <th>IP</th>
                <th>是否禁止</th>
                <th>权限等级</th>
                <th>操作</th>
            </tr>

            @foreach($users as $user)
                <tr>
                    <td>
                        <input type="checkbox" aria-label="...">
                    </td>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    @if($user->location)
                        <td>{{ json_decode($user->location)->x}},{{ json_decode($user->location)->y}}
                            ,{{ json_decode($user->location)->z}}</td>
                    @endif
                    <td>{{ $user->ip_address }}</td>
                    <td>{{ $user->authority }}</td>
                    <td>{{ $user->is_ban }}</td>

                    <td>
                        <div class="dropdown">
                            <button class="btn btn-default btn-xs dropdown-toggle" type="button"
                                    id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="true">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">

                                <li>
                                    <a href="{{ url('page/user_msg').'/'.$user->id }}" class="toggle_forbidden">
                                        收发信息
                                    </a>
                                </li>
                                <li>
                                    <a href="#"class="remove_user" user_id="{{ $user->id }}">
                                        删除
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach


        </table>
    </div>




@endsection

@section('script')
    <script>
        $('.remove_user').click(function () {
            submit_as_form('{{ url('api/removeUser') }}', 'user_id', $(this).attr('user_id'));
        })
    </script>
@endsection
