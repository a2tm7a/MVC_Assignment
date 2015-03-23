<?php

namespace Models;

class Login
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

	public static function check_login($username,$password)
	{
		$db=self::getDB();
		$statement=$db->prepare("SELECT * FROM signup where usernname=:usernname and password=:password");
		$password=md5($password);
		
		$statement->execute(array(':usernname' => $username,
			':password'=>$password));
		$row=$statement->fetch();

		if($row)
			{			
				session_start();
				$_SESSION["username"]=$row["usernname"];
				$_SESSION["name"]=$row["name"];
				$_SESSION["email"]=$row["email"];
				return true;
			}
		else
			return false;

		
	}
}