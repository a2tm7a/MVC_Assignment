<?php

namespace Controllers;

use Models\PostList;

class Display_user_notifications
{
	protected $twig;

	public function __construct()
	{
		$loader=new \Twig_Loader_Filesystem(__DIR__.'/../views');
		$this->twig=new \Twig_Environment($loader);		
	}
	
	
	public function post()
	{
		session_start();

		error_log("inside_display user notifications");
		$name=$_POST['search_people'];
		error_log($name);
		$posts=PostList::getAllNotifications_user($name);


		echo $this->twig->render("Home.html",array(
			"title"=>"Posts | MVC Blog",
			"username"=>$_SESSION['username'],												
			"posts"=>$posts
			));
	}	

}