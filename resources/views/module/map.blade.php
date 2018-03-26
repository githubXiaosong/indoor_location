@extends('layouts.stream')


@section('content-right')
    <script type="text/javascript"
            src="http://api.map.baidu.com/api?v=2.0&ak=05rNxOGimmznZGl6SWSGriOYq6MnnN99"></script>

    <div class="panel-heading">
        <div class="pull-left">
            <strong>地图</strong>&nbsp;&nbsp;
            <button type="button" class="btn btn-default btn-xs btn_refresh">
                <span class="glyphicon  glyphicon-refresh" aria-hidden="true"></span>
            </button>
        </div>
    </div>
    <div class="panel-body">

        <div id="allmap" style="display: block; height: 600px;width:100%; "></div>
    </div>




@endsection

@section('script')
    <script type="text/javascript">
        var map = new BMap.Map("allmap");    // 创建Map实例
        map.centerAndZoom(new BMap.Point(116.404, 39.915), 11);  // 初始化地图,设置中心点坐标和地图级别
        //添加地图类型控件
        map.addControl(new BMap.MapTypeControl({
            mapTypes: [
                BMAP_NORMAL_MAP,
                BMAP_HYBRID_MAP
            ]
        }));
        map.setCurrentCity("北京");          // 设置地图显示的城市 此项是必须设置的
        map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放

        $.post("/api/getObjectList", function (data, status) {
//            alert("Data: " + data + "nStatus: " + status);
            if (status == 'success') {
                for (var k = 0, length = data.length; k < length; k++) {

                    var point = new BMap.Point(data[k].x, data[k].y);
                    map.centerAndZoom(point, 17);
                    var marker = new BMap.Marker(point);  // 创建标注
                    map.addOverlay(marker);              // 将标注添加到地图中
                    var label = new BMap.Label(data[k].name, {offset: new BMap.Size(20, -10)});
                    label.setStyle({
                        color: data[k].status == 1 ? "red" : "green",
                        fontSize: "22px",
                        height: "20px",
                        lineHeight: "20px",
                        fontFamily: "微软雅黑"
                    });
                    marker.setLabel(label);
                }
            }

        });


    </script>
@endsection

