<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="../application/style/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="../application/style/bootstrap-3.3.7-dist/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
		<script src="../application/style/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>  
		<script src="../application/style/bootstrap-3.3.7-dist/js/bootstrap-datetimepicker.min.js"></script>  
		<script src="../application/style/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>  
  
  

		<title></title>

		<style type="text/css">
			li{
				text-decoration-line: none;
			}
		</style>
	</head>
    <body style="background:background-color;background-color: transparent;">

<div class="panel panel-danger">
           <div class="panel-heading">
              <h3 class="panel-title text-center">清理考试</h3>
           </div>
           <div class="panel-body">
               <form class="form-horizontal" role="form" style="margin-top:50px;" method="" action="" enctype="multipart/form-data">

               <table class="table table-striped">
               	<thead>
               	    <tr>
               		   <th>考试科目</th>
               		   <th>创建老师</th>
               		   <th>说明</th>
               		</tr>
               	</thead>

               	<tbody>
               		<tr>
               			<th>{{ data.subject }}</th>
               			<th>{{ data.creater }}</th>
               		    <th>
                        <a href="../teacher/addFileToZip">打包下载</a>
                        <a href="../teacher/exam_clear">清理</a>
                      </th>
               		</tr>
               	</tbody>
               </table>
               </form>


           </div>
        </div>


    	
   
    </body>
</html>
