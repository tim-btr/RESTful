<?php

use config\Core; 
use library\Helper;

class FrontController
{
	private $routes;
	public $params;

	public function __construct()
	{
		$this->routes = include './config/routes.php';
	}

	public function getUri()
	{
		if(!empty($_SERVER['REQUEST_URI'])) {
			return Helper::trimAll($_SERVER['REQUEST_URI'], '/');
		}
	}

	public function init()
	{
		$uri = $this->getUri();

		foreach($this->routes as $k=>$v) {
			if(preg_match('#^'.$k.'$#ui', $uri)) {

				$temp = preg_replace('#^'.$k.'$#ui', $v, $uri);

				$params = $this->params = explode('/', $temp);
				$this->params = explode('/', $uri );
				
				if($params[0] == 'api') {
					Core::$MODEL = Core::$MODEL.'/api';
					Core::$SKIN = 'api';
					unset($params[0]);
				}

				$i = 0;
				foreach($params as $key=>$value) {
					if($i == 0) {
						if(!empty($value)) {
							$_GET['module'] = $value;
						}
					} elseif($i == 1) {
						if(!empty($value)) {
							$_GET['page'] = $value;
						}
					} else {
						$_GET['key'.($key-1)] = $value;
					}
					++$i;
				}
				return true;
			}
		}
	}
}