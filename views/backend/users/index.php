<?php 
    require_once('views/backend/layouts/header.php');
?>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Quản lý người dùng</h4>
                    <a class="btn btn-gradient-info btn-fw mb-4" data-toggle="modal" data-target="#createModal"><i class="fa fa-plus"></i> Tạo mới
                    </a>
                    <table class="table table-striped table table-hover data-table">
                      <thead>
                        <tr>
                          <th> STT </th>
                          <th> Tên người dùng </th>
                          <th> Email </th>
                          <th> Ảnh đại diện </th>
                          <th> Ngày tạo </th>
                          <th class="text-center"> Hành động </th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach($users as $key => $user) { ?>
                        <tr>
                          <td class="py-1">
                                <?= $key+1 ?>
                          </td>
                          <td class="py-1">
                                <?= $user['name'] ?>
                          </td>
                          <td class="py-1">
                                <?= $user['email'] ?>
                          </td>
                          <td class="py-1">
                                 <img src="publics/avatars/<?= $user['avatar'] ?>" alt="">
                          </td>
                          <td class="py-1">
                                <?= date("d/m/Y", strtotime($user['created_at'])) ?>
                          </td>
                          <td class="py-1 text-center">
                              <?php if($user['role'] == 0){ ?>
                                <a href="#" data-target="#deleteModal<?= $user['id']; ?>" data-toggle="modal" class="btn btn-gradient-danger btn-sm"><i class="fa fa-trash"></i></a>
                              <?php }else{ ?>
                               <button type="button" disabled class="btn btn-gradient-danger btn-sm"><i class="fa fa-trash"></i></button>
                              <?php } ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- Tạo mới người dùng -->
            <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tạo mới người dùng</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                  </div>
                   <form action="?admin=admin&mod=user&act=store" id="createForm" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <label for="name">Tên người dùng</label>
                        <input type="text" id="name" class="form-control" name="name">
                        <span class="error" style="color:red"></span>
                    </div>
                    <div class="modal-body">
                        <label for="password">Mật khẩu</label>
                        <input type="password" id="password" class="form-control" name="password">
                        <span class="error" style="color:red"></span>
                    </div>
                    <div class="modal-body">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control" name="email">
                        <span class="error" style="color:red"></span>
                    </div>
                     <div class="modal-body">
                        <label for="address">Địa chỉ</label>
                        <input type="text" id="address" class="form-control" name="address">
                        <span class="error" style="color:red"></span>
                    </div>
                     <div class="modal-body">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" id="phone" class="form-control" name="phone">
                        <span class="error" style="color:red"></span>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                      <button type="button" class="btn btn-primary" id="butsave">Tạo mới</button>
                    </div>
                   </form>
                </div>
              </div>
            </div>
            <!-- end-tạo mới người dùng -->
              <!-- xóa người dùng -->
             <?php foreach($users as $user) { ?>
            <div class="modal fade deletemodal" id="deleteModal<?= $user['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xóa người dùng</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Bạn chắc chắn muốn xóa ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" data-id="<?= $user['id'] ?>" class="btn btn-primary btndelete">Xóa</button>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
            <!-- end-xóa người dùng -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-md5/2.19.0/js/md5.min.js" integrity="sha512-8pbzenDolL1l5OPSsoURCx9TEdMFTaeFipASVrMYKhuYtly+k3tcsQYliOEKTmuB1t7yuzAiVo+yd7SJz+ijFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        /// xem chi tiet
        // $('.viewmodal').click(function(e){
        //   e.preventDefault();
        //   let id = $(this).attr('data-id');
        //   // console.log(id);
        //   $.ajax({
        //     url:"/?admin=admin&mod=category&act=detail&id=" +id,
        //     type: 'get',
        //     dataType: "JSON",
        //     success:(response) =>{
        //       if(response){
        //         $('#nameCategory').text(response.name);
        //         $('#detailModal').modal('show');
        //       }
        //     }
        //   })
        // })

        /// them moi
        $('#butsave').on('click', function(e) {
          e.preventDefault();
          var name = $('#name').val();
          var password = $('#password').val();
          // var password = md5(password);
          var email = $('#email').val();
          var address = $('#address').val();
          var phone = $('#phone').val();
            $.ajax({
              url: "/?admin=admin&mod=user&act=store",
              type: "POST",
              data: {
                name: name,
                password: password,
                email: email,	
                address: address,	
                phone: phone,	
              },
              success: function(data){	
                   location.reload();		
              },
			    });
        });
        $('.btndelete').on('click', function() {
           let id = $(this).attr('data-id');
          console.log(id);
          $.ajax({
            url:"/?admin=admin&mod=user&act=delete&id=" +id,
            type: 'POST',
            success:(response) =>{
                location.reload();
            }
          })
        });

      

      })
                <?php 
                  if(isset($_COOKIE['success'])){ ?>
                    toastr.success("<?php echo $_COOKIE['success']; ?>");
                <?php } ?>
                <?php 
                  if(isset($_COOKIE['error'])){ ?>
                    toastr.success("<?php echo $_COOKIE['error']; ?>");
                <?php } ?>
 </script>
<?php require_once('views/backend/layouts/footer.php');  ?>