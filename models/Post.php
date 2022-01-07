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

        public function postDashboard(){
            $sql = "Select * from posts order by view_count desc limit 5 ";
            return $this->connection->query($sql);
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

        function viewCount($slug){   //đếm lượt xem bài viết
            $post = "Update posts set view_count = view_count + 1 where slug = " ."'$slug'";
            // echo $post;
            // die();
            $this->connection->query($post);
        }

        function slides(){
            $slides = "SELECT posts.*,categories.name as categoryname,users.name as username From posts INNER JOIN categories on 
            posts.category_id = categories.id INNER JOIN users on posts.user_id = users.id ORDER BY created_at DESC LIMIT 3";

            $result = $this->connection->query($slides);

            $slides = array();

             while($row = $result->fetch_assoc()) { 
                $slides[] = $row;
            }
            return $slides;
        }

        function randPosts(){  //bài viết ngẫu nhiên
            $randPosts = "SELECT posts.*,categories.name as categoryname,users.name as username,users.avatar From posts INNER JOIN categories on 
            posts.category_id = categories.id INNER JOIN users on posts.user_id = users.id ORDER BY RAND() LIMIT 4";

            $result = $this->connection->query($randPosts);

            $randPosts = array();

             while($row = $result->fetch_assoc()) { 
                $randPosts[] = $row;
            }
            return $randPosts;
        }

        function hot(){  //Bài viết nổi bật
            $hot = "SELECT posts.*,categories.name as categoryname,users.name as username,users.avatar From posts INNER JOIN categories on 
            posts.category_id = categories.id INNER JOIN users on posts.user_id = users.id ORDER BY view_count DESC LIMIT 6";

            $result = $this->connection->query($hot);

            $hot = array();

             while($row = $result->fetch_assoc()) { 
                $hot[] = $row;
            }
            return $hot;
        }

        function detailPost($slug){  //xem chi tiết bài viết
            $details = "SELECT posts.*,categories.name as categoryname,users.name as username From posts INNER JOIN categories on posts.category_id = 
            categories.id INNER JOIN users on posts.user_id = users.id WHERE posts.slug = "."'$slug'";
            // echo $details;
            // die();
            return $this->connection->query($details)->fetch_assoc();
        }

        function postcategory($id){  /// lấy bài viết theo danh mục
             $postscategory = "SELECT posts.*,categories.name as categoryname,users.name as username From posts INNER JOIN categories on posts.category_id = 
            categories.id INNER JOIN users on posts.user_id = users.id WHERE posts.category_id = "."'$id'";
            // echo $postscategory;
            // die();
            return $this->connection->query($postscategory);
        }
        function newpostincategory($id){   //lấy 1 bài viết mới nhất theo danh mục
             $newpost = "SELECT posts.*,categories.name as categoryname,users.name as username From posts INNER JOIN categories on posts.category_id = 
            categories.id INNER JOIN users on posts.user_id = users.id  WHERE posts.category_id = ". "$id" ." ORDER BY posts.created_at DESC LIMIT 1";
            //  echo $newpost;
            // die();
            return $this->connection->query($newpost)->fetch_assoc();  
        }


        function search($keyword){
            $search = "SELECT posts.*,categories.name as categoryname,users.name as username From posts INNER JOIN categories on posts.category_id = 
            categories.id INNER JOIN users on posts.user_id = users.id  WHERE title like '%". $keyword . "%'";
            //  echo $keyword;
            // die();
            return $this->connection->query($search);
        }


    }
?>