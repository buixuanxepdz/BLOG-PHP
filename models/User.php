<?php
	require_once('Model.php');
	require_once('Connection.php');
	class User extends Model{
		var $table = "users";	
		var $connection;
		public function __construct(){
			$connection_obj = new Connection();
			$this->connection = $connection_obj->conn;
		}
		function createUser($data){
			$sql = "INSERT INTO ".$this->table." (name,email,password,avatar,role,address,phone)
			 VALUES 
			 ('".$data['name']."','".$data['email']."',md5('".$data['password']."'),'".$data['avatar']."',0,'".$data['address']."','".$data['phone']."')"; //0: người dùng
			// echo $sql;
			// die();
			return $this->connection->query($sql);
		}

		function updateImg($data){
			$sql = "UPDATE ".$this->table." SET 
			 avatar = '".$data['avatar']."' WHERE  id = ".$data['id'];
			// echo $sql;
			// die();
			return $this->connection->query($sql);
		}
	}
?>