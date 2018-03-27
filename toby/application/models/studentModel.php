<?php 
namespace application\models;
use core\lib\model;
/**
* 
*/
class studentModel extends model
{
	public $table = 'studentfile';
	public function path_add($data)
	{
		$result = $this->insert($this->table,$data);
		return $result->rowCount();
	}
	public function path_update($data1,$edit_data1)
	{
		$result = $this->update($this->table,$data1,$edit_data1);
		return $result->rowCount();
	}
	public function upfile_list($id)
	{
		$result = $this->select($this->table, "*",array(
			'sId'=>$id
		));
		return $result;
	}
	public function get_file($sId)
	{
		$result = $this->get($this->table, '*' ,array(
			'sId'=>$sId
		));
		return $result;
	}
	public function get_path($id)
	{
		$result = $this->get($this->table, '*' ,array(
			'id'=>$id
		));
		return $result;
	}
	public function delete_file($id)
	{
		$result = $this->delete($this->table,array(
			'id'=>$id
		));
		return $result->rowCount();
	}
	public function get_exam() 
	{
		$result = $this->select("exam",'*');
		return $result;
	}
	public function submit($data,$edit_data)
	{
		$result = $this->update("student",$data,$edit_data);
		return $result->rowCount();
	}
}