<!DOCTYPE html>
<html>
  <head>
    <title>学生页面</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />
    
     <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="icon" type="image/ico" href="http://tattek.com/minimal/../application/style/assets/images/favicon.ico" />
    <!-- Bootstrap -->
    <link href="../application/style/assets/css/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="../application/style/assets/css/vendor/animate/animate.min.css">
    <link type="text/css" rel="stylesheet" media="all" href="../application/style/assets/js/vendor/mmenu/css/jquery.mmenu.all.css" />
    <link rel="stylesheet" href="../application/style/assets/js/vendor/videobackground/css/jquery.videobackground.css">
    <link rel="stylesheet" href="../application/style/assets/css/vendor/bootstrap-checkbox.css">

    <link rel="stylesheet" href="../application/style/assets/js/vendor/rickshaw/css/rickshaw.min.css">
    <link rel="stylesheet" href="../application/style/assets/js/vendor/morris/css/morris.css">
    <link rel="stylesheet" href="../application/style/assets/js/vendor/tabdrop/css/tabdrop.css">
    <link rel="stylesheet" href="../application/style/assets/js/vendor/summernote/css/summernote.css">
    <link rel="stylesheet" href="../application/style/assets/js/vendor/summernote/css/summernote-bs3.css">
    <link rel="stylesheet" href="../application/style/assets/js/vendor/chosen/css/chosen.min.css">
    <link rel="stylesheet" href="../application/style/assets/js/vendor/chosen/css/chosen-bootstrap.css">

    <link href="../application/style/assets/css/minimal.css" rel="stylesheet">

    <script language="JavaScript">
  function re_fresh() {
    var request = new XMLHttpRequest();
    request.open("GET", "exam_situation");
    request.send(); 
    request.onreadystatechange = function() {
        if (request.readyState===4) {
            if (request.status===200) { 
                if(request.responseText==0)
                  {
                   alert("考试结束!");
                   location.href="../";
                  }
                }
            }
        } 
  }
    setInterval('re_fresh()',{{ data.time }}*1000); //指定2秒刷新一次
    </script>


  </head>
  <body class="bg-1">
    <!-- Wrap all page content here -->
    <div id="wrap">
      <!-- Make page fluid -->
      <div class="row">
         <!-- Fixed navbar -->
        <div class="navbar navbar-default navbar-fixed-top navbar-transparent-black mm-fixed-top" role="navigation" id="navbar">
 
          <!-- Branding -->
          <div class="navbar-header col-md-2">
            <a class="navbar-brand" href="../student/student_intro"  target="menuFrame">
              <strong>student</strong>
            </a>
            
          </div>
          <!-- Branding end 
          <div class="copyrights">Collect from <a href="http://www.cssmoban.com/"  title="网站模板">网站模板</a></div>
