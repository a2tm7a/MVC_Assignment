<?php
	namespace Controllers;

	class Logout
	{
		protected $twig;

		public function __construct()
		{
			$loader=new \Twig_Loader_Filesystem(__DIR__.'/../views');
			$this->twig=new \Twig_Environment($loader);	
		}

		public function post()
		{
			session_destroy();
			error_log("logout");
			echo $this->twig->render("index.html",array(
				"title"=>"BookFace",
				"message"=>array("Hello World","namaste")	
				));

		}
	}

?>