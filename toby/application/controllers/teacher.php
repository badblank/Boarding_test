<?php
namespace application\controllers;
use core\lib\model;
use application\models\teacherModel;
use application\models\adminModel;
use core\lib\Pagination;
class teacher extends \core\toby
{
	public $model;
	public $mem;
	function __construct() 
	{
		
		$this->model = new teacherModel();

		//初始化对象
		$this->mem = new \Memcache;
		//连接服务器
		$this->mem->connect("127.0.0.1", 11211);
		session_start();
		if (!isset($_SESSION['teacher'])) {
			echo "<script>location.href=\"../\";</script>";
		}
	}
	public function teacher_index()
	{
		$this->display('teacher/teacher_index.php');
	}
	public function teacher_intro()
	{
		$this->display('teacher/teacher_intro.php');
	}
	public function teacher_student_add()
	{
		$this->display('teacher/teacher_student_add.php');
	}
	public function student_add()
	{
		$info="";
		$filename='./upfile/teacher/'.$_FILES['file']['name'];
		upfile("teacher");
		$objPHPExcel=\PHPExcel_IOFactory::load($filename);//加载文件
		foreach ($objPHPExcel->getWorksheetIterator() as $sheet) {//循环获取sheet
			foreach ($sheet->getRowIterator() as $row) {
				if ($row->getRowIndex()<2) {
					continue; 
				}
				foreach ($row->getCellIterator() as $cell) {
					$data=$cell->getValue();
					$info[$row->getRowIndex()][]=$data;	
				}
			}
		}
		$length=count($info)+2;
		for ($j=2; $j <$length; $j++) { 
			$data = array(
        		"sId" => $info[$j][0],
      			"sName" => $info[$j][1],
       	 		"exam" => $info[$j][2]
			);
			$this->model->student_add($data);
		}
		echo "<script>alert(\"导入成功！！！\");history.go(-1)</script>";
	}
	public function student_add_one()
	{
		$data = array(
        	"sId" => $_POST["sid"],
      		"sName" => $_POST["sname"],
      		"exam"=>$_POST['subject']
		);
		$this->model->student_add($data);
		echo "<script>alert(\"添加成功！！！\");history.go(-1)</script>";
	}
	public function teacher_pwd_change()
	{
		$this->display('teacher/teacher_pwd_change.php');
	}
	public function teacher_exam_add()
	{
		$this->display('teacher/teacher_exam_add.php');
	}
	public function exam_add_cate()
	{
		$filename='./upfile/teacher/'.$_FILES['file']['name'];
		upfile("teacher");
		$data = array(
      		"BeginTime" => $_POST["begin_time"],
      		"EndTime" => $_POST["end_time"],
      		"class" => $_POST["class"],
      		"IsAuto" => $_POST["auto"],
      		"subject" => $_POST["subject"],
      		"examnation" => $_FILES['file']['name'],
      		"path" => $filename,
      		"creater" => $_POST["creater"]
		);
		$a=$this->model->exam_add($data);
		if ($a==0) {
			echo "<script>alert(\"添加失败！！！\");history.go(-1)</script>";
		}else{
			echo "<script>alert(\"添加成功！！！\");location.href=\"../teacher/teacher_exam_list\";</script>";
		}
	}
	public function exam_delete()
	{
		$id=$this->uri(3);
		$data=$this->model->getOne($id);
		unlink($data["path"]);
		if($this->model->delete_exam($id)==1){
			echo "<script>alert(\"删除成功！！！\");location.replace(document.referrer)</script>";
		}
	}
	public function teacher_exam_list()
	{
		$data=$this->model->get_exam();
		foreach ($data as $k => $v) {
			if ($v["IsAuto"]==1) {
				// p($v["BeginTime"]);
				// echo "br";
				// p(date("Y-m-d H:i:s"));die;
				if ($v["BeginTime"]==date("Y-m-d H:i:s")) {
					$data=array(
						"IsBegin" => 1
					);
					$edit_data=array(
						"BeginTime" => date("Y-m-d H:i:s")
					);
					$result=$this->model->exam_edit($data,$edit_data);
					echo "<script>alert(\"考试开始！！！\");location.replace(location)</script>";
				}
			}
		}
		$this->assign('data',$data);
		$this->display('teacher/teacher_exam_list.php');
	}
	public function exam_open()
	{
		$model1 = new teacherModel();
		$get_exam=$model1->get_exam();
		if (time()<strtotime($get_exam[0]['EndTime'])&&time()>strtotime($get_exam[0]['BeginTime'])) {
			$name=$_POST['exam_name'];
			$data=array(
				"IsBegin" => 1
			);
			$edit_data=array(
				"subject" => $name
			);
			$result=$this->model->exam_edit($data,$edit_data);
			if ($result==1) {
				echo "<script>alert(\"启动成功！！！\");location.replace(document.referrer)</script>";
			}else{
				echo "<script>alert(\"该场考试已启动或输入名称错误！！！\");location.replace(document.referrer)</script>";
			}
		}else{
			echo "<script>alert(\"此时不在考试范围时间内！\");location.replace(document.referrer)</script>";
		}
	}
	public function teacher_exam_situation()
	{
		$exam=$this->model->get_exam();
		if (!isset($exam[0])||$exam[0]['IsBegin']==0) {
			echo "<script>alert(\"考试不存在或未开启！！！\");location.href=\"teacher_intro\"</script>";
		}else{
			$exam_name=$exam[0]['subject'];
			$student_all_number=$this->model->student_all_number($exam_name);
			$student_login=$this->model->student_login($exam_name);
			$student_submit=$this->model->student_submit($exam_name);
			$data=array(
				'exam_name'=>$exam_name,
				'student_all_number'=>$student_all_number,
				'student_login'=>$student_login,
				'student_unlogin'=>$student_all_number-$student_login,
				'student_submit'=>$student_submit,
				'student_unsubmit'=>$student_login-$student_submit
			);
			$this->assign('data',$data);
			$this->display('teacher/teacher_exam_situation.php');
		}
	}
	public function teacher_exam_edit()
	{
		$id=$this->uri(3);
		//$data=$this->model->getOne($id);

		$system = new adminModel();
		//$data = $system->system_list();
		$data=array(
			"0"=>$this->model->getOne($id),
			"1"=>$system->system_list()
		);
		//p($data);die;
		$this->assign('data',$data);
		$this->display('teacher/teacher_exam_edit.php');
	}
	public function exam_edit_cate()
	{
		$data=$this->model->get_exam();
		if ($_FILES['file']['name']!=null) {
			//echo 1;die;
			$filename='./upfile/teacher/'.$_FILES['file']['name'];
			upfile("teacher");
			unlink($data[0]['path']);
			$data=array(
				"BeginTime" => $_POST["begin_time"],
	      		"EndTime" => $_POST["end_time"],
	      		"class" => $_POST["class"],
	      		"IsAuto" => $_POST["auto"],
	      		"subject" => $_POST["subject"],
	      		"examnation" => $_FILES['file']['name'],
	      		"path" => $filename,
	      		"creater" => $_POST["creater"]
			);
			$edit_data=array(
				"id"=>$this->uri(3)
			);	
			$a=$this->model->exam_edit($data,$edit_data);
			if ($a==0) {
				echo "<script>alert(\"修改失败！！！\");history.go(-1)</script>";
			}else{  
				echo "<script>alert(\"修改成功！！！\");location.href=\"../../teacher/teacher_exam_list\";</script>";
			}	
		}else{
			$data=array(
				"BeginTime" => $_POST["begin_time"],
	      		"EndTime" => $_POST["end_time"],
	      		"class" => $_POST["class"],
	      		"IsAuto" => $_POST["auto"],
	      		"subject" => $_POST["subject"],
	      		// "examnation" => $_FILES['file']['name'],
	      		//"path" => $filename,
	      		"creater" => $_POST["creater"]
			);
			$edit_data=array(
				"id"=>$this->uri(3)
			);	
			$a=$this->model->exam_edit($data,$edit_data);
			if ($a==0) {
				echo "<script>alert(\"修改失败！！！\");history.go(-1)</script>";
			}else{  
				echo "<script>alert(\"修改成功！！！\");location.href=\"../../teacher/teacher_exam_list\";</script>";
			}	
		}
	}
	public function teacher_student_unlock()
	{
		$exam=$this->model->get_exam();
		if (!isset($exam[0])||$exam[0]['IsBegin']==0) {
			echo "<script>alert(\"考试不存在或未开启！！！\");location.href=\"teacher_intro\"</script>";
		}else{
			$this->display('teacher/teacher_student_unlock.php');
		}
	}
	public function unlock_class()
	{
		$exam=$_POST['exam'];
		$edit_data=array(
			"exam"=>$exam
		);
		$data=array(
			"ip"=>null
		);		
		if ($this->model->unlock($data,$edit_data)!=0) {
			echo "<script>alert(\"全部解除成功！\");location.replace(document.referrer)</script>";
		}else{
			echo "<script>alert(\"目前没有学生登录！\");location.replace(document.referrer)</script>";
		}
	}
	public function unlock()
	{
		$id=$this->uri(3);
		$edit_data=array(
			"sId"=>$id
		);
		$data=array(
			"ip"=>null
		);
		if ($this->model->unlock($data,$edit_data)==1) {
			echo "<script>alert(\"解除成功！！！\");location.replace(document.referrer)</script>";
		}
	}
	public function search_ip()
	{
		$ip=$_POST['ip'];
		$info=$this->model->getip($ip);
		if ($info) {
			echo json_encode($info);	
		}else{
			echo "该IP不存在！！！";
		}
	}
	public function search_name()
	{
		$name=$_POST['name'];
		$info=$this->model->getname($name);
		if ($info) {
			if (is_null($info["ip"])) {
				echo "该用户未登录！！!";
			}else{
				echo json_encode($info);
			}
		}else{
			echo "该学生不存在！！！";
		}
	}
	public function teacher_exam_broadcast()
	{
		$exam=$this->model->get_exam();
		if (!isset($exam[0])||$exam[0]['IsBegin']==0) {
			echo "<script>alert(\"考试不存在或未开启！！！\");location.href=\"teacher_intro\"</script>";
		}else{
			$data=$this->model->get_message();
			$this->assign('data',$data);
			$this->display('teacher/teacher_exam_broadcast.php');
		}
	}
	public function broadcast_add()
	{
		$data=array(
			"content"=>$_POST['content'],
			"time"=>date("y-m-d h:i:s")
		);  
		//p($data);die;
		$b=$this->model->message_add($data);
		if ($b==0) {
			echo "<script>alert(\"添加失败！！！\");history.go(-1)</script>";
		}else{
			echo "<script>alert(\"添加成功！！！\");location.href=\"../teacher/teacher_exam_broadcast\";</script>";
		}
	}
	public function broadcast_delete()
	{
		$id=$this->uri(3);
		$this->model->message_delete($id);
		echo "<script>location.replace(document.referrer)</script>";
	}
	public function teacher_exam_end()
	{
		$data=$this->model->get_exam();
		if(!isset($data[0]))
		{
			echo '<script>alert("不存在考试！！！");location.href="teacher_intro"</script>';
		}else{
			$this->assign('data',$data[0]);
			$this->display('teacher/teacher_exam_end.php');
		}
	}
	public function addFileToZip()
	{
		$get_exam=$this->model->get_exam();
		if ($get_exam[0]['IsBegin']!=1) {
			    //获取列表 
		    $datalist=list_dir('./upfile/student/');
		    //print_r($datalist);die;
		    // $dirs = explode(',', $_POST['ids']);
		    //实例化zipArchive类
		    $zip = new \zipArchive();
		    //创建空的压缩包
		    $zipName = $get_exam[0]['subject'].".zip";
		    //$zip->open($zipName, \ZIPARCHIVE::OVERWRITE); //打开的方式来进行创建 若有则打开 若没有则进行创建
		    $zip->open($zipName,\ZipArchive::OVERWRITE|\ZipArchive::CREATE);
		    //循环将要下载的文件路径添加到压缩包
		    foreach ($datalist as $v) {
		        $zip->addFile($v, basename($v));
		    }
		    //关闭压缩包
		    $zip->close();
		    //实现文件的下载
		    header('Content-Type:Application/zip');
		    header('Content-Disposition:attachment; filename=' . $zipName);
		    header('Content-Length:' . filesize($zipName));
		    readfile($zipName);
		    //删除生成的压缩文件
		    unlink($zipName);
			$data=array(	
				"Isdownload" => 1
			);
			$edit_data=array(
				"id" => $get_exam[0]['id']
			);
			$result=$this->model->exam_edit($data,$edit_data);		
		}else{
			echo '<script>alert("考试未结束！不可打包下载！");location.href="teacher_exam_end"</script>';
		}
	}
	public function exam_clear()
	{
		$get_exam=$this->model->get_exam();
		if ($get_exam[0]['Isdownload']==1) {
			$this->model->clear_all("exam");
			$this->model->clear_all("student");
			$this->model->clear_all("studentfile");
			$this->model->clear_all("message");
			array_map('unlink', glob('./upfile/student/*'));
			array_map('unlink', glob('./upfile/teacher/*'));
		}else{
			echo '<script>alert("未打包下载，不可清理考试！");location.href="teacher_exam_end"</script>';
		}
	}
	public function stop_exam()
	{
		$get_exam=$this->model->get_exam();
		$data=array(
			"IsBegin" => 0,
			"IsAuto" => 0
		);
		$edit_data=array(
			"id" => $get_exam[0]['id']
		);
		$result=$this->model->exam_edit($data,$edit_data);
		if ($result==1) {
			echo '<script>alert("考试终止！");location.href="teacher_exam_situation"</script>';
		}else{
			echo '<script>alert("考试已经被终止！！！");location.href="teacher_exam_situation"</script>';
		}
	}
	public function exam_auto()
	{
		$model = new teacherModel();
		$get_exam=$model->get_exam();
		if (isset($get_exam[0])) {
			if ($get_exam[0]['IsAuto']==1) {
				if (time()>=strtotime($get_exam[0]['BeginTime'])&&time()<=strtotime($get_exam[0]['EndTime'])) {
						$data=array(
							"IsBegin" => 1
						);
						$edit_data=array(
							"id" => $get_exam[0]['id']
						);
						$this->model->exam_edit($data,$edit_data);
				}
			}
		}
	}

}