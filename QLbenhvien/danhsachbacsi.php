<?php 
    require_once('header-footer/header.php');
 ?>
 
      <div class="page-body">
        <div class="container-fluid">
          <div class="page-sidebar toggled sidebar">
            <nav class="sidebar-collapse d-none d-lg-block">
              <i class="ion show-on-collapsed"><img src="img/icon/glyphicons-224-chevron-right.png" style="width:10px;" alt=""></i>
              <i class="ion hide-on-collapsed"><img src="img/icon/glyphicons-225-chevron-left.png" style="width:10px;" alt=""></i>
            </nav>

            <ul class="nav nav-pills nav-stacked" id="sidebar-stacked">
              <li class="d-lg-none">
                <a href="#" class="sidebar-close"><i class="ion ion-ios-arrow-left"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="home.php"><i class="ion"><img src="img/icon/glyphicons-672-heartbeat.png" style="width:16px;" alt=""></i> <span class="nav-text">Giới thiệu</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-container dropdown-toggle" data-toggle="collapse" data-parent="#sidebar-stacked" href="#p2">
                  <i class="ion"><img src="img/icon/glyphicons-496-bed-alt.png" style="width:16px;" alt=""></i> <span class="nav-text">Nội trú</span>
                </a>
                <ul class="nav nav-pills nav-stacked collapse" id="p2">
                  <li class="nav-item"><a class="nav-link" href="nhapvien.php">+ Nhập viện</a></li>
                  <li class="nav-item"><a class="nav-link" href="danhsachnhapvien.php">+ Danh sách nhập viện</a></li>
                  <li class="nav-item"><a class="nav-link" href="danhsachxuatkhoa.php">+ Danh sách xuất khoa</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="vienphi.php"><i class="ion"><img src="img/icon/glyphicons-228-usd.png" style="width:12px;" alt=""></i> <span class="nav-text">Viện phí</span></a>
              </li>
                <li class="nav-item">
                <a class="nav-container dropdown-toggle" data-toggle="collapse" data-parent="#sidebar-stacked" href="#p8">
                  <i class="ion"><img src="img/icon/glyphicons-629-doctor.png" style="width:16px;" alt=""></i> <span class="nav-text">Quản lý thuốc</span>
                </a>
                <ul class="nav nav-pills nav-stacked collapse" id="p8">
                  <li class="nav-item"><a class="nav-link" href="danhsachthuoc.php">+ Danh sách thuốc</a></li>
                </ul>
                </li>
                <li class="nav-item active">
                <a class="nav-link" href="danhsachbacsi.php"><i class="ion"><img src="img/icon/glyphicons-595-stethoscope.png" style="width:16px;" alt=""></i> <span class="nav-text">Danh sách bác sĩ</span></a>
              </li>
            </ul>
          </div>


