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
            <strong>终端列表</strong>&nbsp;&nbsp;
            <button type="button" class="btn btn-default btn-xs " data-toggle="modal" data-target="#modal-addTerminal">
                <span class="glyphicon  glyphicon-plus" aria-hidden="true"></span>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="modal-addTerminal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <form action="{{ url('api/addTerminal') }}" method="post">
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
                                    <label>终端名</label>
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
                                    <input type="text" class="form-control" name="status"
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
                <th>终端名</th>
                <th>位置</th>
                <th>IP地址</th>
                <th>状态</th>
                <th>操作</th>
            </tr>


            @foreach($terminals as $terminal)
                <tr>
                    <td>
                        <input type="checkbox" aria-label="...">
                    </td>
                    <td>{{ $terminal->id }}</td>
                    <td>{{ $terminal->name }}</td>
                    @if($terminal->location)

                        <td>{{ json_decode($terminal->location)->x}},{{ json_decode($terminal->location)->y}}
                            ,{{ json_decode($terminal->location)->z}}</td>
                    @endif
                    <td>{{ $terminal->ip_address }}</td>
                    <td>{{ $terminal->status }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-default btn-xs dropdown-toggle" type="button"
                                    id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="true">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">

                                <li>
                                    <a href="{{ url('page/terminal_msg').'/'.$terminal->id }}" class="toggle_forbidden">
                                        收发信息
                                    </a>
                                </li>
                                <li>
                                    <a class="delete_terminal" terminal_id="{{ $terminal->id }}" >
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
        $('.delete_terminal').click(function () {
            submit_as_form('{{ url('api/removeTerminal') }}', 'terminal_id', $(this).attr('terminal_id'));
        })
    </script>
@endsection
