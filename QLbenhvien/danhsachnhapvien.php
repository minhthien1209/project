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
              <li class="nav-item active">
                <a class="nav-container dropdown-toggle" data-toggle="collapse" data-parent="#sidebar-stacked" href="#p2">
                  <i class="ion"><img src="img/icon/glyphicons-496-bed-alt.png" style="width:16px;" alt=""></i> <span class="nav-text">Nội trú</span>
                </a>
                <ul class="nav nav-pills nav-stacked" id="p2">
                  <li class="nav-item"><a class="nav-link" href="nhapvien.php">+ Nhập viện</a></li>
                  <li class="nav-item active"><a class="nav-link" href="danhsachnhapvien.php">+ Danh sách nhập viện</a></li>
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
                  <li class="nav-item"><a class="nav-link" href="chart-morris.php">+ Danh sách thuốc</a></li>
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
  $query_show = mysqli_query($conn,"Select bn.id,bn.ngaynhapvien,bn.hoten,bn.gioitinh,bn.ngaysinh,bn.diachi,bn.sdt,bn.quoctich,bn.dantoc,bn.socmnd,bn.sothebhyt,bn.chinhsach,nh.hoten as'nguoinha' from benhnhan bn join nguoinha nh on bn.nguoinha = nh.id");
  $total = mysqli_num_rows($query_show); //Đếm tổng số dòng
  $limit = 5; //limit là số dòng muốn chia trong 1 trang
  $page = ceil($total/$limit); // tính số page chia được hàm ceil làm tròn lên

  //bắt lỗi điền dữ liệu thẳng vào thanh công cụ _GET vượt quá số page
  $get_page = isset($_GET['page']) ? $_GET['page'] : 1; 
  $curent_page = $get_page < 0 ? 1 : $get_page; // nhập _GET < 1
  $curent_page = $curent_page >$page ? $page : $curent_page; // nhập _GET lớn hớn số trang hiện có
  /*-----------------------------------------------------------------*/
  $start = ($curent_page - 1)*$limit; // tính số dòng bắt đầu dựa trên số trang page và limit
  $query_show = mysqli_query($conn,"Select bn.id,bn.ngaynhapvien,bn.hoten,bn.gioitinh,bn.ngaysinh,bn.diachi,bn.sdt,bn.quoctich,bn.dantoc,bn.socmnd,bn.sothebhyt,bn.chinhsach,nh.hoten as'nguoinha' from benhnhan bn join nguoinha nh on bn.nguoinha = nh.id order by id ASC limit $start,$limit");
  if (!empty($_POST['search'])) {
    $search = $_POST['search'];
    $query_show = mysqli_query($conn,"Select bn.id,bn.ngaynhapvien,bn.hoten,bn.gioitinh,bn.ngaysinh,bn.diachi,bn.sdt,bn.quoctich,bn.dantoc,bn.socmnd,bn.sothebhyt,bn.chinhsach,nh.hoten as'nguoinha' from benhnhan bn join nguoinha nh on bn.nguoinha = nh.id where bn.hoten like '%$search%' or nh.hoten like '%$search%' or bn.ngaynhapvien like '%$search%' ");
  }else{
    $query_show = mysqli_query($conn,"Select bn.id,bn.ngaynhapvien,bn.hoten,bn.gioitinh,bn.ngaysinh,bn.diachi,bn.sdt,bn.quoctich,bn.dantoc,bn.socmnd,bn.sothebhyt,bn.chinhsach,nh.hoten as'nguoinha' from benhnhan bn join nguoinha nh on bn.nguoinha = nh.id order by id ASC limit $start,$limit");
  }
 ?>
          <div class="page-content">
                  <div class="card card-default widget" style="height: 95%">
                    <div class="card-heading">
                      <h3 style="padding: 10px 0 0 10px;">Danh sách bệnh nhân nhập viện</h3>
                    </div>
                    <div class="card-body"  >
                        <form action="" method="POST" class="form-inline">
                              
                                <div class="form-group">
                                      <input type="text" class="form-control" name="search" placeholder="Nhập thông tin..." style="margin-left: 10px;"> 
                                </div>

                                <button type="submit" class="btn btn-info" style="margin-left: 10px; height: 38px;">Tìm kiếm</button>
                              </form>


                              <div class="panel panel-default" style="margin-top: 20px;">
                      <!-- Table -->
                      <table class="table" border="0" cellspacing="1" cellpadding="1">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Nhập viện</th>
                            <th>Họ tên</th>
                            <th>Giới tính</th>
                            <th>Ngày sinh</th>
                            <th>Địa chỉ</th>
                            <th>SDT</th>
                            <th>Quốc tịch</th>
                            <th>Dân tộc</th>
                            <th>CMND</th>
                            <th>BHYT</th>
                            <th>Chính sách</th>
                            <th>Người nhà</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($query_show as $show) : ?>
                          <tr>
                            <td><?php echo $show['id']; ?></td>
                            <td><?php echo $show['ngaynhapvien']; ?></td>
                            <td><?php echo $show['hoten']; ?></td>
                            <td><?php echo $show['gioitinh']; ?></td>
                            <td><?php echo $show['ngaysinh']; ?></td>
                            <td><?php echo $show['diachi']; ?></td>
                            <td><?php echo $show['sdt']; ?></td>
                            <td><?php echo $show['quoctich']; ?></td>
                            <td><?php echo $show['dantoc']; ?></td>
                            <td><?php echo $show['socmnd']; ?></td>
                            <td><?php echo $show['sothebhyt']; ?></td>
                            <td><?php echo $show['chinhsach']; ?></td>
                            <td><?php echo $show['nguoinha']; ?></td>
                            <td style="padding: 20px 0 0 0;">
                              <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown btn btn-success" style="width: 90px;">
                                  <a style="color: #fff; text-decoration: none; margin-left: -20px;" href="#" class="dropdown-toggle" data-toggle="dropdown">Thao tác<b class="caret"></b></a>
                                  <ul class="dropdown-menu">
                                    <li><a href="benhan.php?id=<?php echo $show['id']; ?>" class="btn btn-primary" style="width: 90%;margin-left: 5%; margin-bottom: 5px; margin-top: -2px;">Dịch vụ</a></li>
                                    <li><a href="thuoctheobenhnhan.php?id=<?php echo $show['id']; ?>" class="btn btn-info" style="width: 90%;margin-left: 5%; margin-bottom: 5px;">Thuốc</a></li>
                                    <li><a href="xuatkhoa.php?id=<?php echo $show['id']; ?>" class="btn btn-warning" style="width: 90%;margin-left: 5%; margin-bottom: 5px;">Xuất khoa</a></li>
                                    <li><a href="chinhsuathongtinbenhnhan.php?id=<?php echo $show['id']; ?>" class="btn btn-secondary" style="width: 90%;margin-left: 5%; margin-bottom: 5px;">Sửa</a></li>
                                    <li><a href="control/delete_benhnhan.php?id=<?php echo $show['id']; ?>" class="btn btn-danger" style="width: 90%;margin-left: 5%; margin-bottom: 5px;" onclick = "return confirm('Bạn chắc chắn muốn xóa bệnh nhân?')">Xóa</a></li>
                                  </ul>
                                </li>
                              </ul>
                            </td> 
                          </tr>
                        <?php endforeach; ?>

                        </tbody>
                      </table>
                    </div>
                     <!-- phân trang -->                    
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
