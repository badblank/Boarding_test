<!DOCTYPE html>
<html>
  <head>
    <title>管理员页面</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />

    <link href="../application/style/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">   
    </head>
    <body style="background:background-color;background-color: transparent;font-size: 18px;">
    

<div align="center" id="add" style="background: transparent;margin-top: 20px;">

<div class="panel panel-danger">
            <div class="panel-heading">
                 <h3 class="panel-title text-center">修改密码</h3>
            </div>
            <div class="panel-body" style="line-height: 100px;">

    <form class="bs-example bs-example-form" role="form" action="../admin/teacher_delete" method="post">
    	<table cellpadding="5px">
    		<tr>
    			<td align="right">
    				<span class="glyphicon glyphicon-user" class="label"></span> User
    			</td>
    			
    			<td align="right">
    				
    				<input type="text" name="name" class="input-lg" placeholder="用户名" style="margin:15px;">
    			    <!--<input type="button" class="button bg-blue" value="查询"/>-->
    			</td>
    			
    		</tr>
    		

     		<tr style="margin:15px;">
     			
    			<td align="right">
    				<input type="submit" class="btn btn-danger" style="margin:15px;" value="确认删除">
    			</td>
    			
    			<td align="right">
    				<button type="button" class="btn btn-success" style="margin:15px;">取消操作</button>
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
      
