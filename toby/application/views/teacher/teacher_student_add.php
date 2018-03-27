<!DOCTYPE html>
<html>
  <head>
    <title>管理员页面</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />

<link href="../application/style/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
</style>
</head>
    <body style="background:background-color;background-color: transparent;font-size: 18px;">
<div align="center" id="add">

<div class="panel panel-danger">
        <div class="panel-heading">
           <h3 class="panel-title text-center">导入学生</h3>
        </div>
        <div class="panel-body" style="line-height: 80px;">

    	
            <form class="bs-example bs-example-form" role="form" action="../teacher/student_add_one" method="post">
            <table>
    		<tr>
    			<td align="right" colspan="2">
    				<span class="glyphicon glyphicon-star" class="label"></span> ID
    			</td>
    			
    			<td colspan="2">
    				
    				<input type="text" class="input-lg" id="sid" placeholder="学号" name="sid"style="margin:10px;">
    			</td>
    		</tr>
    		<tr>
    			<td align="right" colspan="2">
    				 <span class="glyphicon glyphicon-user" class="label"></span> Name
    			</td>
    			<td colspan="2">
    				<input type="text" class="input-lg" placeholder="姓名" id="sname" name="sname" style="margin:10px;">
    			</td>
    		</tr>
            <tr>
    			<td align="right" colspan="2">
    				<span class="glyphicon glyphicon-home" class="label"></span> Class
    			</td>
    			<td colspan="2">
    				<input type="text" class="input-lg" placeholder="班级" id="class" style="margin:10px;">
    			</td>
            </tr>
    		<tr>
    			<td align="right" colspan="2">
    				<span class="glyphicon glyphicon-lock" class="label"></span> subject
    			</td>
    			<td colspan="2">
    				<input type="text" class="input-lg" id="subject" name="subject" placeholder="科目" style="margin:10px;">
    			</td>
    		</tr>
     		<tr>
    			<td align="right" colspan="2">
    				<button type="submit" class="btn btn-danger" style="margin:10px;">添加</button>
    			</td>
    			<td align="center" colspan="2">
    				<button type="button" class="btn btn-danger" id="reset" style="margin:10px;">重置</button>
    			</td>
    			
    		</tr>
            </table>
        </form>    	
        <form action="../teacher/student_add" method="post" enctype="multipart/form-data">
        <table>
        <tr>
          <td></td>
        	<td align="right" colspan="2">
        		  批量导入： <input id="showFile" type="text" style="height: 30px;width:300px;margin:10px;"/>
        	</td>
        	<td >
        		<input onchange="handleFile()" id="chooseFile" type="file" name="file" value="选择文件" style="color: transparent;" />
        	</td>
        </tr>
       <tr>
    			<td align="right" colspan="2">
    				<button type="submit" class="btn btn-danger" style="margin:10px;">导入</button>
    			</td>    			
    		</tr>
            </table>
        </form>
</div>	


  </body>

  <script type="text/javascript">
    document.getElementById("reset").onclick = function() {
        document.getElementById("sid").value = "";
        document.getElementById("sname").value = "";
        document.getElementById("subject").value = "";
    }
      function handleFile(){
        var c = document.getElementById("chooseFile");
        var s = document.getElementById("showFile");
        s.value = c.value;
        c.value("");
      }

  </script>
</html>
      
