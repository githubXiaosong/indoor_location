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
            <strong>移动物体列表</strong>&nbsp;&nbsp;
            <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-addObject">
                <span class="glyphicon  glyphicon-plus" aria-hidden="true"></span>
            </button>
            <!-- Modal -->
            <div class="modal fade" id="modal-addObject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <form action="{{ url('api/addObject') }}" method="post">
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
                                    <label>x</label>
                                    <input type="text" class="form-control" name="x">

                                </div>
                                <div class="form-group">
                                    <label>y</label>
                                    <input type="text" class="form-control" name="y">

                                </div>
                                <div class="form-group">
                                    <label>IP地址</label>
                                    <input type="text" class="form-control" name="ip_address"
                                           placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>初始状态</label>
                                    <input type="text" class="form-control" name="status"
                                           placeholder="0绿色 1红色">
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
                <th>名称</th>
                <th>位置</th>
                <th>IP</th>
                <th>状态</th>
                <th>操作</th>
            </tr>

            @foreach($objects as $object)
                <tr>
                    <td>
                        <input type="checkbox" aria-label="...">
                    </td>
                    <td>{{ $object->id }}</td>
                    <td>{{ $object->name }}</td>
                    <td>{{ $object->x }},{{ $object->y }}</td>
                    <td>{{ $object->ip_address }}</td>
                    <td>{{ $object->status }}</td>

                    <td>
                        <div class="dropdown">
                            <button class="btn btn-default btn-xs dropdown-toggle" type="button"
                                    id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="true">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">

                                <li>
                                    <a href="#" class="remove_object" object_id="{{ $object->id }}">
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
        $('.remove_object').click(function () {
            submit_as_form('{{ url('api/removeObject') }}', 'object_id', $(this).attr('object_id'));
        })
    </script>
@endsection
