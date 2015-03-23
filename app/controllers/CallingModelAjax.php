<?php

namespace Controllers;

use Models\Ajax;

class CallingModelAjax
{
	protected $twig;

	public function __construct()
	{
		$loader=new \Twig_Loader_Filesystem(__DIR__.'/../views');
		$this->twig=new \Twig_Environment($loader);		
	}
	public static function post()
	{
		$msg=$_POST['msg'];
		$result=Ajax::post($msg);
		echo $result;
	}
}