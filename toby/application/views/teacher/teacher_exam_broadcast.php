<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>		
		<link href="../application/style/assets/css/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
	</head>
    <body style="background:background-color;background-color: transparent;">
    	
 <div class="panel panel-danger" style="margin-top:20px">   	
<form class="form-horizontal" method="post" action="../teacher/broadcast_add">
    		
  <div class="form-group" style="width:80%;margin: 0 auto;margin-top: 70px;">
    <label style="margin-left: 0px;" class="col-sm-1 control-label">通知消息</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="content" id="tongzhi" placeholder="通知消息内容">
    </div>
  </div>
  <div class="col-sm-offset-2 col-sm-10"  style="width:80%;margin: 0 auto;margin-top: 20px;">
      <input type="submit" style="float: right;" class="btn btn-default" 
      onclick="song()" value="发布" />
  </div>
</form>
  <div style="width:80%;margin: 0 auto;margin-top: 100px;">
<table class="table table-bordered" >
      <thead>
        <tr>
          <th width="45px" scope="row">序号</th>
          <th>通知消息内容</th>
		  <th width="150px">发布时间</th>
          <th width="50px">操作</th>
        </tr>
      </thead>
      <tbody>
        {% for v in data %}
        <tr>
          <th scope="row">{{ v.id }}</th>
          <td>{{ v.content }}</td>
          <td>{{ v.time }}</td>
          <td><a href="../teacher/broadcast_delete/{{ v.id }}">删除</a></td>
        </tr>
        {% endfor %}
      </tbody>
    </table>		
			<ul class="pagination" style="float: right;">
    <li><a href="#">&laquo;</a></li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li><a href="#">&raquo;</a></li>
</ul>
</div>
</div>
 
	</body>

  <script>
    var msg = document.getElementById("msg");
    var wsServer = 'ws://123.207.235.125:9501';
    //调用websocket对象建立连接：
    //参数：ws/wss(加密)：//ip:port （字符串）
    var websocket = new WebSocket(wsServer);
    //onopen监听连接打开
    websocket.onopen = function (evt) {
        //websocket.readyState 属性：
        /*
        CONNECTING    0    The connection is not yet open.
        OPEN    1    The connection is open and ready to communicate.
        CLOSING    2    The connection is in the process of closing.
        CLOSED    3    The connection is closed or couldn't be opened.
        */
        //msg.innerHTML = websocket.readyState;
    };

    function song(){
        var tongzhi = document.getElementById('tongzhi').value;
        //document.getElementById('tongzhi').value = '';
        //向服务器发送数据
        websocket.send(tongzhi);

        return false;
    }
      //监听连接关闭
//    websocket.onclose = function (evt) {
//        console.log("Disconnected");
//    };

    //onmessage 监听服务器数据推送
    websocket.onmessage = function (evt) {
        // msg.innerHTML += evt.data +'<br>';
        //alert(evt.data);
//        console.log('Retrieved data from server: ' + evt.data);
    };
//监听连接错误信息
//    websocket.onerror = function (evt, e) {
//        console.log('Error occured: ' + evt.data);
//    };

</script>
</html>
