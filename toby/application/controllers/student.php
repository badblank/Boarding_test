<?php
namespace application\controllers;
use core\lib\model;
use application\models\studentModel;
use application\models\teacherModel;
use application\models\adminModel;
class student extends \core\toby
{
	public $model;
	function __construct() 
	{
		$this->model = new studentModel();
		session_start();
		if (!isset($_SESSION['user'])) {
			echo "<script>location.href=\"../\";</script>";
		}
	}
	public function student_index()
	{
		$model = new teacherModel();
		$get_exam=$model->get_exam();
		if ($get_exam[0]['IsBegin']!=1) {
			echo '<script>location.href="../";</script>';
		}else{
			$this->display('student/student_index.php');
		}
	}
	public function student_download()
	{
		$data=$this->model->get_exam();
		$this->assign('data',$data);
		$this->display('student/student_download.php');
	}
	public function student_intro()
	{
		$this->display('student/student_intro.php');
	}
	public function student_upload_act()
	{
		$filename='./upfile/student/'.$_FILES['file']['name'];
		if ($_FILES['file']['error'] > 0) {//判断上传错误信息  
            switch ($_FILES['file']['error']) {  
                case 1:  
                	echo "<script>alert(\"上传文件大小超出配置文件规定值\");history.go(-1)</script>";
                    break;  
                case 2:  
                	echo "<script>alert(\"您上传的文件过大\");history.go(-1)</script>";
                    break;  
                case 3:  
                	echo "<script>alert(\"上传文件不全\");history.go(-1)</script>";
                    break;  
                case 4:  
                echo "<script>alert(\"没有上传文件\");history.go(-1)</script>";
                    break;  
            }  
        } else {
			if (upfile("student")==1) {
				$data=array(
					"path"=>$filename,
					"time"=>date("y-m-d h:i:s"),
					"name"=>$_FILES['file']['name'],
					"sId"=>$_SESSION['sId']
				);
				$rename=$this->model->path_add($data);
				if ($rename==0) {
					$data=$this->model->get_file($_SESSION['sId']);
					unlink($data['path']);
					$edit_data1=array(
						"sId"=>$_SESSION['sId']
					);
					$data1=array(
						"path"=>$filename,
						"time"=>date("y-m-d h:i:s"),
						"name"=>$_FILES['file']['name']
					);
					$this->model->path_update($data1,$edit_data1);
				}
				$edit_data=array(
					"sName"=>$_SESSION['user']
				);
				$data=array(
					"isSubmit"=>1
				);
				$this->model->submit($data,$edit_data);
				echo "<script>alert(\"上传成功！！！\");location.replace(document.referrer)</script>";
			}
		}
	}
	public function student_upload()
	{
		$system = new adminModel();
		$id=$_SESSION['sId'];
		$data=array(
			"0"=>$this->model->upfile_list($id),
			"1"=>$system->system_list()
		);
		//p($data);die;
		$this->assign('data',$data);
		$this->display('student/student_upload.php');
	}
	public function student_delete()
	{
		$id=$this->uri(3);
		$data=$this->model->get_path($id);
		unlink($data["path"]);
		if($this->model->delete_file($id)==1){
			echo "<script>alert(\"删除成功！！！\");location.replace(document.referrer)</script>";
		}
	}
		
}