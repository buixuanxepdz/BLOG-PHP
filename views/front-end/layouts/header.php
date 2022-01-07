<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="publics/front-end/images/favicon.png">

  <!-- All CSS Here -->
    <link rel="stylesheet" href="publics/front-end/css/bootstrap.min.css">
    <link rel="stylesheet" href="publics/front-end/css/fontawesome.min.css">
    <link rel="stylesheet" href="publics/front-end/css/linearicons.css">
    <link rel="stylesheet" href="publics/front-end/css/slick.css">
    <link rel="stylesheet" href="publics/front-end/css/animate.min.css">
    <link rel="stylesheet" href="publics/front-end/css/owl.carousel.min.css">
    <link rel="stylesheet" href="publics/front-end/css/meanmenu.css">
    <link rel="stylesheet" href="publics/front-end/css/default.css">
    <link rel="stylesheet" href="publics/front-end/css/style.css">
    <link rel="stylesheet" href="publics/front-end/css/responsive.css">
    <title>Bùi Xuân Xếp</title>
</head>
<body>
     <!-- header-area -->
  <header>
    <div class="header-top-area">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start">
            <div class="header-info text-center text-md-left">
              <ul>
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Liên hệ</a></li>
              </ul>
            </div>
          </div>
          <div class="col-xl-6 col-md-6 text-center text-md-right justify-content-center justify-content-md-start">
            <div class="header-social">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-google-plus-g"></i></a>
              <a href="#"><i class="fab fa-linkedin-in"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="logo-area">
      <div class="container">
        <div class="row">
          <div class="col-xl-3 col-md-3 d-flex align-items-center justify-content-center justify-content-md-start">
            <div class="logo">
              <a href="/"><img src="publics/front-end/images/logo.png" class="img-fluid" alt="logo"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="menu-area">
      <div class="container">
        <div class="row">
          <div class="col-xl-10 col-lg-10">
            <div class="main-menu">
              <nav id="mobile-menu">
                <ul>
                    <li>
                        <a href="/">Trang chủ</a>
                    </li>
                <?php foreach($categories as $category){ ?>
                    <li><a href="?admin=client&mod=home&act=detailcategory&id=<?= $category['id']; ?>"><?= $category['name']; ?></a></li>
                <?php } ?>
                </ul>
              </nav>
            </div>
          </div>
          <div class="col-xl-2 col-lg-2 text-left text-lg-right">
            <div class="menu-icon">
              <a href="#" class="sm-margin" data-toggle="modal" data-target="#search-modal"><span class="lnr lnr-magnifier"></span></a>
              <a href="#" class="menu-tigger"><span class="lnr lnr-menu"></span></a>
            </div>
            <!-- Modal Search -->
            <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <form action="?admin=client&mod=home&act=search" method="POST">
                    <input type="text" name="keyword" placeholder="Search here...">
                    <button type="submit">
                      <i class="fa fa-search"></i>
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="mobile-menu"></div>
          </div>
        </div>
        <div class="offcanvas-menu">
          <span class="menu-close">
            <i class="fas fa-times"></i>
          </span>
          <ul>
            <?php foreach($categories as $category){ ?>
            <li><a href="#"><?= $category['name'] ?></a></li>
            <?php } ?>
          </ul>
          <div class="side-social">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-google-plus-g"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
        <div class="offcanvas-overly"></div>
      </div>
    </div>
  </header>