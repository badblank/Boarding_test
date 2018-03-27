<?php
namespace core;
use core\lib\log;
use core\lib\route;
use application\controllers;
use core\lib\conf;

class toby
{
	/**
	 * 为了不重复加载类  加载过的放到这里面
	 */
	public static $classMap = array();
	public $assign;
	public $ctrl;
	public $action;
	static public function run()
	{
		include_once toby.'/PHPExcel/PHPExcel/IOFactory.php';
		//启动日志
		log::init();
		//p('ok');
		$route = new route();
		$ctrlClass = $route->ctrl; //控制器名字
		$action = $route->action;  //方法名
		$ctrlfile=app.'/controllers/'.$ctrlClass.'.php';

		$ctrlClass=application.'\\controllers\\'.$ctrlClass;
		//p($ctrlClass);exit();
		if (is_file($ctrlfile)) {
			include_once $ctrlfile;

			$ctrl = new $ctrlClass();
			$ctrl->$action();
			log::log('controllers:'.$ctrlClass.'   '.'action:'.$action);
		}else{
			throw new \Exception("找不到控制器", $ctrlClass);
		}
	}
	/**
	 * 自动加载类
	 */
	static public function load($class)
	{
		if (isset($classMap[$class])) {
			return true;
		}else{
			$class=str_replace('\\','/', $class);
			$file=toby.'/'.$class.'.php';
			if (is_file($file)) {
				include_once $file;
				self::$classMap[$class]=$class;
			}else{
				return false;
			}
		}
	}
	public function uri($number)
	{
		if (isset($_SERVER['PATH_INFO'])) {
				$path = $_SERVER['PATH_INFO'];
				$patharr=explode('/',trim($path,'/'));
			if ($number<2) {
				throw new \Exception("error!!!该片段不存在！！！！");
			}else{
				return isset($patharr[$number-1])?$patharr[$number-1]:'error！该片段不存在！！！！';
			}
		}else{
			$this->ctrl = conf::get('CTRL','route');
			$this->action = conf::get('ACTION','route');
		}
		
	}
	public function assign($name,$value)
	{
		$this->assign[$name] = $value;
	}

	public function  display($file)
	{
		/**
		 * 原来的载入视图
		 */
		// $file=app.'/views/'.$file;
		// if (is_file($file)) {
		// 	//将数组打散变成一个个变量
		// 	extract($this->assign);
		// 	include_once $file;
		// }
		/**
		 * 使用twig模板引擎
		 * @var [type]
		 */
		$path=$file;	
		//dump($path);die;
		$file=app.'/views/'.$file;	
		//dump(app.'/views');die;
		if (is_file($file)) {
			//将数组打散变成一个个变量
			//extract($this->assign);
                        include_once toby.'/vendor/twig/twig/lib/Twig/Autoloader.php';
			\Twig_AutoLoader::register();
			$loader = new \Twig_Loader_Filesystem(app.'/views/');
			$twig = new \Twig_Environment($loader, array(
    			//'cache' => toby.'/log/twig'
			));
			$template = $twig->loadTemplate($path);
			$template->display($this->assign?$this->assign:array());
		}
	}
}
