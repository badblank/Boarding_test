<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>试卷下载</title>
		<link href="../application/style/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
	</head>
<body style="background:background-color;background-color: transparent;font-size: 18px;">
<br>
        <div class="panel panel-danger">
           <div class="panel-heading">
              <h2 class="panel-title text-center"><span>"{{ data[0].subject }}"</span>考试进行中</h2>
           </div>
           <div class="panel-body">
                <form method="" action="">
                <table class="table table-striped">
                	<caption>可下载试卷</caption>
                        <thead>
                   <tr>
						          <th>名称</th>
						          <th>上传时间</th>
						          <th>上传老师</th>
						          <th>说明</th>
					         </tr>
                        </thead>
                        <tbody>
                          {% for v in data %}
                            <tr>
        			    	   <td>{{ v.subject }}</td>
							   <td>{{ v.BeginTime }}</td>
							   <td>{{ v.creater }}</td>
							   <td>
								<a href="../{{ v.path }}">下载</a>	
						    </td>
                            </tr>  
                          {% endfor %}	 
                        </tbody>
                </table>
                		<P hidden="hidden">当前没有可下载的电子试卷...</P>
        </form>

           </div>
        </div>

	</body>

</html>