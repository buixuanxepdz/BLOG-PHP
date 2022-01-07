  <?php require_once("views/front-end/layouts/header.php"); ?>
<main>
        <!-- page-tile-area -->
        <div class="page-tile-area pb-100 pt-100 mb-120 grey-bg" style="background-image: url(publics/front-end/images/page-title.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 text-center">
                        <div class="page-title mb-15">
                            <h1 class="lora-font">Chi tiết bài viết</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- All-post -->
        <section class="post-area">
            <div class="container">
                <div class="post-items pb-60">
                    <div class="row">
                        <div class="col-xl-9">
                            <div class="post-wrapper sm-b-bottom pb-30 mb-60">
                                <div class="post-thumb mb-25">
                                    <a href="#"><img src="publics/posts/<?= $detail['thumbnail'] ?>" alt="Lifestyle"></a>
                                </div>
                                <div class="post-title latest-post-title">
                                    <div class="transparent-tag">
                                        <span><a href="#">- <?= $detail['categoryname'] ?> -</a></span>
                                    </div>
                                    <h4 class="lora-font"><a href="#"><?= $detail['title'] ?></a></h4>
                                    <span><?= $detail['username'] ?> - <?= date('d/m/Y', strtotime($detail['created_at'])) ?></span>
                                </div>
                                <div class="post-content lifestyle-article latest-post-articale">
                                    <p style="font-weight: bold;font-size: 20px;"><?= $detail['content'] ?></p>
                                    <p class="mb-85"><?= $detail['description'] ?></p>
                                    <div class="post-meta border-none p-0">
                                        <div class="left f-left">
                                            <a href="#"><span class="lnr lnr-eye"></span><?= $detail['view_count'] ?></a>
                                        </div>
                                        <div class="meta-link f-right m-0">
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="post-wrapper border-box mb-20">
                                <div class="row">
                                    <div class="col-xl-5 col-md-5">
                                        <div class="post-thumb">
                                            <a href="#"><img class="img-fluid" src="img/post/news/news91.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="col-xl-7 col-md-7">
                                        <div class="post-content box-padding news-content l-news">
                                            <div class="transparent-tag">
                                                <span><a href="#">- LIFESTYLE -</a></span>
                                            </div>
                                            <h3 class="lora-font margin-0"><a href="#">Lot’s of Things you should save in your multi-Business.</a></h3>
                                            <span class="xs-lineheight">Johny biaore - August 08, 2019</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.Lorem Ipsum is simply
                                                dummy text.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="post-wrapper border-box mb-60">
                                <div class="row">
                                    <div class="col-xl-5 col-md-5">
                                        <div class="post-thumb">
                                            <a href="#"><img class="img-fluid" src="img/post/news/news92.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="col-xl-7 col-md-7">
                                        <div class="post-content box-padding news-content l-news">
                                            <div class="transparent-tag">
                                                <span><a href="#">- LIFESTYLE -</a></span>
                                            </div>
                                            <h3 class="lora-font margin-0"><a href="#">Lot’s of Things you should save in your multi-Business.</a></h3>
                                            <span class="xs-lineheight">Johny biaore - August 08, 2019</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.Lorem Ipsum is simply
                                                dummy text.</p>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="sm-b-bottom mb-60">
                                <span class="comments-title">Comments</span>
                            </div>
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
