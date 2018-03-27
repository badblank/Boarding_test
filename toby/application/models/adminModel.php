<?php 
namespace application\models;
use core\lib\model;
/**
* 
*/
class adminModel extends model
{
	public $table = 'user';
	public function get_teacher($username)
	{
		$result = $this->get($this->table,'*',array(
			'name'=>$username,
			//'type'=>0
		));
		return $result;
	}
	public function teacher_list()
	{
		$result = $this->select($this->table, "*" ,"*");
		return $result;
	}
	public function teacher_add($data)
	{
		$result = $this->insert($this->table,$data);
		return $result->rowCount();
	}
	public function teacher_delete($user)
	{
		$result = $this->delete($this->table,array(
			//'type'=>"0",
			'name'=>$user
		));
		return $result->rowCount();
	}
	public function pwd_change($data,$user)
	{
		$result = $this->update($this->table,$data,$user);
		return $result->rowCount();
	}
	public function system_list()
	{
		$result = $this->get("system_set",'*',array(
			'id'=> 1
		));
		return $result;
	}
	public function system_set($data,$id)
	{
		$result = $this->update("system_set",$data,$id);
		return $result->rowCount();
	}

}