<?php

namespace Models;

class NewUser
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

	public static function new_user($username,$password,$name,$email)
	{
		$db=self::getDB();
		$statement=$db->prepare("Insert into signup values (:username,:password,:name,:email)");
		$password=md5($password);
		
		$statement->execute(array(':username' => $username,
			':password'=>$password,
			':name'=>$name,
			':email'=>$email));
		
		if($statement)
			return true;
		else
			return false;

		
	}
}