<?php

    require_once('models/Post.php');
	require_once('models/Category.php');
    require_once('controllers/admin/BaseAdminController.php');
	class PostController extends BaseController{
		var $model;
		public function __construct(){
			$this->model = new Post();
			$this->category_model = new Category();
		}
		public function list(){
			if(isset($_SESSION['auth'])){
				$posts = $this->model->listPosts();
				$categories = $this->category_model->all();
				$this->view('views/backend/posts/index',[ 
					'posts' => $posts,
					'categories' => $categories
				]);
			}else{
				header("Location: index.php?admin=auth&mod=login&act=loginForm");
			}
		}

			// public function detail(){	
			// $slug = $_GET['slug'];
			// $view = $this->model->viewCount($slug);
			// $post = $this->model->find($slug);
			// echo json_encode($post);

			// }

		public function store(){
			$data = $_POST;
			$target_dir = "publics/posts/";  // thư mục chứa file upload
			$target_file = $target_dir . basename($_FILES["thumbnail"]["name"]); // link sẽ upload file lên
			
			if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) { // nếu upload file không có lỗi 
				$img = array('thumbnail' => $_FILES["thumbnail"]["name"]);
				$data = array_merge($data, $img);
			} else { // Upload file có lỗi 
				echo "Sorry, there was an error uploading your file.";
			}
			$success = $this->model->create($data);
			if ($success) {
				setcookie('success','Thêm bài viết thành công',time()+1);
			}else{
				setcookie('error','Thêm bài viết thất bại',time()+1);
			}
			header("Location: index.php?admin=admin&mod=post&act=list");
		}
		public function delete(){
			$id = $_GET['id'];
			$success = $this->model->destroy($id);
			if ($success) {
				setcookie('success','Xóa bài viết thành công',time()+1);
			}else{
				setcookie('error','Xóa bài viết thất bại',time()+1);
			}
		}
		public function update(){
			$data = $_POST;
			$target_dir = "publics/posts/";  // thư mục chứa file upload
			$target_file = $target_dir . basename($_FILES["thumbnail"]["name"]); // link sẽ upload file lên
			
			if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) { // nếu upload file không có lỗi 
				$img = array('thumbnail' => $_FILES["thumbnail"]["name"]);
				$data = array_merge($data, $img);
			} else { // Upload file có lỗi 
				echo "Sorry, there was an error uploading your file.";
			}
			$status = $this->model->update($data);
			if ($status) {
				setcookie('success','Cập nhật thành công',time()+1);
			}else{
				setcookie('error','Cập nhật thất bại',time()+1);
			}
			header("location:index.php?admin=admin&mod=post&act=list");
		}
	}

?>