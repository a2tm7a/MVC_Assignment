<?php 
	
	namespace Models;


	class Ajax{

		protected $db;

		public function __construct()
		{
			$this->db=self::getDB();

		}
		public static function getDB()
		{
			return new \PDO("mysql:dbname=amit;host=localhost","root","SDSLabs");
		}
		public static function post($msg)
		{
			error_log("inside AJAX");
			$db=self::getDB();
			
			$dt = time();
			$retime=date('Y-m-d H:i:s',$dt);

			session_start();

			$username=$_SESSION["username"];
			
			$name=$_SESSION["name"];
			
			$statement=$db->prepare("Insert into notification values (:username,:name,:message,:time)");
			
			$statement->execute(array(':username' => $username,
			':name'=>$name,
			':message'=>$msg,
			':time'=>$retime));
		
				$result=array("status"=>1,"msg"=>$msg,"name"=>$name,"time"=>$retime);
				
				
			  	return json_encode($result);
		}


	}
			


			/*$sql = "INSERT INTO notification (name, username, mesage) VALUES ('$nameme','$usernameme','$msg')";
			
			mysqli_query($conn, $sql);
			
			$msg=htmlspecialchars($msg, ENT_QUOTES, 'UTF-8');
			$nameme=htmlspecialchars($nameme, ENT_QUOTES, 'UTF-8');
			$usernameme=htmlspecialchars($usernameme, ENT_QUOTES, 'UTF-8');
		
			$result=array("status"=>1,"msg"=>$msg,"name"=>$nameme,"time"=>$retime);
			//echo $result['status'];
		//	console.log($result['status']);
		  	echo json_encode($result);
				*/
				
	?>

  			 	