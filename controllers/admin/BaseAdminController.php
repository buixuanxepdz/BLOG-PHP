<?php 
	require_once('controllers/BaseController.php');
	class BaseAdminController extends BaseController
	{	
		public function __construct(){
			if (isset($_SESSION['auth'])) {
				return $this->redirect('?admin=auth&mod=login&act=loginForm');
			}
		}
	}
	
?>