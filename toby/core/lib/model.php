<?php 
namespace core\lib;
use core\lib\conf;
/**
* 
*/
class model extends \Medoo\Medoo
{
	function __construct()
	{
		$option = conf::all('datebase');
		parent::__construct($option);
		// $datebase=conf::all('datebase');
		// //p($temp);
		// try {
		// 	parent::__construct($datebase['DSN'],$datebase['USERNAME'],$datebase['PASSWD']);
		// } catch (\PDOException $e) {
		// 	p($e->getMessage());
		// }
	}
}