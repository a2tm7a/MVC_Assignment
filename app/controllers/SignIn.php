<?php
	
	namespace Controllers;

	use Models\Login;
	use Controllers\Display;

	class SignIn
	{
		

		public function __construct()
		{
			$loader=new \Twig_Loader_Filesystem(__DIR__.'/../views');
			$this->twig=new \Twig_Environment($loader);		
		}
		
		/*Function for signin*/

		public function post()
		{
			if(isset($_POST['username'])&&isset($_POST['password']))
			{
				$username=$_POST['username'];
				$password=$_POST['password'];

				$check_login=Login::check_login($username,$password);

				
				if($check_login)
					{	
						$status_code=1;
						
						$message="Welcome ";
						Display::get();
					
					}
				else
					{
					
						$status_code=0;
						$message="Wrong username or password";
						echo $this->twig->render("Error_taken.html",array(
						"username"=>$username,
						
						"message"=>$message
						));
					}
					
			}
			else
			{
				$status_code=-1;
				$message="Enter complete information";
				echo $this->twig->render("index.html",array(
				
				"title"=>"BookFace",
				"message"=>array("Hello World","namaste")
				));
			}
			
		}
	}