<?php
namespace core\lib\drive\log;
use core\lib\conf;

class file{
	public $path;//日志存储位置
	public function __construct(){
		$path1=conf::get('OPTION','log');
		$this->path=$path1['PATH'];
	}
	public function log($message,$file = 'log'){
		$this->path=str_replace('\\','/', $this->path);
		if (!is_dir($this->path)) {
					mkdir($this->path,'0777',true);
				}		
		//return file_put_contents($this->path.$file.'.php', date('Y-m-d H:i:s').json_encode($message).PHP_EOL,FILE_APPEND);
	}
}