<?php 
  $conn = mysqli_connect('localhost','root','','benhnhannoitru');
  mysqli_set_charset($conn,'utf8');
  $query_show = mysqli_query($conn,"Select bs.id,bs.hoten,bs.gioitinh,bs.sdt,k.tenkhoa as 'khoa' ,cv.tenchucvu as 'chucvu' from khoa k join (bacsi bs join chucvu cv on bs.chucvu = cv.id ) on bs.khoa = k.id");
  $total = mysqli_num_rows($query_show); //Đếm tổng số dòng
  $limit = 5; //limit là số dòng muốn chia trong 1 trang
  $page = ceil($total/$limit); // tính số page chia được hàm ceil làm tròn lên

  //bắt lỗi điền dữ liệu thẳng vào thanh công cụ _GET vượt quá số page
  $get_page = isset($_GET['page']) ? $_GET['page'] : 1; 
  $curent_page = $get_page < 0 ? 1 : $get_page; // nhập _GET < 1
  $curent_page = $curent_page >$page ? $page : $curent_page; // nhập _GET lớn hớn số trang hiện có
  /*-----------------------------------------------------------------*/
  $start = ($curent_page - 1)*$limit; // tính số dòng bắt đầu dựa trên số trang page và limit
  $query_show = mysqli_query($conn,"Select bs.id,bs.hoten,bs.gioitinh,bs.sdt,k.tenkhoa as 'khoa' ,cv.tenchucvu as 'chucvu' from khoa k join (bacsi bs join chucvu cv on bs.chucvu = cv.id ) on bs.khoa = k.id order by id ASC limit $start,$limit");
  if (!empty($_POST['search'])) {
    $search = $_POST['search'];
    $query_show = mysqli_query($conn,"Select bs.id,bs.hoten,bs.gioitinh,bs.sdt,k.tenkhoa as 'khoa' ,cv.tenchucvu as 'chucvu' from khoa k join (bacsi bs join chucvu cv on bs.chucvu = cv.id ) on bs.khoa = k.id where bs.hoten like '%$search%' or k.tenkhoa like '%$search%' or cv.tenchucvu like '%$search%' ");
  }else{
    $query_show = mysqli_query($conn,"Select bs.id,bs.hoten,bs.gioitinh,bs.sdt,k.tenkhoa as 'khoa' ,cv.tenchucvu as 'chucvu' from khoa k join (bacsi bs join chucvu cv on bs.chucvu = cv.id ) on bs.khoa = k.id order by id ASC limit $start,$limit");
  }
 ?>

                <div class="page-content">
                      <div class="card card-default widget">
                        <div class="card-body">
                          <div class="row">
                            <div class="card card-default widget">
                              <div class="card-heading">
                                <h3 style="margin-left: -15px;">Danh sách bác sĩ</h3>
                              </div>
                              <form action="" method="POST" class="form-inline">
                              
                                <div class="form-group">
                                      <input  type="text" class="form-control" name="search" placeholder="Nhập thông tin..." style="margin-left: 10px;"> 
                                </div>

                                <button type="submit" class="btn btn-info" style="margin-left: 10px; height: 38px;">Tìm kiếm</button>
                              </form>
                            </div>
                          </div>
                      <div class="panel panel-default" style="margin-top: 20px;">
                      <!-- Table -->
                      <table class="table" border="0" cellspacing="1" cellpadding="1">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Họ tên</th>
                            <th>Giới tính</th>
                            <th>SDT</th>
                            <th>Chuyên khoa</th>
                            <th>Chức vụ</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($query_show as $show) : ?>
                          <tr>
                            <td><?php echo $show['id']; ?></td>
                            <td><?php echo $show['hoten']; ?></td>
                            <td><?php echo $show['gioitinh']; ?></td>
                            <td><?php echo $show['sdt']; ?></td>
                            <td><?php echo $show['khoa']; ?></td>
                            <td><?php echo $show['chucvu']; ?></td>
                            <td><a href="control/bacsi_info.php?id=<?php echo $show['id']; ?>" class="btn btn-sm btn-success bs_info" style="margin-top: -5px;" name="xemthongtin" id = "">Chi tiết</a></td>
                          </tr>
                        <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="text-right" style="padding: 0;">

<?php 
                        $lui = $curent_page <=1 ? 1 : $curent_page - 1;
                        $tien = $curent_page >= $page ? $page : $curent_page + 1;
                    
                       ?>
                      <ul class="pagination">
                        <li><a href="?page=<?php echo $lui; ?>">&laquo;</a></li>
                    
                        <?php for ($i=1; $i <= $page ; $i++) :
                          $active = $curent_page == $i ? 'class = "active"' : '';
                        ?>
                    
                        <li <?php echo $active; ?>><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php endfor; ?>
                    
                        <li><a href="?page=<?php echo $tien; ?>">&raquo;</a></li>
                      </ul>
                    </div>  
                  </div>
                </div>
<div class="modal fade show" id="modal_bs">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" style="width: 350px;">
          <div class="modal-header">  
            <h4 class="modal-title">Chi tiết bác sĩ</h4>
          </div>
            <div class="modal-body">
              <div class="col-md-12 text-center">
                <div class="text-center">
                  <img src="#" alt="" style="width: 40%; height: auto;" id="i_bs">
                  <h3>hoten</h3>
                  <p id="gt">Giới tính</p>
                  <p id="sdt">Số điện thoại</p>
                  <p id="khoa">Khoa</p>
                  <p id="cv">Chức vụ</p>
                </div>
              </div>
              <a href="danhsachbacsi.php" class="btn btn-danger" data-dismiss="modal" style="float: right;">Đóng</a>
            </div>
        </div>
    </div>
</div>



<?php 
  require_once('header-footer/footer.php');
 ?>

 <script>
      $(document).on('click','.bs_info',function(e){
        e.preventDefault(); // return false
        var href = $(this).attr('href');
         $.ajax({
          url: href,
          type:'GET',
          dataType: 'json',
          success:function(res){
            console.log(res);
            $('#modal_bs #i_bs').attr('src',res.anh);
            $('#modal_bs h3').html(res.hoten);
            $('#modal_bs #gt').html('Giới tính: '+res.gioitinh);
            $('#modal_bs #sdt').html('SDT: ' +res.sdt);
            $('#modal_bs #khoa').html('Khoa: ' +res.khoa);
            $('#modal_bs #cv').html('Chức vụ: ' +res.chucvu);
            $('#modal_bs').modal();
          }
        });
        
      });

    </script>