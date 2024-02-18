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
              <li class="nav-item active">
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
                <li class="nav-item">
                <a class="nav-link" href="danhsachbacsi.php"><i class="ion"><img src="img/icon/glyphicons-595-stethoscope.png" style="width:16px;" alt=""></i> <span class="nav-text">Danh sách bác sĩ</span></a>
              </li>
            </ul>
          </div>


<?php 
  $conn = mysqli_connect('localhost','root','','benhnhannoitru');
  mysqli_set_charset($conn,'utf8');
  //Phòng
  $query_show_phong = mysqli_query($conn,"SELECT * FROM phong");
  $total_phong = mysqli_num_rows($query_show_phong); //Đếm tổng số dòng
  $limit_phong = 5; //limit là số dòng muốn chia trong 1 trang
  $page_phong = ceil($total_phong/$limit_phong); // tính số page chia được hàm ceil làm tròn lên

  //bắt lỗi điền dữ liệu thẳng vào thanh công cụ _GET vượt quá số page
  $get_page_phong = isset($_GET['page']) ? $_GET['page'] : 1; 
  $curent_page_phong = $get_page_phong < 0 ? 1 : $get_page_phong; // nhập _GET < 1
  $curent_page_phong = $curent_page_phong >$page_phong ? $page_phong : $curent_page_phong; // nhập _GET lớn hớn số trang hiện có
  /*-----------------------------------------------------------------*/
  $start_phong = ($curent_page_phong - 1)*$limit_phong; // tính số dòng bắt đầu dựa trên số trang page và limit
  $query_show_phong = mysqli_query($conn,"SELECT * FROM phong order by id ASC limit $start_phong,$limit_phong");
  //Dịch vụ
  $query_show = mysqli_query($conn,"SELECT dv.id,dv.tendichvu,dv.gia, k.tenkhoa as 'khoa' FROM dichvu dv JOIN khoa k on dv.khoa = k.id");
  $total = mysqli_num_rows($query_show); //Đếm tổng số dòng
  $limit = 5; //limit là số dòng muốn chia trong 1 trang
  $page = ceil($total/$limit); // tính số page chia được hàm ceil làm tròn lên

  //bắt lỗi điền dữ liệu thẳng vào thanh công cụ _GET vượt quá số page
  $get_page = isset($_GET['page']) ? $_GET['page'] : 1; 
  $curent_page = $get_page < 0 ? 1 : $get_page; // nhập _GET < 1
  $curent_page = $curent_page >$page ? $page : $curent_page; // nhập _GET lớn hớn số trang hiện có
  /*-----------------------------------------------------------------*/
  $start = ($curent_page - 1)*$limit; // tính số dòng bắt đầu dựa trên số trang page và limit
  $query_show = mysqli_query($conn,"SELECT dv.id,dv.tendichvu,dv.gia, k.tenkhoa as 'khoa' FROM dichvu dv JOIN khoa k on dv.khoa = k.id order by id ASC limit $start,$limit");
 ?>

                <div class="page-content">
                      <div class="card card-default widget">
                        <div class="card-body">
                          <!-- phòng -->
                          <div class="card card-default widget" style="margin-bottom: 0;">
                              <div class="card-heading" style="padding-bottom: 0;">
                                <h3 style="margin-left: -15px;">VIỆN PHÍ PHÒNG</h3>
                              </div>
                            </div>
                      <div class="panel panel-default" style="margin-top: 20px;">
                      <!-- Table -->
                      <table class="table" border="0" cellspacing="1" cellpadding="1">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Tên phòng</th>
                            <th>Mô tả</th>
                            <th>Giá VND</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($query_show_phong as $show_phong) : ?>
                          <tr>
                            <td><?php echo $show_phong['id']; ?></td>
                            <td><?php echo $show_phong['tenphong']; ?></td>
                            <td><?php echo $show_phong['mota']; ?></td>
                            <td><?php echo $show_phong['gia']; ?></td>
                          </tr>
                        <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="text-right" style="padding: 0;">

<?php 
                        $lui_phong = $curent_page_phong <=1 ? 1 : $curent_page_phong - 1;
                        $tien_phong = $curent_page_phong >= $page_phong ? $page_phong : $curent_page_phong + 1;
                    
                       ?>
                      <ul class="pagination">
                        <li><a href="?page=<?php echo $lui_phong; ?>">&laquo;</a></li>
                    
                        <?php for ($i=1; $i <= $page_phong ; $i++) :
                          $active_phong = $curent_page_phong == $i ? 'class = "active"' : '';
                        ?>
                    
                        <li <?php echo $active_phong; ?>><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php endfor; ?>
                    
                        <li><a href="?page=<?php echo $tien_phong; ?>">&raquo;</a></li>
                      </ul>
                    </div>
                          <!-- dichvu -->
                          <div class="card card-default widget" style="margin-bottom: 0;">
                              <div class="card-heading" style="padding-bottom: 0;">
                                <h3 style="margin-left: -15px;">VIỆN PHÍ DỊCH VỤ</h3>
                              </div>
                            </div>
                      <div class="panel panel-default" style="margin-top: 20px;">
                      <!-- Table -->
                      <table class="table" border="0" cellspacing="1" cellpadding="1">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Tên dịch vụ</th>
                            <th>Khoa</th>
                            <th>Giá VND</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($query_show as $show) : ?>
                          <tr>
                            <td><?php echo $show['id']; ?></td>
                            <td><?php echo $show['tendichvu']; ?></td>
                            <td><?php echo $show['khoa']; ?></td>
                            <td><?php echo $show['gia']; ?></td>
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

<?php 
  require_once('header-footer/footer.php');
 ?>