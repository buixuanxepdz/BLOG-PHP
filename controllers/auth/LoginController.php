<?php
	require_once('controllers/BaseController.php');
	require_once('models/User.php');
	class LoginController extends BaseController
	{
		public function loginForm(){
			if(!empty($_SESSION['auth'])){
				return $this->redirect('?admin=admin&mod=dashboard&act=list');
			}
			return $this->view('views/auth/login');
		}
	    public function login(){
	    	$data = $_POST;

	    	$modelUser = new User();
	    	$users = $modelUser->all();
	    	foreach ($users as $user) {
	    		if($user['email'] == $data['email'] && $user['password'] == md5($data['password'])){
	    			$_SESSION['auth'] = $user;
	    			return $this->redirect('?admin=admin&mod=dashboard&act=list');
	    			/*header('location:views/admin/index.php');*/
	    		}
	    	}
	    	$_SESSION['error'] = 'Loi dang nhap';
	    	return $this->back();
	    }
	}
	

?>