  <?php require_once("views/front-end/layouts/header.php"); ?>
<main>
    <!-- slider-area -->
    <section class="slider-area pb-80">
    <div class="container">
        <div class="slider-active">
            <?php foreach($slides as $slide){ ?>
            <div class="single-slider" style="background-image: url('publics/posts/<?= $slide['thumbnail']; ?>')">
                <div class="slider-content pl-50 pr-50">
                <div class="slider-title">
                    <a data-animation="fadeInUp" data-delay=".2s" href="#" class="tag"><?= $slide['categoryname']; ?></a>
                    <h1 style="font-size: 22px;" data-animation="fadeInUp" data-delay=".4s">Simple Lifestyle</h1>
                </div>
                <div class="slider-text" data-animation="fadeInUp" data-delay=".6s">
                    <span class="pr-15">đăng bởi <?= $slide['username'] ?></span>
                    <span><?= date('d/m/Y', strtotime($slide['created_at'])) ?></span>
                    <p style="font-size: 12px;"><?= $slide['content'] ?></p>
                </div>
                <div class="slider-btn" data-animation="fadeInUp" data-delay=".8s">
                    <a href="?admin=client&mod=home&act=detail&slug=<?= $slide['slug']; ?>" class="btn">Xem thêm</a>
                </div>
                </div>
            </div>
            <?php } ?>
        </div>
      </div>
    </section>
    <!-- travel area -->
    <section class="travel-area pb-90">
      <div class="container">
        <div class="row">
          <div class="col-xl-12 pb-70">
            <div class="section-title">
              <div class="title">
                <h2>Bài viết ngẫu nhiên</h2>
              </div>
              <div class="more">
                <a href="#">Xem thêm<i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
            <?php foreach($randPosts as $randPost){ ?>
                <div class="col-xl-3 col-md-6 mb-30">
                    <div class="post-wrapeer">
                    <div class="card">
                        <div class="post-thumb position-a">
                        <img style="height: 250px;" src="publics/posts/<?= $randPost['thumbnail']; ?>" class="card-img-top" alt="travel">
                        <a href="#" class="tag tag-red"><?= $randPost['categoryname'] ?></a>
                        </div>
                        <div class="post-content travel-post">
                        <div class="card-body paddingXY">
                            <h4><a href="#"><?= $randPost['title'] ?></a></h4>
                            <div class="author-info d-flex align-items-center">
                             <?php if($randPost['avatar']){ ?>   
                                <img style="border-radius: 50%;height: 50px;" src="publics/avatars/<?= $randPost['avatar'] ?>" class="author-width" alt="author">
                            <?php } else{ ?>
                                 <img style="border-radius: 50%;height: 50px;" src="publics/avatars/user.png" class="author-width" alt="author">
                            <?php } ?>
                            <div class="author-name">
                                <h5><?= $randPost['username'] ?></h5>
                                <span><?= date('d/m/Y', strtotime($randPost['created_at'])) ?></span>
                            </div>
                            </div>
                        </div>
                        <div class="post-meta">
                            <div class="left f-left">
                            <a href="#"><span class="lnr lnr-eye"></span><?= $randPost['view_count'] ?></a>
                            </div>
                            <div class="right f-right">
                            <a href="#"><span class="lnr lnr-bookmark"></span></a>
                            <a href="#"><span class="fas fa-share-alt"></span></a>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            <?php } ?>
        </div>
      </div>
    </section>
    <!-- latest-news area -->
    <section class="latest-news white-bg pt-110 pb-70">
      <div class="container">
        <div class="row">
          <div class="col-xl-12 mb-30">
            <div class="section-title mb-70">
              <div class="title white-bg">
                <h2>Bài viết nổi bật</h2>
              </div>
            </div>
            <div class="row">
                <?php foreach($hots as $hot){ ?>
                    <div class="col-xl-6 col-lg-6 mb-20">
                        <div class="post-wrapeer ">
                        <div class="post-box">
                            <div class="post-thumb f-left thumb-width">
                            <img src="publics/posts/<?= $hot['thumbnail'] ?>" class="img-fluid" alt="latest">
                            </div>
                            <div class="post-content fix">
                            <h3><a href="#"><?= $hot['title'] ?></a></h3>
                            <span class="pr-20">bởi <?= $hot['username']; ?></span>
                            <span class="pr-20"><?= date('d/m/Y', strtotime($hot['created_at'])) ?></span>
                            <span class="lnr lnr-eye"><?= $hot['view_count'] ?></span>
                            </div>
                        </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php require_once("views/front-end/layouts/footer.php"); ?>