<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>    
		<link href="../application/style/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">  

<style type="text/css">
    body{
        font-weight: bold;
        
    }

</style>

	</head>
	<body style="background:background-color;background-color: transparent;font-size: 14px;">
        <div class="panel panel-danger">
            <div class="panel-heading">
                 <h3 class="panel-title text-center">系统配置</h3>
            </div>
            <div class="panel-body" style="line-height: 40px;">
        <form method="post" action="../admin/system_set">

<table align="center" cellpadding="8px">
                <tr>
                    <td>后台任务间隔时间</td>
                    <td>
                        <input type="text" style="line-height: normal;" name="time" value="{{ data.time }}" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>制定扫描考试信息的间隔时间，单位为秒</td>
                </tr>
                
               <!--  <tr>
                    <td>分页查询记录条数</td>
                    <td>
                        <input type="text" style="line-height: normal;" name="number" value="{{ data.number }}" />
                    </td>
                </tr> 
                <tr style="margin-bottom:15px;">
                    <td></td>
                    <td>指定分页查询时每页显示记录数的默认值（查询页面中可以更改）</td>
                </tr>-->
                
                <tr>
                    <td>手工开启考试时间阈值</td>
                    <td>
                        <input type="text" style="line-height: normal;" name="period" value="{{ data.period }}"/>
                    </td>
                </tr>
                <tr style="margin-bottom:15px;margin-top: 15px;">
                    <td></td>
                    <td>指定手工开启考试时允许的最大提前量，单位为分钟</td>
                </tr>
                
                <tr>
                    <td>上传文件字节数下限</td>
                    <td>
                        <input type="text" style="line-height: normal;" name="min_byte" value="{{ data.min_byte }}" />
                    </td>
                </tr>
                <tr style="margin-bottom:15px;margin-top: 15px;">
                    <td></td>
                    <td>制定上传文件的长度下限（字节），低于此值发出警告</td>
                </tr>
                
                <tr>
                    <td>上传文件字节数上限</td>
                    <td>
                       <input type="text" style="line-height: normal;" value="{{ data.max_byte }}" name="max_byte" />
                    </td>
                </tr>
                <tr style="margin-bottom:15px; padding-bottom: 20px;">
                    <td></td>
                    <td>制定上传文件的长度上限（字节），高于此值发出警告</td>
                </tr>
                
               <!--  <tr>
                    <td align="right">
                        <input type="checkbox" />
                    </td>
                    <td>教师可以清理和删除考试</td>
                </tr> -->
                
                <tr>
                    <td align="right">
                     <input type="submit" class="btn btn-danger" style="margin:15px;" value="修改">
                </td>               
                <td align="center">                 
                    <input type="submit" class="btn btn-danger" style="margin:15px;" value="取消">
                </td>               
            </tr>
                </tr>
            </table>


        	<!-- <div style="height: 30px;margin-right:440px;">  			
        		<div style="float: right;">
        			<input type="text" name="time" value="{{ data.time }}" style="height: auto;width: 200px;" />
        	    </div>
        	    <div style="float: right;">
        			后台任务间隔时间:
        		</div>  
        	</div>
        	<div style="height:40px;margin-left:430px;">  			
        		<div style="float: left;">
        			制定扫描考试信息的间隔时间，单位为分钟
        	   </div> 
        	</div>
        	
        	<div style="height: 30px;margin-right:440px;">  			
        		<div style="float: right;">
        				<input type="text" name="number" value="{{ data.number }}" style="height: auto;width: 200px;" />
        	    </div>
        	    <div style="float: right;">
        			分页查询记录条数:
        		</div>  
        	</div>
        	<div style="height:40px;margin-left:430px;">  			
        		<div style="float: left;">
                                                            指定分页查询时每页显示记录数的默认值（查询页面中可以更改）        	   
                </div> 
        	</div>
        	
        	<div style="height: 30px;margin-right:440px;">  			
        		<div style="float: right;">
        				<input type="text" name="period" style="height: auto;width: 200px;" value="{{ data.period }}"/>
        	    </div>
        	    <div style="float: right;">
        			手工开启考试时间阈值:
        		</div>  
        	</div>
        	<div style="height:40px;margin-left:430px;">  			
        		<div style="float: left;">
                                                           指定手工开启考试时允许的最大提前量，单位为分钟       	   
                </div> 
        	</div>
        	
        	<div style="height: 30px;margin-right:440px;">  			
        		<div style="float: right;">
        				<input type="text" name="min_byte" value="{{ data.min_byte }}" style="height: auto;width: 200px;" />
        	    </div>
        	    <div style="float: right;">
        			上传文件字节数下限:
        		</div>  
        	</div>
        	<div style="height:40px;margin-left:430px;">  			
        		<div style="float: left;">
                                                           制定上传文件的长度下限（字节），低于此值发出警告       	   
                </div> 
        	</div>
        	
        	<div style="height: 30px;margin-right:440px;">  			
        		<div style="float: right;">
        				<input type="text" value="{{ data.max_byte }}" name="max_byte" style="height: auto;width: 200px;" />
        	    </div>
        	    <div style="float: right;">
        			上传文件字节数上限:
        		</div>  
        	</div>
        	<div style="height:40px;margin-left:430px;">  			
        		<div style="float: left;">
                                                           制定上传文件的长度上限（字节），高于此值发出警告       	   
                </div> 
        	</div>
        	
        	<div style="height: 30px;margin-right:440px;">  			
        		<div style="float: right;">
        				教师可以清理和删除考试
        	    </div>
        	    <div style="float: right;">
        			<input type="hidden" name="power" value="off"/>
        			<input type="checkbox" name="power"/>
        		</div>  
        	</div>
        	
        	<div style="height: 50px;margin-right:440px;">  			
        		<div style="float: right;">
        			<button type="button" class="btn btn-danger" style="margin:15px;">取消</button>
        	    </div>
        	    <div style="float: right;margin-right:40px;">
        			<input type="submit" class="btn btn-success" style="margin:15px;" value="确定">
        		</div>  
        	</div>
        		 -->

        </form>
         </div>
  </div>
</div>  
	</body>
</html>
