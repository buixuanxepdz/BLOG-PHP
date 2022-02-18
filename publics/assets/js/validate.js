$(document).ready(function(){
     $("#createuserForm").validate({
          rules: {
            "name": {
              required: true,
              minlength:3
            },
            "password": {
              required: true,
              minlength: 6
            },
            "email": {
              required: true,
            }
          },
          messages:{
            "name":{
              required: "Bắt buộc nhập tên",
              minlength: "Hãy nhập ít nhất 3 ký tự"
            },
            "password": {
              required: "Bắt buộc nhập mật khẩu",
              minlength: "Hãy nhập ít nhất 6 ký tự"
            },
            "email": {
              required: "Bắt buộc nhập email",
            }
          }
      });
     $("#profileform").validate({
          rules: {
            "name": {
              required: true,
              minlength:3
            },
            "email": {
              required: true,
            }
          },
          messages:{
            "name":{
              required: "Bắt buộc nhập tên",
              minlength: "Hãy nhập ít nhất 3 ký tự"
            },
            "email": {
              required: "Bắt buộc nhập email",
            }
          }
      });
     $("#updateFormCategory").validate({
          rules: {
            "name": {
              required: true,
              minlength:3
            }
          },
          messages:{
            "name":{
              required: "Bắt buộc nhập tên danh mục",
              minlength: "Hãy nhập ít nhất 3 ký tự"
            }
          }
      });

      $("#createFormPost").validate({
          rules: {
            "title": {
              required: true,
              minlength:3
            },
            "content": {
              required: true,
              minlength: 3
            },
            "description": {
              required: true,
              minlength: 3
            }
            ,
            "thumbnail": {
              required: true,
            }
          },
          messages:{
            "title":{
              required: "Bắt buộc nhập tiêu đề bài viết",
              minlength: "Hãy nhập ít nhất 3 ký tự"
            },
            "content": {
              required: "Bắt buộc nhập nội dung bài viết",
              minlength: "Hãy nhập ít nhất 3 ký tự"
            },
            "description": {
              required: "Bắt buộc nhập email",
               minlength: "Hãy nhập ít nhất 3 ký tự"
            }
            ,
            "thumbnail": {
              required: "Vui lòng chọn ảnh",
            }
          }
      });
      $("#createFormPost").validate({
          rules: {
            "title": {
              required: true,
              minlength:3
            },
            "content": {
              required: true,
              minlength: 3
            },
            "description": {
              required: true,
              minlength: 3
            }
            ,
            "thumbnail": {
              required: true,
            }
          },
          messages:{
            "title":{
              required: "Bắt buộc nhập tiêu đề bài viết",
              minlength: "Hãy nhập ít nhất 3 ký tự"
            },
            "content": {
              required: "Bắt buộc nhập nội dung bài viết",
              minlength: "Hãy nhập ít nhất 3 ký tự"
            },
            "description": {
              required: "Bắt buộc nhập mô tả",
               minlength: "Hãy nhập ít nhất 3 ký tự"
            }
            ,
            "thumbnail": {
              required: "Vui lòng chọn ảnh",
            }
          }
      });
      $("#updateFormPost").validate({
          rules: {
            "title": {
              required: true,
              minlength:3
            },
            "content": {
              required: true,
              minlength: 3
            },
            "description": {
              required: true,
              minlength: 3
            }
            ,
            "thumbnail": {
              required: true,
            }
          },
          messages:{
            "title":{
              required: "Bắt buộc nhập tiêu đề bài viết",
              minlength: "Hãy nhập ít nhất 3 ký tự"
            },
            "content": {
              required: "Bắt buộc nhập nội dung bài viết",
              minlength: "Hãy nhập ít nhất 3 ký tự"
            },
            "description": {
              required: "Bắt buộc nhập mô tả",
               minlength: "Hãy nhập ít nhất 3 ký tự"
            }
            ,
            "thumbnail": {
              required: "Vui lòng chọn ảnh",
            }
          }
      });

})
function previewImages()
{
    var preview = document.querySelector('.gallery');

    if(this.files)
    {
        [].forEach.call(this.files, readAndPreview);
    }

    function readAndPreview(file)
    {
        if (!/\.(jpe?g|png|gif)$/i.test(file.name))
        {
            alert(file.name + " không phải ảnh");
            return false
        }

        var reader = new FileReader();

        reader.addEventListener("load", function() {
          var image = new Image();
          image.width = 150;
          image.height = 150;
          image.title  = file.name;
          image.src    = this.result;

          preview.appendChild(image);
        });

        reader.readAsDataURL(file);

    }
}

document.querySelector('#thumbnail').addEventListener("change", previewImages);
