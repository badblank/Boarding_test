<?php
function p($var)
{
	if (is_bool($var)) {
		var_dump($var);
	}else if (is_null($var)) {
		var_dump(NULL);
	}else{
		echo "<pre style='position:relative;
		z-index:1000;padding:10px;border-radius:5px;background:#F5F5F5;
		border:1px solid #aaa;font-size:14px;line-height:18px;opacity:0.9;'>".print_r($var,true)."</pre>";
	}

}

function list_dir($dir){
    $result = array();
    if (is_dir($dir)){
        $file_dir = scandir($dir);
        foreach($file_dir as $file){
            if ($file == '.' || $file == '..'){
                continue;
            }
            elseif (is_dir($dir.$file)){
                $result = array_merge($result, list_dir($dir.$file.'/'));
            }
            else{
                array_push($result, $dir.$file);
            }
        }
    }
    return $result;
}


function url()
{
	print_r($_SERVER["SERVER_NAME"]."/cems/toby/application/");
}

//function get_ipv4(){
        // if (isset($_ENV["HOSTNAME"])){
        //     $MachineName = $_ENV["HOSTNAME"];
        // } else if(isset($_ENV["COMPUTERNAME"])){
        //     $MachineName = $_ENV["COMPUTERNAME"];
        // }else{
        //     $MachineName = "";
        // }
        // return gethostbyname($MachineName);
      //  return $_SERVER['REMOTE_ADDR'];
   // }
   function get_ipv4()
    {

        if(!empty($_SERVER["HTTP_CLIENT_IP"]))
        {
            $cip = $_SERVER["HTTP_CLIENT_IP"];
        }
        else if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
        {
            $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }
        else if(!empty($_SERVER["REMOTE_ADDR"]))
        {
            $cip = $_SERVER["REMOTE_ADDR"];
        }
        else
        {
            $cip = '';
        }
        preg_match("/[\d\.]{7,15}/", $cip, $cips);
        $cip = isset($cips[0]) ? $cips[0] : 'unknown';
        unset($cips);

        return $cip;
    } 
function upfile($category)
{
    if ($category=="teacher") {
        //list($maintype, $subtype) = explode("/", $_FILES['file']['type']);  
        //print_r($maintype);echo "<br>";
        //print_r($subtype);die;
        // if ($maintype != "application" || $subtype != "vnd.openxmlformats-officedocument.spreadsheetml.sheet") {  
        //     echo "<script>alert(\"上传文件格式不正确！！！\");history.go(-1)</script>";  
        // } else {  
            $path = './upfile/'.$category.'/'. $_FILES['file']['name'];//定义上传文件名和存储位置  
            if (is_uploaded_file($_FILES['file']['tmp_name'])) {//判断文件上传是否为HTTP POST上传  
                if (!move_uploaded_file($_FILES['file']['tmp_name'],$path)) {//执行上传操作  
                    echo "<script>alert(\"上传失败！！！\");history.go(-1)</script>";  
                } else {  
                    return "1";  
                }  
            } else {  
                echo "<script>alert(\"上传文件不合法！！！\");history.go(-1)</script>";  
            }  
        //}
    }elseif ($category=="student") {
       $path = './upfile/'.$category.'/'. $_FILES['file']['name'];//定义上传文件名和存储位置  
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {//判断文件上传是否为HTTP POST上传  
            if (!move_uploaded_file($_FILES['file']['tmp_name'],$path)) {//执行上传操作  
                echo "<script>alert(\"上传失败！！！\");history.go(-1)</script>";  
            } else {  
                return "1";  
            }  
        } else {  
            echo "<script>alert(\"上传文件不合法！！！\");history.go(-1)</script>";  
        }  
    } 
          
     
}