-->

          <!-- .nav-collapse -->
          <div class="navbar-collapse">
                        
            <!-- Page refresh -->
            <ul class="nav navbar-nav refresh">
              <li class="divided">
                <a href="#" class="page-refresh"><i class="fa fa-refresh"></i></a>
              </li>
            </ul>
            <!-- /Page refresh -->

            <!-- Search -->
            <div class="search" id="main-search" style="float: right;margin-right:30px;">
            
            			<i class="fa fa-search"></i> <input type="text" placeholder="Search...">
            		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            			 <i class="glyphicon glyphicon-user"></i>欢迎你,
              <span>{{ data.user }}</span>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <!-- <a href="../index/logout" class="btn btn-danger">退出系统</a> -->
             
              </div>
           

            <!-- Sidebar--> <!-- Collapsed search pasting here at 768px -->
            <ul class="nav navbar-nav side-nav" id="sidebar">
              
              <!--<li class="collapsed-content"> 
                <ul>
                  <li class="search"></li>
                </ul>
              </li>-->
              
              
              <li class="navigation" id="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="#navigation"><font color="#000" size="6px">系统管理</font><i class="fa fa-angle-up"></i></a>
                
                <ul class="menu">
                  
                  <li class="active">
                    <a href="../student/student_intro"  target="menuFrame">
                      <i class="fa fa-tachometer"></i><font color="#000" size="4px">首页</font>
                      <!--<span class="badge badge-red">1</span>-->
                    </a>
                  </li>

                  <li class="dropdown">
                    <a href="../student/student_download" target="menuFrame">
                      <i class="fa fa-list"></i> <font color="#000" size="4px">试卷下载</font>
                    </a>
                  </li>

                  <li class="dropdown">
                    <a href="../student/student_upload" target="menuFrame">
                      <i class="fa fa-pencil"></i> <font color="#000" size="4px">答案上传</font>
                    </a>
                   
                  </li>

          </div>
          <!--/.nav-collapse -->
        </div>
        <!-- Fixed navbar end -->
            
        <!-- Page content -->
        <div id="content" class="col-md-12">
       

 <div id="page_content" style="margin-top: 10px; margin-bottom: 10px;">
         <iframe id="menuFrame" name="menuFrame" src="../student/student_intro" scrolling="auto" allowtransparency="yes" style="width:100%;height:670px;float: left; border: none;">
             </iframe>
 </div>


        </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../application/style/assets/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../application/style/assets/js/vendor/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="../application/style/assets/js/vendor/mmenu/js/jquery.mmenu.min.js"></script>
    <script type="text/javascript" src="../application/style/assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="../application/style/assets/js/vendor/nicescroll/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="../application/style/assets/js/vendor/animate-numbers/jquery.animateNumbers.js"></script>
    <script type="text/javascript" src="../application/style/assets/js/vendor/videobackground/jquery.videobackground.js"></script>
    <script type="text/javascript" src="../application/style/assets/js/vendor/blockui/jquery.blockUI.js"></script>

    <script src="../application/style/assets/js/vendor/flot/jquery.flot.min.js"></script>
    <script src="../application/style/assets/js/vendor/flot/jquery.flot.time.min.js"></script>
    <script src="../application/style/assets/js/vendor/flot/jquery.flot.selection.min.js"></script>
    <script src="../application/style/assets/js/vendor/flot/jquery.flot.animator.min.js"></script>
    <script src="../application/style/assets/js/vendor/flot/jquery.flot.orderBars.js"></script>
    <script src="../application/style/assets/js/vendor/easypiechart/jquery.easypiechart.min.js"></script>

    <script src="../application/style/assets/js/vendor/rickshaw/raphael-min.js"></script> 
    <script src="../application/style/assets/js/vendor/rickshaw/d3.v2.js"></script>
    <script src="../application/style/assets/js/vendor/rickshaw/rickshaw.min.js"></script>

    <script src="../application/style/assets/js/vendor/morris/morris.min.js"></script>

    <script src="../application/style/assets/js/vendor/tabdrop/bootstrap-tabdrop.min.js"></script>

    <script src="../application/style/assets/js/vendor/summernote/summernote.min.js"></script>

    <script src="../application/style/assets/js/vendor/chosen/chosen.jquery.min.js"></script>

    <script src="../application/style/assets/js/minimal.min.js"></script>
  </body>
<script>
    //var msg = document.getElementById("msg");
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
        var text = document.getElementById('text').value;
        document.getElementById('text').value = '';
        //向服务器发送数据
        websocket.send(text);
    }
      //监听连接关闭
//    websocket.onclose = function (evt) {
//        console.log("Disconnected");
//    };

    //onmessage 监听服务器数据推送
    websocket.onmessage = function (evt) {
        // msg.innerHTML += evt.data +'<br>';
        alert(evt.data);
//        console.log('Retrieved data from server: ' + evt.data);
    };
//监听连接错误信息
//    websocket.onerror = function (evt, e) {
//        console.log('Error occured: ' + evt.data);
//    };

</script>
</html>
      
