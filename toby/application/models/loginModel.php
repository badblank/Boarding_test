<?php 
namespace application\models;
use core\lib\model;
/**
* 
*/
class loginModel extends model
{
	public $table = 'user';
	public function getUser($username)
	{
		$result = $this->get($this->table,'*',array(
			'name'=>$username
		));
		return $result;
	}
	public function getStudent($username)
	{
		$result = $this->get("student",'*',array(
			'sName'=>$username
		));
		return $result;
	}
	public function bind_ip($data1,$edit_data)
	{
		$result = $this->update("student",$data1,$edit_data);
		return $result->rowCount();
	}
}