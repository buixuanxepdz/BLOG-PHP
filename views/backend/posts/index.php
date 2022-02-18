<?php 
    require_once('views/backend/layouts/header.php');
?>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Quản lý bài viết</h4>
                    <a class="btn btn-gradient-info btn-fw mb-4" data-toggle="modal" data-target="#createModal"><i class="fa fa-plus"></i> Tạo mới
                    </a>
                    <table class="table table-striped table table-hover data-table">
                      <thead>
                        <tr>
                          <th> STT </th>
                          <th> Tiêu đề </th>
                          <th> Ảnh </th>
                          <th> Danh mục </th>
                          <th> Người tạo </th>
                          <th> Ngày tạo </th>
                          <th class="text-center"> Hành động </th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach($posts as $key => $post) { ?>
                        <tr>
                          <td class="py-1">
                                <?= $key+1 ?>
                          </td>
                          <td class="py-1" style="font-size: 12px;">
                                <?= $post['title'] ?>
                          </td>
                          <td class="py-1">
                                <img src="publics/posts/<?= $post['thumbnail'] ?>" alt="">
                          </td>
                          <td class="py-1">
                              <?php if(isset($post['name'])){ ?>
                                <?= $post['name'] ?>
                              <?php }else { ?>
                                không có
                              <?php } ?>

                          </td>
                          <td class="py-1">
                              <?php if(isset($post['username'])){ ?>
                                <?= $post['username'] ?>
                              <?php }else { ?>
                                không có
                              <?php } ?>

                          </td>
                          <td class="py-1">
                                <?= date("d/m/Y", strtotime($post['created_at'])) ?>
                          </td>
                          <td class="py-1 text-center">
                                 <a target="blank" href="?admin=client&mod=home&act=detail&slug=<?= $post['slug'] ?>" class="btn btn-gradient-primary btn-sm viewmodal"><i class="fa fa-eye"></i></a>
                                <a href="#" data-id="<?= $post['id'] ?>" class="getid btn btn-gradient-success btn-sm" data-toggle="modal" data-target="#updateModal<?= $post['id'] ?>"><i class="fa fa-edit"></i></a>
                                <a href="#" data-target="#deleteModal<?= $post['id']; ?>" data-toggle="modal" class="btn btn-gradient-danger btn-sm"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- Tạo mới bài viết -->
            <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tạo mới bài viết</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                  </div>
                   <form action="?admin=admin&mod=post&act=store" id="createFormPost" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <label for="title">Tiêu đề</label>
                        <input type="text" id="title" onkeyup="ChangeToSlug();" class="form-control" name="title">
                        <input type="hidden" class="form-control" name="user_id" value="<?= $_SESSION['auth']['id'] ?>">
                    </div>
                    <div class="modal-body">
                        <label for="slug">Slug</label>
                        <input type="text" id="slug" class="form-control" name="slug">
                    </div>
                    <div class="modal-body">
                        <label for="content">Nội dung</label>
                        <input type="text" id="content" class="form-control" name="content">
                    </div>
                    <div class="modal-body">
                        <label for="description">Mô tả</label>
                        <input type="text" id="description" class="form-control" name="description">
                    </div>
                    <div class="modal-body">
                        <label for="thumbnail">Ảnh</label>
                        <input type="file" id="thumbnail" class="form-control" name="thumbnail">
                        <div class="gallery mt-2" style="display: flex; flex-wrap: wrap;"></div>
                    </div>
                    <div class="modal-body">
                        <label for="category">Danh mục</label>
                        <select name="category_id" id="category" class="form-control">
                          <?php foreach($categories as $value) { ?>
                            <option value="<?= $value['id'] ?>" class="form-control"><?= $value['name'] ?></option>
                          <?php } ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                      <button type="submit" class="btn btn-primary" id="butsave">Tạo mới</button>
                    </div>
                   </form>
                </div>
              </div>
            </div>
            <!-- end-tạo mới bài viết -->
            <!-- Chỉnh sửa bài viết -->
            <?php foreach($posts as $post){ ?>
            <div class="modal fade" id="updateModal<?= $post['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa bài viết</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                  </div>
                   <form action="?admin=admin&mod=post&act=update" class="formSlug" id="updateFormPost" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <label for="title">Tiêu đề</label>
                        <input type="text" value="<?= $post['title'] ?>" onkeyup="ChangeToSlugUpdate();" class="form-control title" name="title">
                        <input type="hidden" value="<?= $_SESSION['auth']['id'] ?>" name="user_id">
                        <input type="hidden" value="<?= $post['id'] ?>" name="id">
                    </div>
                    <div class="modal-body">
                        <label for="slug">Slug</label>
                        <input type="text" disabled value="<?= $post['slug'] ?>" class="form-control slug" name="slug">
                    </div>
                    <div class="modal-body">
                        <label for="content">Nội dung</label>
                        <input type="text" id="content" value="<?= $post['content'] ?>" class="form-control" name="content">
                    </div>
                    <div class="modal-body">
                        <label for="description">Mô tả</label>
                        <input type="text" id="description" value="<?= $post['description'] ?>" class="form-control" name="description">
                    </div>
                    <div class="modal-body">
                        <label for="thumbnail">Ảnh</label>
                        <input type="file" id="thumbnail" class="form-control" value="<?= $post['thumbnail'] ?>" name="thumbnail">
                    </div>
                    <div class="modal-body">
                        <label for="category">Danh mục</label>
                        <select name="category_id" id="category" class="form-control">
                          <?php foreach($categories as $value) { ?>
                            <option value="<?= $value['id'] ?>" <?php if($post['category_id'] == $value['id']){ echo 'selected';} ?> class="form-control"><?= $value['name'] ?></option>
                          <?php } ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                      <button type="submit" class="btn btn-primary" id="butsave">Cập nhật</button>
                    </div>
                   </form>
                </div>
              </div>
            </div>
            <?php } ?>
            <!-- end-Chỉnh sửa bài viết -->
            <!-- xóa danh mục -->
             <?php foreach($posts as $post) { ?>
              <div class="modal fade deletemodal" id="deleteModal<?= $post['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Xóa bài viết</h5>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Bạn chắc chắn muốn xóa ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                      <button type="button" data-id="<?= $post['id'] ?>" class="btn btn-primary btndelete">Xóa</button>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
            <!-- end-xóa danh mục -->
             <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title h3 text-primary" id="exampleModalLabel">Chi tiết danh mục</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                  </div>
                   <form action="">
                    <div class="modal-body">
                        <p class="h4">Tiêu đề bài viết : <span id="nameCategory" class="text-danger"></span></p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    </div>
                   </form>
                </div>
              </div>
            </div>
             <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script>
              // $(document).ready(function(){
              //   $('.viewmodal').click(function(e){
              //     e.preventDefault();
              //     let id = $(this).attr('data-id');
              //     // console.log(id);
              //     $.ajax({
              //       url:"/?admin=admin&mod=post&act=detail&id=" +id,
              //       type: 'get',
              //       dataType: "JSON",
              //       success:(response) =>{
              //         if(response){
              //            $('#nameCategory').text(response.title);
              //           $('#detailModal').modal('show');
              //         }
              //       }
              //     })
              //   })
              // })
              function ChangeToSlug()
              {
                  var title, slug;
  
                  //Lấy text từ thẻ input title 
                  title = document.getElementById("title").value;
  
                  //Đổi chữ hoa thành chữ thường
                  slug = title.toLowerCase();
  
                  //Đổi ký tự có dấu thành không dấu
                  slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                  slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                  slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                  slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                  slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                  slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                  slug = slug.replace(/đ/gi, 'd');
                  //Xóa các ký tự đặt biệt
                  slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                  //Đổi khoảng trắng thành ký tự gạch ngang
                  slug = slug.replace(/ /gi, "-");
                  //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                  //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                  slug = slug.replace(/\-\-\-\-\-/gi, '-');
                  slug = slug.replace(/\-\-\-\-/gi, '-');
                  slug = slug.replace(/\-\-\-/gi, '-');
                  slug = slug.replace(/\-\-/gi, '-');
                  //Xóa các ký tự gạch ngang ở đầu và cuối
                  slug = '@' + slug + '@';
                  slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                  //In slug ra textbox có id “slug”
                  document.getElementById('slug').value = slug;
              }
             
              function ChangeToSlugUpdate()
              {
                  var title, slug, formUpdate;
                  formUpdate = document.getElementsByClassName('formSlug');
                  for (let i = 0; i < formUpdate.length; i++) {
                    //Lấy text từ thẻ input title 
                    title = document.getElementsByClassName("title")[i].value;
                    //Đổi chữ hoa thành chữ thường
                    slug = title.toLowerCase();
    
                    //Đổi ký tự có dấu thành không dấu
                    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                    slug = slug.replace(/đ/gi, 'd');
                    //Xóa các ký tự đặt biệt
                    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                    //Đổi khoảng trắng thành ký tự gạch ngang
                    slug = slug.replace(/ /gi, "-");
                    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                    slug = slug.replace(/\-\-\-\-\-/gi, '-');
                    slug = slug.replace(/\-\-\-\-/gi, '-');
                    slug = slug.replace(/\-\-\-/gi, '-');
                    slug = slug.replace(/\-\-/gi, '-');
                    //Xóa các ký tự gạch ngang ở đầu và cuối
                    slug = '@' + slug + '@';
                    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                    //In slug ra textbox có id “slug”
                    document.getElementsByClassName('slug')[i].value = slug;
                    
                  }
                 
              }
              $(document).ready(function(){
                $('.btndelete').on('click', function() {
                  let id = $(this).attr('data-id');
                  console.log(id);
                  $.ajax({
                    url:"/?admin=admin&mod=post&act=delete&id=" +id,
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