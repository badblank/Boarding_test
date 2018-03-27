<?php
namespace application\controllers;
use core\lib\model;
use application\models\adminModel;
class admin extends \core\toby
{

	public $model;
	function __construct() 
	{
		$this->model = new adminModel();
		session_start();
		if (!isset($_SESSION['admin'])) {
			echo "<script>location.href=\"../\";</script>";
		}
	}
	public function admin_index()
	{
		$this->display('admin/admin_index.php');
	}
	public function admin_intro()
	{
		$this->display('admin/admin_intro.php');
	}
	public function admin_teacher_add()
	{
		//print_r($this->demo);
		$this->display('admin/admin_teacher_add.php');
	}
	public function add_cate()
	{
		$data = array(
        	"name" => $_POST['name'],
        	"password" => $_POST['psw'],
        	"type" => $_POST['type']
		);
		if ($this->model->teacher_add($data)) {
			echo "<script>alert(\"添加成功！！！\");history.go(-1)</script>";
		}
	}
	public function admin_pwd_change()
	{
		$this->display('admin/admin_pwd_change.php');
	}
	public function pwd_change()
	{
		$username = $_POST['name'];
		$password = $_POST['old_psw'];
		$getdata = $this->model->get_teacher($username);
		//p($getdata);die;
		if ($getdata['name']==$username&&$getdata['password']==$password)
		{
			if ($_POST['new_psw']==$_POST['new_psw1']) {
				$data=array(
					'password'=> $_POST['new_psw']
				);
				$user=array(
					'type'=>0,
					'name'=>$_POST['name']
				);
				$this->model->pwd_change($data,$user);	
				echo "<script>alert(\"密码修改成功!\");history.go(-1)</script>";	
			}else{
				echo "<script>alert(\"两次密码不一致，请重新输入\");history.go(-1)</script>";
			}
		}else{
			echo "<script>alert(\"用户名或原密码错误，请重新输入！\");history.go(-1)</script>";
		}	
	}
	public function admin_teacher_delete()
	{
		$this->display('admin/admin_teacher_delete.php');
	}
	public function teacher_delete()
	{
		$username=$_POST['name'];
		$rel=$this->model->teacher_delete($username);
		if ($rel==0)
		{
			echo "<script>alert(\"该用户不存在！\");history.go(-1)</script>";
		}else{
			echo "<script>alert(\"删除成功！\");history.go(-1)</script>";
		}		
	}
	public function admin_teacher_all()
	{
		$data = $this->model->teacher_list();//获取数据库信息
		//p($data);die;
		$this->assign('data',$data);
		$this->display('admin/admin_teacher_all.php');
	}
	public function admin_exam_deal()
	{
		$this->display('admin/admin_exam_deal.php');
	}
	public function admin_system_set()
	{
		$data = $this->model->system_list();
		//p($data['time']);die;
		$this->assign('data',$data);
		$this->display('admin/admin_system_set.php');
	}
	public function system_set()
	{
		$id=array('id'=>1);
		$data=array(
			'time'=> $_POST['time'],
			'period'=> $_POST['period'],
			'min_byte'=> $_POST['min_byte'],
			'max_byte'=> $_POST['max_byte']
		);
		if ($this->model->system_set($data,$id)) {
			echo "<script>alert(\"修改成功！！！\");location.replace(document.referrer)</script>";
		}else{
			echo "<script>alert(\"修改失败！！！\");location.replace(document.referrer)</script>";
		}
	}
}



