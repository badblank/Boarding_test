<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="../../application/style/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="../../application/style/bootstrap-3.3.7-dist/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
		<script src="../../application/style/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>  
		<script src="../../application/style/bootstrap-3.3.7-dist/js/bootstrap-datetimepicker.min.js"></script>  
		<script src="../../application/style/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>  
  
  

		<title></title>
	</head>
    <body style="background:background-color;background-color: transparent;">
    	
<div style="width:80%;margin: 0 auto;margin-top: 70px;">
	<h3 align="center">编辑	考试</h3>	
<form class="form-horizontal" role="form" style="margin-top:50px;" method="post" action="../../teacher/exam_edit_cate/{{ data[0].id }}" enctype="multipart/form-data">
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">班级名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="class" id="firstname" placeholder="请输入班级" value="{{ data[0].class }}">
    </div>
  </div>
  <div class="form-group">
    <label for="·lastname" class="col-sm-2 control-label">考试科目</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="lastname" name="subject" placeholder="请输入科目" value="{{ data[0].subject }}">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">开始时间</label>
    <div class="col-sm-10">
		<input  type="text" name="begin_time" readonly class="form_datetime form-control" value="{{ data[0].BeginTime }}">    
    </div>
  </div>  

  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">结束时间</label>
    <div class="col-sm-10">
      <input  type="text" name="end_time" readonly class="form_datetime form-control" value="{{ data[0].EndTime }}">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">创建人</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="creater" id="firstname" placeholder="创建人" value="{{ data[0].creater }}">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">自动开启</label>
    <div class="col-sm-10">
      {% if data[0].IsAuto == '1' %}
        <input type="radio" id="inlineCheckbox2" name="auto" value="1" checked="checked"> 是
        <input type="radio" id="inlineCheckbox2" name="auto" value="0"> 否
        {% elseif data[0].IsAuto == '0' %}
        <input type="radio" id="inlineCheckbox2" name="auto" value="1" > 是
        <input type="radio" id="inlineCheckbox2" name="auto" value="0" checked="checked"> 否
      {% endif %} 
      
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">考试文件</label>
    <div class="col-sm-10">
    <input type="hidden" name="MAX_FILE_SIZE" value="{{ data[1].max_byte }}">
 		<input type="file" name="file" id="exampleInputFile">    
    <input type="hidden" name="file" id="exampleInputFile" value="{{ data[0].path }}">    
    </div>
  </div>

  <div class="form-group right">
    <div style="float:right;">
      <button type="submit" class="btn btn-default">修改</button>
    </div>
  </div>
</form>
	
</div>         
     
    <script type="text/javascript">
    	$(".form_datetime").datetimepicker({
    　　		format: "yyyy-mm-dd hh:ii", //选择日期后，文本框显示的日期格式
    　　		language: 'zh-CN', //汉化
    　　		autoclose:true, //选择日期后自动关闭
     		pickerPosition: "bottom-right"
    	});
       
    </script>               
    </body>
</html>
