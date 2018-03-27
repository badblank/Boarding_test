<?php
namespace core\lib;
class conf
{
	//存储已加载的数组
	static public $conf = array();
	//单个配置
	static public function get($name,$file)
	{
		if (isset(self::$conf[$file])) {
			return self::$conf[$file][$name];
		}else{
			//判断配置文件是否存在
			$path = toby.'\core\config\\'.$file.'.php';
			$path=str_replace('\\','/', $path);
			if (is_file($path)) {
				$conf=include $path;
				if (isset($conf[$name])) {
					self::$conf[$file]=$conf;
					return $conf[$name];
				}else{
					throw new Exception("没有这个配置项", $name);
				}
			}else{
				throw new \Exception("找不到配置文件:", $file);
			}
		}
	}
	//整个配置文件
	static public function all($file)
	{
		if (isset(self::$conf[$file])) {
			return self::$conf[$file];
		}else{
			//判断配置文件是否存在
			$path = toby.'\core\config\\'.$file.'.php';
			$path=str_replace('\\','/', $path);
			if (is_file($path)) {
				$conf=include $path;
				self::$conf[$file]=$conf;
				return $conf;
			}else{
				throw new \Exception("找不到配置文件:", $file);
			}
		}
	}
}