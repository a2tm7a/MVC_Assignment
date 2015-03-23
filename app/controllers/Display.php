<?php

namespace Controllers;

use Models\PostList;

class Display
{
	protected $twig;

	public function __construct()
	{
		$loader=new \Twig_Loader_Filesystem(__DIR__.'/../views');
		$this->twig=new \Twig_Environment($loader);		
	}
	
	public function get()
	{
		error_log("inside display");
		
		$posts=PostList::getAllNotifications();

		echo $this->twig->render("Home.html",array(
			"title"=>"Posts | MVC Blog",
			"username"=>$_SESSION["username"],
			"posts"=>$posts
			));
		//echo "Hello"; 		// on slash get this function is called
	}/*
	public function post()
	{
		error_log("inside_post_display");
		$name=$_POST['search_people'];
		$posts=PostList::getAllNotifications_user($name);

	//	foreach($posts as $index=>$value)
	//	{
	//		$date=new \DateTime();	
	//		$date->setTimestamp($value['created_at']);
	//		$posts[$index]['date']=$date->format('Y-m-d H:i:s');
	//		error_log($posts[$index]);
	//	}
		//error_log(implode(" ",implode(" ", $posts)));

		//console.log("Inside Display");

		echo $this->twig->render("Home.html",array(
			"title"=>"Posts | MVC Blog",
			"username"=>$_SESSION['username'],
			"posts"=>$posts
			));
	}*/
//	public function
	

}