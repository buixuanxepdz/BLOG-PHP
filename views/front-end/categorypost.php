  <?php require_once("views/front-end/layouts/header.php"); ?>

<main>
        <!-- page-tile-area -->
        <div class="page-tile-area pb-100 pt-100 mb-120 grey-bg" style="background-image: url(publics/front-end/images/page-title.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 text-center">
                        <div class="page-title mb-15">
                            <h1 class="lora-font"></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="post-area">
            <div class="container">
                <div class="post-items pt-120 pb-60">
                    <div class="row">
                        <div class="col-lg-9 col-md-7">
                            <?php if($newpost){ ?>
                            <div class="post-wrapper b-bottom pb-30 mb-60">
                                <div class="post-title">
                                    <div class="transparent-tag">
                                        <span><a href="#">- <?= $newpost['categoryname'] ?> -</a></span>
                                    </div>
                                    <h4 class="lora-font"><a href="#"><?= $newpost['title'] ?></a></h4>
                                    <span><?= $newpost['username'] ?> - <?= date('d/m/Y', strtotime($newpost['created_at'])) ?></span>
                                </div>
                                <div class="post-thumb">
                                    <a href="#"><img src="publics/posts/<?= $newpost['thumbnail'] ?>" alt="Lifestyle"></a>
                                </div>
                                <div class="post-content lifestyle-article">
                                    <p><?= $newpost['content'] ?></p>
                                    <div class="post-meta border-none p-0">
                                        <a href="?admin=client&mod=home&act=detail&slug=<?= $newpost['slug'] ?>" class="btn transparent-btn f-left">Xem thêm</a>
                                        <div class="meta-link f-right">
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }else{ ?>
                               <h2 class="text-center">Chưa có bài viết nào</h2>
                            <?php } ?>
                             <?php if($postcategory){ ?>
                            <div class="row">
                                <?php foreach($postcategory as $value){ ?>
                                <div class="col-lg-4 col-md-12">
                                    <div class="post-wrapper mb-55">
                                        <div class="post-thumb mb-20">
                                            <a href="#"><img src="publics/posts/<?=  $value['thumbnail'] ?>" alt="Lifestyle"></a>
                                        </div>
                                        <div class="post-title lifestyle-single-post">
                                            <div class="transparent-tag">
                                                <span><a href="#">- <?=  $value['categoryname'] ?> -</a></span>
                                            </div>
                                            <h4 class="lora-font"><a href="#"><?=  $value['title'] ?></a></h4>
                                            <span><?= $value['username'] ?> - <?= date('d/m/Y', strtotime($value['created_at'])) ?></span>
                                        </div>
                                        <div class="post-content lifestyle-single-article">
                                            <p><?=  $value['content'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                               <?php } ?>
                            </div>
                             <?php }else{ ?>
                                chưa có bài viết nào
                            <?php } ?>
                        </div>
                        <!-- aside -->
                      <div class="col-xl-3">
                            <aside class="widget">
                                <div class="video-widget pb-30">
                                    <div class="widget-title pb-20">
                                        <h5 class="lora-font">Bài viết ngẫu nhiên</h5>
                                    </div>
                                    <?php foreach($randPosts as $randPost){ ?>
                                    <div class="video-post-wrapper d-flex align-items-center mt-30 mb-30">
                                        <div class="post-thumb thumb-img-width mr-20">
                                            <img style="width: 50px;height: 50px;" src="publics/posts/<?= $randPost['thumbnail'] ?>" alt="">
                                        </div>
                                        <div class="post-content video-content">
                                            <h6 class="lora-font"><a href="?admin=client&mod=home&act=detail&slug=<?= $randPost['slug']; ?>"><?= $randPost['title'] ?></a></h6>
                                            <span> <?= date('d/m/Y', strtotime($randPost['created_at'])) ?></span>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="catagories-widget mb-50">
                                    <div class="widget-title pb-20">
                                        <h5 class="lora-font">Danh mục</h5>
                                    </div>
                                    <div class="cat-items">
                                        <ul class="cat-list cat-hover-color mt-30">
                                            <?php foreach($categories as $category){ ?>
                                                <li><a href="?admin=client&mod=home&act=detailcategory&id=<?= $category['id']; ?>"><i class="lnr lnr-chevron-right"></i><?= $category['name']; ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="advertise-widget last-advertise mb-30">
                                    <a href="#"><img src="img/advertise/subscribe.jpg" class="img-fluid" alt=""></a>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       <div class="insta-post">
            <div class="insta-active owl-carousel owl-loaded owl-drag">
                
                
                
                
            <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-1850px, 0px, 0px); transition: all 0s ease 0s; width: 5550px;"><div class="owl-item cloned" style="width: 452.5px; margin-right: 10px;"><div class="single-insta-post">
                    <a href="#"><img src="publics/front-end/images/insta1.jpg" alt=""></a>
                </div></div><div class="owl-item cloned" style="width: 452.5px; margin-right: 10px;"><div class="single-insta-post">
                    <a href="#"><img src="publics/front-end/images/insta2.jpg" alt=""></a>
                </div></div><div class="owl-item cloned" style="width: 452.5px; margin-right: 10px;"><div class="single-insta-post">
                    <a href="#"><img src="publics/front-end/images/insta3.jpg" alt=""></a>
                </div></div><div class="owl-item cloned" style="width: 452.5px; margin-right: 10px;"><div class="single-insta-post">
                    <a href="#"><img src="publics/front-end/images/insta4.jpg" alt=""></a>
                </div></div><div class="owl-item active" style="width: 452.5px; margin-right: 10px;"><div class="single-insta-post">
                    <a href="#"><img src="publics/front-end/images/insta1.jpg" alt=""></a>
                </div></div><div class="owl-item active" style="width: 452.5px; margin-right: 10px;"><div class="single-insta-post">
                    <a href="#"><img src="publics/front-end/images/insta2.jpg" alt=""></a>
                </div></div><div class="owl-item active" style="width: 452.5px; margin-right: 10px;"><div class="single-insta-post">
                    <a href="#"><img src="publics/front-end/images/insta3.jpg" alt=""></a>
                </div></div><div class="owl-item active" style="width: 452.5px; margin-right: 10px;"><div class="single-insta-post">
                    <a href="#"><img src="publics/front-end/images/insta4.jpg" alt=""></a>
                </div></div><div class="owl-item cloned" style="width: 452.5px; margin-right: 10px;"><div class="single-insta-post">
                    <a href="#"><img src="publics/front-end/images/insta1.jpg" alt=""></a>
                </div></div><div class="owl-item cloned" style="width: 452.5px; margin-right: 10px;"><div class="single-insta-post">
                    <a href="#"><img src="publics/front-end/images/insta2.jpg" alt=""></a>
                </div></div><div class="owl-item cloned" style="width: 452.5px; margin-right: 10px;"><div class="single-insta-post">
                    <a href="#"><img src="publics/front-end/images/insta3.jpg" alt=""></a>
                </div></div><div class="owl-item cloned" style="width: 452.5px; margin-right: 10px;"><div class="single-insta-post">
                    <a href="#"><img src="publics/front-end/images/insta4.jpg" alt=""></a>
                </div></div></div></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots disabled"></div></div>
            <div class="container text-center pt-30 pb-30">
                <div class="insta-follow-title">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <span><a href="#">Theo dõi tôi trên instagram</a></span>
                </div>
            </div>
        </div>
    </main>
      <?php require_once("views/front-end/layouts/footer.php"); ?>
