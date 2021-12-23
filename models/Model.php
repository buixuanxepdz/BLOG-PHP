<?php
	require_once('Connection.php');
	class Model {
		var $table;
		var $connection;

		public function __construct(){
			$connection_obj = new Connection();
			$this->connection = $connection_obj->conn;
		}

		public function all(){
			$sql = "SELECT * FROM " .$this->table. " ORDER BY created_at DESC";

			$result = $this->connection->query($sql);

			$categories = array();

			while($row = $result->fetch_assoc()){
				$categories[] = $row;
			}
			return $categories;
		}
		public function find($id){
			$sql = "SELECT * FROM ".$this->table." WHERE $this->table.id = " .$id;
			return $this->connection->query($sql)->fetch_assoc();
			/*echo $sql;
			die();*/
		}

		public function destroy($id){
			$query = "DELETE FROM ".$this->table." WHERE id = ".$id;
			return $this->connection->query($query);
		}

		public function create($data){
			$columns = '';
			$values = '';
			foreach ($data as $key => $value) {
				$columns .= $key . ',';	
				$values .= "'".$value."',";	
			}
			$columns = trim($columns,',');
			$values = trim($values,',');

			$sql = "INSERT INTO ".$this->table." (".$columns.") VALUES (".$values.")";
			/*echo $sql;
			die();*/
			return $this->connection->query($sql);
		}
		public function update($data){
			$values = '';
			foreach ($data as $key => $value) {
				$values .= $key."='".$value."',";	
			}
			$values = trim($values,',');
			$query =  "UPDATE ".$this->table." SET ".$values." WHERE id = '".$data['id']."' ";
			// echo $query;
			// die();
			return $this->connection->query($query);
		}
		
	}
?>