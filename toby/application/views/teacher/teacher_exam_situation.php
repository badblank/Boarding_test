<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link href="../application/style/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
	</head>
    <body style="background:background-color;background-color: transparent;">
    <div class="panel panel-danger">
        <div class="panel-heading">
           <h3 class="panel-title text-center">考试进行情况</h3>
        </div>
        <div class="panel-body" style="line-height: 35px;">	
		    
			
			<table class="table table-striped">
				<!-- <tr>
					<td width="200px" align="center">考试名称</td>
					<td width="100px"></td>
				</tr>
				<tr>
					<td width="200px" align="center">参加考试人数</td>
					<td width="100px"></td>
				</tr>
					<td width="90px" align="center">已登录人数</td>
					<td width="100px"></td>
				</tr>
					<td width="200px" align="center">未登录人数</td>
					<td width="100px"></td>
				</tr>
					<td width="200px" align="center">登陆后提交答案人数</td>
					<td width="100px"></td>
				</tr>
					<td width="200px" align="center">登录却未提交答案的人数</td>
					<td width="100px"></td>
			    </tr> -->

			    <thead>
        <tr>
				<th >考试名称</th>
				<th >参加考试人数</th>
				<th >已登录人数</th>
				<th >未登录人数</th>
				<th >登陆后提交答案人数</th>
				<th >登录却未提交答案的人数</th>
				<th >操作</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>{{ data.exam_name }}</th>
          <th>{{ data.student_all_number }}</th>
          <th>{{ data.student_login }}</th>
          <th>{{ data.student_unlogin }}</th>
          <th>{{ data.student_submit }}</th>
          <th>{{ data.student_unsubmit }}</th>
          <th><a href="stop_exam">终止考试</a></th>
        </tr>
      </tbody>
		    </table>	
		   
		   </div>
		 </div>
    </body>
</html>
