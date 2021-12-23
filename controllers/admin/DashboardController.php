<?php 
    require_once('models/Post.php');
	require_once('models/Category.php');
	require_once('models/User.php');
    require_once('controllers/admin/BaseAdminController.php');
    Class DashboardController extends BaseController{
        var $model;
		public function __construct(){
			$this->model = new Post();
			$this->category_model = new Category();
			$this->user_model = new User();
		}
        public function list(){
            $posts = $this->model->all();
            $categories = $this->category_model->all();
            $users = $this->user_model->all();
			$this->view('views/backend/dashboard',[
                'posts' => $posts,
                'categories' => $categories,
                'users' => $users,
            ]);
		}
    }

?>