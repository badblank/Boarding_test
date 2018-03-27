<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link href="../application/style/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/CSS">
	 .panel-heading{
		padding: 1px;
	}
	input[type="submit"]{
		background: #ebccd1;
		width: 50px;
		height: 30px;
	}
</style>
	</head>
	<body>
    	<form method="post" action="unlock_class">		
		<div class="panel panel-danger" style="margin-top:20px">
           <div class="panel-heading">
                <h4 align="center">解除某场考试所有学生IP绑定</h4 >
           </div>
           <div class="panel-body" align="center">
                <input type="text" placeholder="请输入考试名称" name="exam" />
                <input type="submit" class="glyphicon glyphicon-search" value="解绑" />
           </div>
        </div>
        </form>

		<div class="panel panel-danger">
           <div class="panel-heading">
    			<h4 align="center">按学生查找已登录信息 </h4>
           </div>
           <div class="panel-body" align="center">
    			<input type="text" placeholder="学号"/>
    			<input type="text" id="student_name" placeholder="姓名" />
    			<input type="submit" id="search0" class="glyphicon glyphicon-search" value="查找" />
           </div>
        </div>

		<div class="panel panel-danger">
           <div class="panel-heading">
    			<h4 align="center">按IP查找已登录信息 </h4>
           </div>
           <div class="panel-body" align="center">
    			<input type="text" placeholder="IP" id="ip" />
    			<input type="submit" id="search" class="glyphicon glyphicon-search" value="查找" />
           </div>
        </div>

                <table class="table table-striped">
                <h4 align="center">查找结果</h4>
    			<thead>
    				<tr>
    					<th>学号</th>
    					<th>姓名</th>
    					<th>IP地址</th>
                        <th>操作</th>
    				</tr>
    			</thead>
    			<tbody>
    				<tr>
    					<td id="number"></td>
    					<td id="name"></td>
    					<td id="ipdress"></td>
                        <td id="opearte"></td>
    				</tr>
    			</tbody>
    		</table>
    		</div>
	</body>
    <script>
        function IsJsonString(str) {
            try {
               JSON.parse(str);
            } catch (e) {
                return false;
            }
            return true;
        }
    document.getElementById("search").onclick = function() { 
    var request = new XMLHttpRequest();
    request.open("POST", "search_ip");
    var data = "ip=" + document.getElementById("ip").value;
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    request.send(data);
    request.onreadystatechange = function() {
        if (request.readyState===4) {
            if (request.status===200) { 
                var isjson=IsJsonString(request.responseText);
                if (isjson==true) {
                    var info=JSON.parse(request.responseText);
                    document.getElementById("number").innerHTML = info.sId;
                    document.getElementById("name").innerHTML = info.sName;
                    document.getElementById("ipdress").innerHTML = info.ip;
                    document.getElementById("opearte").innerHTML = '<a href="unlock/'+info.sId+'">解除锁定<a/>';
                }else{
                    alert(request.responseText);
                }
            } else {
                alert("发生错误：" + request.status);
            }
        } 
    }
} 
 document.getElementById("search0").onclick = function() { 
    var request = new XMLHttpRequest();
    request.open("POST", "search_name");
    var data = "name=" + document.getElementById("student_name").value;
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    request.send(data); 
    request.onreadystatechange = function() {
        if (request.readyState===4) {
            if (request.status===200) { 
                var isjson=IsJsonString(request.responseText);
                if (isjson==true) {
                    var info=JSON.parse(request.responseText);
                    document.getElementById("number").innerHTML = info.sId;
                    document.getElementById("name").innerHTML = info.sName;
                    document.getElementById("ipdress").innerHTML = info.ip;
                    document.getElementById("opearte").innerHTML = '<a href="unlock/'+info.sId+'">解除锁定<a/>';
                }else{
                    alert(request.responseText);
                }
            } else {
                alert("发生错误：" + request.status);
            }
        } 
    }
} 
    </script>
</html>
	
	
	
 <!--

  <body style="background:background-color;background-color: transparent;">
    	<form method="post" action="unlock_class">
    	   <div align="center" style="width:600px;height: 100px;">
                <h3 align="center">解除某场考试所有学生IP绑定</h3>
                <input type="text" placeholder="请输入考试名称" name="exam" />
                <input type="submit" class="glyphicon glyphicon-search" value="解绑" />
            </div>
        </form>
            <div align="center" style="width: 600px;height: 100px;">
    			<h3 align="center">按学生查找已登录信息 </h3>
    			<input type="text" placeholder="学号"/>
    			<input type="text" id="student_name" placeholder="姓名" />
    			<input type="text" placeholder="班级" />
    			<input type="submit" id="search0" class="glyphicon glyphicon-search" value="查找" />
    		</div>
   	<div align="center" style="width:600px;height: 100px;">
    			<h3 align="center">按IP查找已登录信息 </h3>
    			<input type="text" placeholder="IP" id="ip" />
    			<input type="submit" id="search" class="glyphicon glyphicon-search" value="查找" />
    		</div>

    		<div align="center" style="width: 600px;height: 100px;">
    			<h3 align="center">查找结果</h3>
    		<table border="2"  style="width: 500px;">
    			<thead>
    				<tr>
    					<th>学号</th>
    					<th>姓名</th>
    					<th>班级</th>
    					<th>IP地址</th>
                        <th>操作</th>
    				</tr>
    			</thead>
    			<tbody>
    				<tr>
    					<td id="number"></td>
    					<td id="name"></td>
    					<td id="class"></td>
    					<td id="ipdress"></td>
                        <td id="opearte"></td>
    				</tr>
    			</tbody>
    		</table>
    		</div>
	</body>
    <script>
        function IsJsonString(str) {
            try {
               JSON.parse(str);
            } catch (e) {
                return false;
            }
            return true;
        }
    document.getElementById("search").onclick = function() { 
    var request = new XMLHttpRequest();
    request.open("POST", "search_ip");
    var data = "ip=" + document.getElementById("ip").value;
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    request.send(data);
    request.onreadystatechange = function() {
        if (request.readyState===4) {
            if (request.status===200) { 
                var isjson=IsJsonString(request.responseText);
                if (isjson==true) {
                    var info=JSON.parse(request.responseText);
                    document.getElementById("number").innerHTML = info.sId;
                    document.getElementById("name").innerHTML = info.sName;
                    document.getElementById("ipdress").innerHTML = info.ip;
                    document.getElementById("opearte").innerHTML = '<a href="unlock/'+info.sId+'">解除锁定<a/>';
                }else{
                    alert(request.responseText);
                }
            } else {
                alert("发生错误：" + request.status);
            }
        } 
    }
} 
 document.getElementById("search0").onclick = function() { 
    var request = new XMLHttpRequest();
    request.open("POST", "search_name");
    var data = "name=" + document.getElementById("student_name").value;
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    request.send(data); 
    request.onreadystatechange = function() {
        if (request.readyState===4) {
            if (request.status===200) { 
                var isjson=IsJsonString(request.responseText);
                if (isjson==true) {
                    var info=JSON.parse(request.responseText);
                    document.getElementById("number").innerHTML = info.sId;
                    document.getElementById("name").innerHTML = info.sName;
                    document.getElementById("ipdress").innerHTML = info.ip;
                    document.getElementById("opearte").innerHTML = '<a href="unlock/'+info.sId+'">解除锁定<a/>';
                }else{
                    alert(request.responseText);
                }
            } else {
                alert("发生错误：" + request.status);
            }
        } 
    }
} 
    </script>
</html>
 --> 
