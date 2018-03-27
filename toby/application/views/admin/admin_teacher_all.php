<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
                <link href="../application/style/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body style="background:background-color;background-color: transparent;font-size: 18px;">
<br>
        <div class="panel panel-danger">
           <div class="panel-heading">
              <h2 class="panel-title text-center">所有教师列表</h2>
           </div>
           <div class="panel-body">
                <form method="" action="">
                <table class="table table-striped">
                        <thead>
                                <tr>
                                     <th>姓名</th>
                                     <th>密码</th>
                                     <th>是否为管理员</th>
                                </tr>
                        </thead>
                        <tbody>
                                {% for v in data %}
                                <tr>
                                     <th>{{ v.name }}</th>
                                     <th>{{ v.password }}</th>
                                     {% if v.type == 1 %}
                                        <th>是</th>
                                     {% else %}
                                     <th>否</th>
                                     {% endif %} 
                                </tr>  
                                {% endfor %} 
                        </tbody>
                </table>
        </form>

           </div>
        </div>

       
	</body>
</html>
