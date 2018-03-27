<?php
namespace core\lib;
use core\lib\conf;
/**
* 
*/
class route
{
	public $ctrl;
	public $action;
	public function __construct()
	{
		
		if (isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] !='/') {
			$path = $_SERVER['PATH_INFO'];
			$patharr=explode('/',trim($path,'/'));
			//print_r(conf::get('ACTION','route'));
			if (isset($patharr[0])) {
				$this->ctrl = $patharr[0];
				unset($patharr[0]);
			}
			if (isset($patharr[1])) {
				$this->action = $patharr[1];
				unset($patharr[1]);
			}else{
				$this->action = conf::get('ACTION','route');
			}
		}else{
			$this->ctrl = conf::get('CTRL','route');
			$this->action = conf::get('ACTION','route');
		}
	}
}
