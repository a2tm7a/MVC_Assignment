<?php

namespace Models;

class CheckUsername
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

	public static function check_username($username)
	{
		$db=self::getDB();
		$statement=$db->prepare("SELECT * FROM signup where usernname=:usernname");
		
		$statement->execute(array(':usernname' => $username,));
		$row=$statement->fetch();

	
		if($row)
			return false;
		else
			return true;

		
	}
}