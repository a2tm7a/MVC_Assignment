<?php

namespace Models;

class PostList
{
	protected $db;

	public function __construct()
	{
		$this->db=self::getDB();

	}

	public static function getDB()
	{
		return new \PDO("mysql:dbname=amit;host=localhost","root","SDSLabs");
	}

	

	public static function getAllNotifications()
	{
		$db=self::getDB();
		$time=time();
		$statement=$db->prepare("SELECT * FROM notification order by time desc");
		
		$statement->execute();

		$row=$statement->fetchAll(\PDO::FETCH_ASSOC);
			$posts=$row;
		
		return $posts;
	}
	public static function getAllNotifications_user($name)
	{
		error_log($name);
		$db=self::getDB();
		$time=time();
		error_log("inside getALlNotifications_user".$name);
		$statement=$db->prepare("SELECT * FROM notification where username = :username order by time desc ");
		$statement->bindValue(':username',$name,\PDO::PARAM_INT);
		$statement->execute();


		$row=$statement->fetchAll(\PDO::FETCH_ASSOC);
			$posts=$row;
		return $posts;
	}
}