<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */

define('toby', realpath('./'));
define('core', toby.'/core');
define('app', toby.'/application');
define('application','\application');


include_once "vendor/autoload.php";

/**
 * 是否开启调试模式
 */
define('DEBUG', true);

if (DEBUG) {
	$whoops = new \Whoops\Run;
	$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
	$whoops->register();

	ini_set('display_error', 'On');
}else{
	ini_set('display_error', 'Off');
}

//dump($_SERVER);
/**
 * 加载函数库
 */

include_once core.'/common/function.php';

/**
 * 启动框架
 */

include_once core.'/toby.php';
//p(toby);

spl_autoload_register('\core\toby::load');

\core\toby::run();


