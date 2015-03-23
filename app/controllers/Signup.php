<?php
	
	namespace Controllers;

	use Models\CheckUsername;
	use Models\NewUser;
	use Controllers\Display;

	class Signup
	{
		

		public function __construct()
		{
			$loader=new \Twig_Loader_Filesystem(__DIR__.'/../views');
			$this->twig=new \Twig_Environment($loader);		
		}
		public function post()
		{
			if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['name'])&&isset($_POST['email']))
			{
				$username=$_POST['username'];

				$check_username=CheckUsername::check_username($username);

				
				if($check_username)
					{	
						session_start();
						$_SESSION["username"];
						$new_user=NewUser::new_user($_POST['username'],$_POST['password'],$_POST['name'],$_POST['email']);
						if($new_user)
						{
							$message="Welcome ";
							Display::get();
						}

						else{
							$status_code=-1;
							$message="Error during SQL command. Try again";
							echo $this->twig->render("Error.html",array(
							
							"title"=>"BookFace",
							"message"=>array("Hello World","namaste")
							));
						}
						

					}
				else
					{
						$status_code=-1;
						$message="Username already taken";
						echo $this->twig->render("Error_taken.html",array(
						
						"title"=>"BookFace",
						"message"=>$message
						));

						
					}
					
			}
			else{
				$status_code=-1;
				$message="Enter complete information";
				echo $this->twig->render("index.html",array(
				
				"title"=>"BookFace",
				"message"=>array("Hello World","namaste")
				));
			}
		}
	}
?>