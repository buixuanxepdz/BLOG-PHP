<?php 
    require_once('views/backend/layouts/header.php');
?>
 <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-sm-10 mb-3"><h1>Thông tin cá nhân</h1></div>
                        <div class="col-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-1"></div>
                            <div class="col-sm-3"><!--left col-->
                                <div class="text-center">
                                    <?php if($profile['avatar']){ ?>
                                        <img src="publics/avatars/<?= $profile['avatar'] ?>" class="avatar img-circle img-thumbnail" alt="avatar">
                                     <?php }else { ?>
                                        <img src="publics/avatars/user.png" class="avatar img-circle img-thumbnail" alt="image">
                                    <?php } ?>
                                    <form action="?admin=admin&mod=user&act=updateImage" method="POST" enctype="multipart/form-data">
                                       <input type="file" class="text-center center-block file-upload mt-3" name="avatar">
                                       <input type="hidden" value="<?= $profile['id'] ?>" class="text-center center-block file-upload mt-3" name="id">
                                        <button class="btn btn-sm btn-success mt-3" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>Cập nhật avatar</button>
                                    </form>
                                </div></hr><br>
                            </div><!--/col-3-->
                            <div class="col-sm-7">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" style="font-weight: bold;" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Thông tin cá nhân</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" style="font-weight: bold;" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Cập nhật thông tin</button>
                                    </li>
                                </ul>
                                
                            <div class="tab-content">
                                <div class="tab-pane show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <hr>
                                    <form class="form" action="##" method="post" id="registrationForm">
                                        <div class="form-group">     
                                            <div class="col-xs-6" style="width: 50%;">
                                                <label for="first_name"><h4>Họ tên</h4></label>
                                                <h3 class="text-danger"><?= $profile['name'] ?></h3>
                                            </div>
                                        </div>
                                        <div class="form-group" style="width: 50%;">
                                            <div class="col-xs-6">
                                                <label for="phone"><h4>Email</h4></label>
                                                <h3 class="text-danger"><?= $profile['email']; ?></h3>
                                            </div>
                                        </div>
                                        <div class="form-group" style="width: 50%;">
                                            <div class="col-xs-6">
                                                <label for="phone"><h4>Địa chỉ</h4></label>
                                                <?php if($profile['address']){ ?>
                                                    <h3 class="text-danger"><?= $profile['address']; ?></h3>
                                                <?php } else{ ?>
                                                     <h3 class="text-danger">Chưa cập nhật</h3>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-group" style="width: 50%;">
                                            <div class="col-xs-6">
                                                <label for="phone"><h4>Số điện thoại</h4></label>
                                                <?php if($profile['phone']){ ?>
                                                    <h3 class="text-danger"><?= $profile['phone']; ?></h3>
                                                <?php } else{ ?>
                                                     <h3 class="text-danger">Chưa cập nhật</h3>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </form>
                                
                                <hr>
                                
                                </div><!--/tab-pane-->
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <hr>
                                    <form class="form" action="?admin=admin&mod=user&act=update" method="POST" id="profileform">
                                        <div class="form-group">   
                                            <div class="col-xs-6">
                                                <label for="first_name"><h4>Họ tên</h4></label>
                                                <input type="text" value="<?= $profile['name']; ?>" class="form-control" name="name" id="name" placeholder="Họ tên" title="Họ và tên">
                                                <input type="hidden" value="<?= $profile['id']; ?>" class="form-control" name="id" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="last_name"><h4>Email</h4></label>
                                                <input type="email" value="<?= $profile['email']; ?>" class="form-control" name="email" id="email" placeholder="Email" title="Email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="last_name"><h4>Địa chỉ</h4></label>
                                                <input type="text" value="<?= $profile['address']; ?>" class="form-control" name="address" id="address" placeholder="Địa chỉ" title="Địa chỉ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="last_name"><h4>Số điện thoại</h4></label>
                                                <input type="number" value="<?= $profile['phone']; ?>" class="form-control" name="phone" id="phone" placeholder="Số điện thoại" title="Số điện thoại">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                               <button type="submit" class="btn btn-sm btn-success">Cập nhật</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                                </div><!--/tab-pane-->
                            </div><!--/tab-content-->

                            </div><!--/col-9-->
                            <div class="col-1"></div>
                  </div>
                </div>
              </div>
 </div>
 <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script>
     $(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
    });
    <?php 
      if(isset($_COOKIE['success'])){ ?>
        toastr.success("<?php echo $_COOKIE['success']; ?>");
    <?php } ?>
    <?php 
      if(isset($_COOKIE['error'])){ ?>
        toastr.error("<?php echo $_COOKIE['error']; ?>");
    <?php } ?>
});
 </script>
<?php 
    require_once('views/backend/layouts/footer.php');
?>
                                                      