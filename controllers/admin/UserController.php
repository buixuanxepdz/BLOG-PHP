<?php
	require_once('models/User.php');
	require_once('models/Category.php');
	require_once('controllers/admin/BaseAdminController.php');
	class UserController extends BaseController{
		var $model;
		public function __construct(){
			$this->model = new User();
			$this->modelCategory = new Category();
		}
		public function list(){
			if($_SESSION['auth']['role'] == 1){   // 1: ADMIN
				$users = $this->model->all();
				$this->view('views/backend/users/index',[
					'users' => $users
				]);
			}
			else{
				$this->view('views/backend/404');
			}
		}
		// function detail(){
		// 	$id = $_GET['id'];
		// 	$user = $this->model->find($id);
		// 	echo json_encode($user);
		// }

		public function store(){
			$data = $_POST;
			$success = $this->model->createUser($data);
			if ($success) {
				setcookie('success','Thêm mới thành công',time()+1);
			}else{
				setcookie('error','Thêm mới thất bại',time()+1);
			}
			// header("Location: index.php?admin=admin&mod=user&act=list");
		}

		public function updateImage(){
			$data = $_POST;
			$target_dir = "publics/avatars/";  // thư mục chứa file upload

	        $target_file = $target_dir . basename($_FILES["avatar"]["name"]); // link sẽ upload file lên
	        
	        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) { // nếu upload file không có lỗi 
	        	$img = array('avatar' => $_FILES["avatar"]["name"]);
	        	$data = array_merge($data, $img);
	        } else { // Upload file có lỗi 
	        	echo "Sorry, there was an error uploading your file.";
	        }
			$success = $this->model->updateImg($data);
			if ($success) {
				setcookie('success','Cập nhật thành công',time()+1);
			}else{
				setcookie('error','Cập nhật thất bại',time()+1);
			}
			return $this->back();
		}

		public function delete(){
			$id = $_GET['id'];
			$success = $this->model->destroy($id);
			if ($success) {
				setcookie('success','Xóa thành công',time()+1);
			}else{
				setcookie('error','Xóa thất bại',time()+1);
			}
		}
		public function profile(){
			$id = $_GET['id'];
			$profile = $this->model->find($id);
			$this->view('views/backend/users/profile',['profile' => $profile]);
		}
		public function update(){
			$data = $_POST;
			$status = $this->model->update($data);
			if ($status) {
				setcookie('success','Cập nhật thành công',time()+1);
			}else{
				setcookie('error','Cập nhật thất bại',time()+1);
			}
			return $this->back();
		}
    }
?>