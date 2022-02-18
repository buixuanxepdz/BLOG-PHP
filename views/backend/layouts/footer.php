      </div>
     <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates </a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
  </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    
    <script src="publics/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="publics/assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:jpublics/s -->
    <script src="publics/assets/js/off-canvas.js"></script>
    <script src="publics/assets/js/hoverable-collapse.js"></script>
    <script src="publics/assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="publics/assets/js/dashboard.js"></script>
    <script src="publics/assets/js/todolist.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script src="publics/assets/js/validate.js"></script>
    <script type="text/javascript">

  $(document).ready( function () {
    $('.data-table').DataTable();
    
  } );
  $('.data-table').DataTable({
 
    language: {
        processing: "Message khi đang tải dữ liệu",
        search: "Tìm kiếm",
        lengthMenu: "Hiển thị _MENU_ ",
        info: "Bản ghi từ _START_ đến _END_",
        loadingRecords: "",
        infoEmpty:"Không có dữ liệu",
        zeroRecords: "Không có dữ liệu",
        emptyTable: "Không có dữ liệu",
        paginate: {
            first: "Trang đầu",
            previous: "Trang trước",
            next: "Trang sau",
            last: "Trang cuối",
        },
        aria: {
            sortAscending: ": Message khi đang sắp xếp theo column",
            sortDescending: ": Message khi đang sắp xếp theo column",
        }
    },
  });
</script>
    <!-- End custom js for this page -->
  </body>
</html>