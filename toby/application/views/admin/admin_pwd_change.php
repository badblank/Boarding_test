<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>修改密码</title>
		<link href="../application/style/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            span{
                font-weight: bold;
                font-size:12px;
            }
        </style>
          
	</head>
	<body style="background:background-color;background-color: transparent;">
		<div align="center" id="add" style="background: transparent;">

        <div class="panel panel-danger">
            <div class="panel-heading">
                 <h3 class="panel-title text-center">修改密码</h3>
            </div>
            <div class="panel-body" style="line-height: 100px;">
    <form class="bs-example bs-example-form" role="form" method="post" action="../admin/pwd_change">
    	<table cellpadding="5px">
    		<tr>
    			<td align="right">
    				<span style="color: white;"><font color="black" size="4px">输入用户名</font></span>
    			</td>    			
    			<td align="right">
    				<input type="text" class="input-lg" placeholder="用户名" name="name" style="margin:15px;">
    			</td>    			
    		</tr>
    		<tr>
    			<td align="right">
    				<span style="color: white;"><font color="black" size="4px"> 输入原密码</font></span>
    			</td>   			
    			<td align="right">    				
    				<input type="password" class="input-lg" placeholder="密码" name="old_psw" style="margin:15px;">
    			</td>
    		</tr>
    		<tr>
    			<td align="right">
    				<span style="color: white;"><font color="black" size="4px">输入新密码</font></span>
    			</td>    			
    			<td align="right">
    				
    				<input type="password" class="input-lg" name="new_psw" placeholder="新密码" style="margin:15px;">
    			</td>    			
    		</tr>   		
    		<tr>
    			<td align="right">
    				<span style="color: white;"><font color="black" size="4px">再次输入新密码</font></span> 
    			</td>   			
    			<td align="right">
    				
    				<input type="password" class="input-lg" name="new_psw1" placeholder="重输新密码" style="margin:15px;">
    			</td>   			
    		</tr>
        	<tr style="margin:15px;">
    			<td align="center">
    				<button type="submit" class="btn btn-danger" style="margin:15px;">保存</button>
    			</td>   			
    			<td align="right">
    				<button type="button" class="btn btn-danger" style="margin:15px;">重置</button>
    			</td>    			
    		</tr>       
       
       </table>
    </form>
     </div>
  </div>
</div>  

</div>
	</body>
</html>
