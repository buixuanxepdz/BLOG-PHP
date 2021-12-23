<?php 
    require_once('models/Model.php');
    require_once('Connection.php');
    class Post extends Model{
        var $table = "posts"; 
        var $connection;
        public function __construct(){
			$connection_obj = new Connection();
			$this->connection = $connection_obj->conn;
		}
        function listPosts(){
            $posts = "SELECT posts.*,categories.name,users.name as username from posts inner join categories on posts.category_id = categories.id inner join users on posts.user_id = users.id order by created_at desc";
            // Thực thi câu lệnh
            // echo $posts;
            $result = $this->connection->query($posts);

            // Tạo 1 mảng để chứa dữ liệu
            $posts = array();

            while($row = $result->fetch_assoc()) { 
                $posts[] = $row;
            }
            //   echo "<pre>";
            //      print_r($posts);
            //     echo "</pre>";
            //     die();
            return $posts;
        }
    }
?>