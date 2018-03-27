<?php
namespace application\controllers;
use core\lib\model;
use application\models\loginModel;
use application\models\teacherModel;
use application\models\adminModel;
class index extends \core\toby
{
	public $mem;
	function __construct() 
	{
		//初始化对象
		$this->mem = new \Memcache;
		//连接服务器
		$this->mem->connect("127.0.0.1", 11211);
	}
	public function index()
	{
		//$this->uri(3);
		//url();die;
		//session_destroy();
		$this->mem->flush(); 
		$this->display('login.php');
	}
	public function login()
	{
		$username = $_POST['username'];//输入姓名
		$password = $_POST['password'];
		$model = new loginModel();
		$getstu=$model->getStudent($username);
		$getdata = $model->getUser($username);//获取数据库信息
		if ($_POST["radio"]=="admin") {
			if ($getdata['name']==$username&&$getdata['password']==$password&&$getdata['type']=="1")
			{
				session_start();
				$_SESSION['admin']=$getdata['name'];
				$data=$_SESSION['admin'];
				$this->assign('data',$data);
				$this->display('admin/admin_index.php');
			}else{
				echo "<script>alert(\"用户名或密码错误，请重新登录！\");history.go(-1)</script>";
			}
		}else if($_POST["radio"]=="teacher"){
			if ($getdata['name']==$username&&$getdata['password']==$password&&$getdata['type']=="0")
			{
				//echo "<script>alert(\"登录成功！！！\")</script>";
				session_start();
				$_SESSION['teacher']=$getdata['name'];
				$data=$_SESSION['teacher'];
				$this->assign('data',$data);
				$this->display('teacher/teacher_index.php');
			}else{
				echo "<script>alert(\"用户名或密码错误，请重新登录！\");history.go(-1)</script>";
			}
		}else if($_POST["radio"]=="student"){
			$model1 = new teacherModel();
			$get_exam=$model1->get_exam();
			if(!isset($get_exam[0]))
			{
				echo '<script>alert("不存在已开启的考试！！！");location.href="../"</script>';
			}else{
				if ($get_exam[0]['IsBegin']==1) {
				if (time()>=strtotime($get_exam[0]['EndTime'])) {
					echo '<script>alert("本场考试已经结束了！！！");location.href="../"</script>';
				}elseif (time()<strtotime($get_exam[0]['BeginTime'])) {
					echo '<script>alert("本场考试还未开始！！！");location.href="../"</script>';
				}else{
					if ($getstu['sName']==$username&&$getstu['sPassword']==$password)
					{
						session_start();
						$system = new adminModel();
						$system_set=$system->system_list();
						$_SESSION['user']=$getstu['sName'];
						$_SESSION['sId']=$getstu['sId'];
						$data=array(
							'user'=>$_SESSION['user'],
							'time'=>$system_set['time']
						);
						//session_id(md5($getstu['sName']));
						$id=md5($getstu['sName']);
						$ip=$this->mem->get($id);
						$ipv4=get_ipv4();
						if ($ip) {
							if ($ip==$ipv4) {
								$this->mem->set($id,$ipv4, 0, 0);
								$this->assign('data',$data);
								$this->display('student/student_index.php');
							}else{
								echo '<script>alert("这个用户已经在其他电脑上登录了！");location.href="../"</script>';
							}
						}else{
							if (is_null($getstu['ip'])) {
									$data1=array("ip"=>$ipv4);
									$edit_data=array("sName"=>$username);
									//ip设置成一个唯一索引
									$rel=$model->bind_ip($data1,$edit_data);
									//p($rel);die;
									if ($rel==0) {
										echo '<script>alert("一个电脑只能登录一个学生用户！！!");location.href="../"</script>';
									}else{
										$this->mem->set($id,$ipv4, 0, 0);
										$this->assign('data',$data);
										$this->display('student/student_index.php');
									}
								}else{
									//p($getstu['ip']);die;
									if ($ipv4 !=$getstu['ip']) {
										echo '<script>alert("该用户与IP地址不符！！!");location.href="../"</script>';
									}else{
										$this->mem->set($id,$ipv4, 0, 0);
										$this->assign('data',$data);
										$this->display('student/student_index.php');
								}
							}
						}
					}else{
						echo "<script>alert(\"用户名或密码错误，请重新登录！\");history.go(-1)</script>";
					}
				}
			}else{
				echo '<script>alert("本场考试还未开始！！！");location.href="../"</script>';
			}
		}
		}
	}
	public function logout()
	{
		session_start();
		//$this->mem->delete(session_id());
		session_destroy();	
		echo '<script>location.href="../";</script>';
	}
	public function exam_situation()
	{
		$final=1;
		$model = new teacherModel();
		$get_exam=$model->get_exam();
		if (time()>=strtotime($get_exam[0]['EndTime'])) {
			$final=0;
		}
		echo $get_exam[0]['IsBegin']*$final;	
	}
}


