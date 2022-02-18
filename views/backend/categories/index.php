<?php 
    require_once('views/backend/layouts/header.php');
?>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Quản lý danh mục</h4>
                    <a class="btn btn-gradient-info btn-fw mb-4" data-toggle="modal" data-target="#createModal"><i class="fa fa-plus"></i> Tạo mới
                    </a>
                    <table id="taBle" class="table table-striped table table-hover data-table">
                      <thead>
                        <tr>
                          <th> STT </th>
                          <th> Tên danh mục </th>
                          <th> Ngày tạo </th>
                          <th class="text-center"> Hành động </th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach($categories as $key => $category) { ?>
                        <tr class="col-category<?= $category['id'] ?>">
                          <td class="py-1">
                                <?= $key+1 ?>
                          </td>
                          <td class="py-1">
                                <?= $category['name'] ?>
                          </td>
                          <td class="py-1">
                                <?= date("d/m/Y", strtotime($category['created_at'])) ?>
                          </td>
                          <td class="py-1 text-center">
                                <a href="#" data-id="<?= $category['id']; ?>" class="btn btn-gradient-primary btn-sm viewmodal"><i class="fa fa-eye"></i></a>
                                <a href="#" data-target="#updateModal<?= $category['id']; ?>" data-toggle="modal" class="btn btn-gradient-success btn-sm">
                                  <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" data-target="#deleteModal<?= $category['id']; ?>" data-toggle="modal" class="btn btn-gradient-danger btn-sm"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- Tạo mới danh mục -->
            <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tạo mới danh mục</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                  </div>
                   <form action="" id="createForm" method="POST">
                    <div class="modal-body">
                        <label for="name">Tên danh mục</label>
                        <input type="text" id="name" class="form-control" name="name">
                        <span id="error" style="color:red"></span>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                      <button type="button" class="btn btn-primary" id="butsave">Tạo mới</button>
                    </div>
                   </form>
                </div>
              </div>
            </div>
            <!-- end-tạo mới danh mục -->
            <!-- Chỉnh sửa danh mục -->
            <?php foreach($categories as $category) { ?>
            <div class="modal fade" id="updateModal<?= $category['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa danh mục</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                  </div>
                   <form action="?admin=admin&mod=category&act=update&id=<?= $category['id'] ?>" id="updateFormCategory" method="POST">
                    <div class="modal-body">
                        <label for="name">Tên danh mục</label>
                        <input type="text" value="<?= $category['name'] ?>" class="form-control" name="name">
                        <input type="hidden" value="<?= $category['id'] ?>" class="form-control" name="id">
                        <span id="errorUpdate" style="color:red"></span>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                      <button type="submit" class="btn btn-success" id="butsaveUpdate">Cập nhật</button>
                    </div>
                   </form>
                </div>
              </div>
            </div>
            <?php } ?>
            <!-- end-chỉnh sửa danh mục -->
            <!-- Xem chi tiết danh mục -->
            <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title h3 text-primary" id="exampleModalLabel">Chi tiết danh mục</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                  </div>
                   <form action="">
                    <div class="modal-body">
                        <p class="h4">Tên danh mục : <span id="nameCategory" class="text-danger"></span></p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    </div>
                   </form>
                </div>
              </div>
            </div>
            <!-- end-Xem chi tiết danh mục -->
            <!-- xóa danh mục -->
             <?php foreach($categories as $category) { ?>
            <div class="modal fade deletemodal" id="deleteModal<?= $category['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xóa danh mục</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Bạn chắc chắn muốn xóa ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" data-id="<?= $category['id'] ?>" class="btn btn-primary btndelete">Xóa</button>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
            <!-- end-xóa danh mục -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        /// xem chi tiet
        $('.viewmodal').click(function(e){
          e.preventDefault();
          let id = $(this).attr('data-id');
          // console.log(id);
          $.ajax({
            url:"/?admin=admin&mod=category&act=detail&id=" +id,
            type: 'get',
            dataType: "JSON",
            success:(response) =>{
              if(response){
                $('#nameCategory').text(response.name);
                $('#detailModal').modal('show');
              }
            }
          })
        })

        /// them moi
        $('#butsave').on('click', function() {
          var name = $('#name').val();
          if(name!=""){
            $.ajax({
              url: "/?admin=admin&mod=category&act=store",
              type: "POST",
              data: {
                name: name		
              },
              success: function(data){	
                   location.reload();		
              }
			    });
          }
          else{
            $('#error').html('Vui lòng nhập tên !!!')
          }
        });
        $('.btndelete').on('click', function() {
           let id = $(this).attr('data-id');
          console.log(id);
          $.ajax({
            url:"/?admin=admin&mod=category&act=delete&id=" +id,
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
          toastr.error("<?php echo $_COOKIE['error']; ?>");
      <?php } ?>

 </script>
<?php require_once('views/backend/layouts/footer.php');  ?>