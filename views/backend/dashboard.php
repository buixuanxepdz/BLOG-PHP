<?php 
    require_once('layouts/header.php');
?>
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Trang chủ
              </h3>
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="publics/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h3 class="font-weight-normal mb-3">Bài viết<i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h3>
                    <h1 class="mb-5"><?= count($posts); ?></h1>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="publics/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h3 class="font-weight-normal mb-3">Danh mục<i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h3>
                    <h1 class="mb-5"><?= count($categories); ?></h1>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="publics/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h3 class="font-weight-normal mb-3">Người dùng<i class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h3>
                    <h1 class="mb-5"><?= count($users); ?></h1>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="clearfix">
                      <h4 class="card-title float-left">Visit And Sales Statistics</h4>
                      <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                    </div>
                    <canvas id="visit-sale-chart" class="mt-4"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Biểu đồ</h4>
                   <div id="myfirstchart" style="height: 250px;"></div>
                  </div>
                </div>
              </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <script>
   var colorDanger = "#FF1744";
    Morris.Donut({
      element: 'myfirstchart',
      resize: true,
      colors: [
        '#E0F7FA',
        '#eef11a',
        '#80DEEA',
        
      ],
      //labelColor:"#cccccc", // text color
      //backgroundColor: '#333333', // border color
      data: [
        {label:"Bài viết", value:<?= count($posts); ?>, color:colorDanger},
        {label:"Danh mục", value:<?= count($categories); ?>},
        {label:"Người dùng", value:<?= count($users); ?>},
      ]
    });

  </script>
<?php 
    require_once('layouts/footer.php');
?>