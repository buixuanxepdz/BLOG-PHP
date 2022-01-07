<?php 
    require_once('models/Post.php');
    require_once('models/Category.php');
    require_once('controllers/BaseController.php');
    class HomeController extends BaseController{

        function __construct()
        {
            $this->post_model = new Post();
 	    	$this->category_model = new Category();
        }

        function index()
        {
            $categories = $this->category_model->all();
            $randPosts = $this->post_model->randPosts();
            $slides = $this->post_model->slides();
            $hots =  $this->post_model->hot();
            $this->view('views/front-end/home',[
                'slides' => $slides,
                'categories' => $categories,
                'randPosts' => $randPosts,
                'hots' => $hots
            ]);
        }

        function detail(){
            $slug = $_GET['slug'];
            $categories = $this->category_model->all();
            $detail = $this->post_model->detailPost($slug);
            $randPosts = $this->post_model->randPosts();
            $view = $this->post_model->viewCount($slug);
            $this->view('views/front-end/detail',[
                'detail' => $detail,
                'categories' => $categories,
                 'randPosts' => $randPosts,
            ]);

        }

        function detailcategory(){
            $id = $_GET['id'];
            $categories = $this->category_model->all();
            $postcategory = $this->post_model->postcategory($id);
            $randPosts = $this->post_model->randPosts();
            $newpost = $this->post_model->newpostincategory($id);
            $this->view('views/front-end/categorypost',[
                'categories' => $categories,
                 'randPosts' => $randPosts,
                 'postcategory' => $postcategory,
                 'newpost' => $newpost
            ]);
        }

        function search(){
            $keyword = $_POST['keyword'];
            $categories = $this->category_model->all();
            $randPosts = $this->post_model->randPosts();
            $searchs = $this->post_model->search($keyword);
             $this->view('views/front-end/search',[
                'categories' => $categories,
                 'randPosts' => $randPosts,
                 'searchs' => $searchs
            ]);
        }
    }


?>