<?php
	require_once('models/Category.php');
	require_once('controllers/admin/BaseAdminController.php');
	class CategoryController extends BaseController{
		var $model;
		public function __construct(){
			$this->model = new Category();
		}
		public function list(){
			 if(isset($_SESSION['auth'])){
				$categories = $this->model->all();
				$this->view('views/backend/categories/index',[
					'categories' => $categories
				]);
			}else{
				header("Location: index.php?admin=auth&mod=login&act=loginForm");
			}
		}
		public function detail(){

			$id = $_GET['id'];
			$category = $this->model->find($id);
			echo json_encode($category);

		}

		public function store(){
			$data = $_POST;
			$success = $this->model->create($data);
			if ($success) {
				setcookie('success','Thêm danh mục thành công',time()+1);
			}else{
				setcookie('error','Thêm danh mục thất bại',time()+1);
			}
		}

		function update(){
			$id = $_GET['id'];
			$category = $this->model->find($id);
			$data = $_POST;
			$status = $this->model->update($data);
			if ($status) {
				setcookie('success','Cập nhật thành công',time()+1);
			}else{
				setcookie('error','Cập nhật thất bại',time()+1);
			}
			header("Location: ?admin=admin&mod=category&act=list");
		}

		public function delete(){
			$id = $_GET['id'];
			$category = $this->model->destroy($id);
			if ($category) {
				setcookie('success','Xóa danh mục thành công',time()+1);
			}else{
				setcookie('error','Xóa danh mục thất bại',time()+1);
			}
		}
    }
?>