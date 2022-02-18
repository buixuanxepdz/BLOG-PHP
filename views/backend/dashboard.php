<?php 
    require_once('layouts/header.php');
?>
  <style>
    .clock {
    transform: translateX(-50%) translateY(-50%);
    color: red;
    font-size: 20px;
    font-family: 'Orbitron', sans-serif;
    background-color: white;
    letter-spacing: 7px;
    padding: 10px;
    border-radius: 10px;
    
}
  </style>
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Xin chào, <?= $_SESSION['auth']['name'] ?>
              </h3>
               <div id="MyClockDisplay" class="clock mt-3" onload="showTime()"></div>
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
              <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Biểu đồ</h4>
                   <div id="myfirstchart" style="height: 250px;"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-9 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="clearfix">
                      <h4 class="card-title float-left">Danh sách bài viết có lượt xem cao nhất</h4>
                    </div>
                    <table class="table table-striped table table-hover">
                      <thead>
                        <tr>
                          <th> STT </th>
                          <th> Tiêu đề bài viết </th>
                          <th> Ảnh </th>
                          <th> Lượt xem </th>
                          <th> Hành động </th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach($postDashboard as $key => $post) { ?>
                        <tr>
                          <td class="py-1">
                                <?= $key+1 ?>
                          </td>
                          <td class="py-1" style="font-size: 13px;">
                                <?= $post['title'] ?>
                          </td>
                          <td class="py-1">
                                 <img src="publics/posts/<?= $post['thumbnail'] ?>" alt="">
                          </td>
                          <td class="py-1 text-center">
                                <?= $post['view_count'] ?>
                          </td>
                          <td class="py-1 text-center">
                               <a target="blank" href="?admin=client&mod=home&act=detail&slug=<?= $post['slug'] ?>" class="btn btn-gradient-primary btn-sm"><i class="fa fa-eye"></i></a>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
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
    function showTime(){
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";
    
    if(h == 0){
        h = 12;
    }
    
    if(h > 12){
        h = h - 12;
        session = "PM";
    }
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    
    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;
    
    setTimeout(showTime, 1000);
    
}

showTime();
  </script>
<?php 
    require_once('layouts/footer.php');
?>