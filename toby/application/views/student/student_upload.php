
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>答案上传</title>
		<link href="../application/style/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
		<!--<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
	</head>
<body style="background:background-color;background-color: transparent;font-size: 18px;">
<br>
        <div class="panel panel-danger">
           <div class="panel-heading">
              <h2 class="panel-title text-center">上传答案</h2>
           </div>
           <div class="panel-body">
                <form role="form" class="text-center" action="../student/student_upload_act" method="post" enctype="multipart/form-data">
                <table class="table table-striped">
                        <tbody>
                            <tr>
        			    	   <td>文件上传：</td>
        			    	   <td>
        			    	   	<div class="input-group input-group-lg">
            			          <span class="input-group-addon glyphicon glyphicon-file"></span>
           				          <input style="width:450px;" type="text" id="showFile" class="form-control" placeholder="请上传答案">
       				            </div>
       				           </td>
       				               <input type="hidden" name="MAX_FILE_SIZE" value="{{ data[1].max_byte }}">					   
                               <td><input onchange="handleFile()" id="chooseFile" type="file" align="center" name="file" style="height: 30px;width:75px;margin:10px;display: inline-block;"/></td>
                            </tr>  
                            <tr>
                            	<td></td>
                            	<td><button class="btn btn-danger" type="submit" style="border-radius: 15px; width: 80px;height: 40px;">提交</button></td>
                            	<td></td>
                            </tr>
                        </tbody>
                </table>
                </form>
                <table class="table table-striped">
                    <tr>
						<th>文件名称</th>
						<th>上传时间</th>
						<th>操作</th>
					</tr>
					<tr>
						<td>{{ data[0][0].name }}</td>
						<td>{{ data[0][0].time }}</td>
						<td>
							<!-- <a href="../{{ v.path }}">查看</a> -->
							 {% if data[0][0].id != '' %}
							 <a href="../student/student_delete/{{ data[0][0].id }}">删除</a>
							 {% else %}
							{% endif %} 
						</td>
					</tr>
				</table>
			</div>
		</div>

	</body>

	<script type="text/javascript">
	function handleFile(file){
		var c = document.getElementById("chooseFile");
		var s = document.getElementById("showFile");
		s.value = c.value;
	}

	</script>

</html>