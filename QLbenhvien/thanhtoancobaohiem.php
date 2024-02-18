<?php 
    require_once('header-footer/header.php');
 ?>
                       <div class="modal fade" id="delete">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Xác nhận</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              
                            </div>
                            <div class="modal-body">
                              <p>Hủy bỏ việc thanh toán?</p>    
                              <a href="danhsachnhapvien.php" class="btn btn-info">Xác nhận</a>
                              <a href="thanhtoancobaohiem.php" class="btn btn-danger" data-dismiss="modal" style="float: right;">Đóng</a>
                            </div>
                            </div>
                          </div>
                       </div>
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
              	<li class="nav-item">
                <a class="nav-link" href="danhsachbacsi.php"><i class="ion"><img src="img/icon/glyphicons-595-stethoscope.png" style="width:16px;" alt=""></i> <span class="nav-text">Danh sách bác sĩ</span></a>
              </li>
            </ul>
          </div>

<?php 
  $conn = mysqli_connect('localhost','root','','benhnhannoitru');
  mysqli_set_charset($conn,'utf8');
  $id_benhnhan = $_GET['id'];
  $query_select_bn = mysqli_query($conn,"SELECT bn.id,bn.ngaynhapvien,bn.hoten,bn.gioitinh,bn.ngaysinh,bn.diachi,bn.sdt,bn.quoctich,bn.dantoc,bn.socmnd,bn.sothebhyt,bn.chinhsach,nh.id as 'id_nh',nh.hoten as 'nguoinha', nh.gioitinh as 'goitinh_nh', nh.sdt as 'sdt_nh', nh.diachi as 'diachi_nh', nh.quanhe as 'quanhe' from benhnhan bn join nguoinha nh on bn.nguoinha = nh.id WHERE bn.id = $id_benhnhan");
      foreach ($query_select_bn as $bn_nh) {
          //bệnh nhân
          $id_bn = $bn_nh['id'];
          $ngaynhapvien = $bn_nh['ngaynhapvien'];
          $hoten_bn = $bn_nh['hoten'];
          $gioitinh = $bn_nh['gioitinh'];
          $ngaysinh = $bn_nh['ngaysinh'];
          $diachi = $bn_nh['diachi'];
          $sdt = $bn_nh['sdt'];
          $quoctich = $bn_nh['quoctich'];
          $dantoc = $bn_nh['dantoc'];
          $socmnd = $bn_nh['socmnd'];
          $sothebhyt = $bn_nh['sothebhyt'];
          $chinhsach = $bn_nh['chinhsach'];
          //người nhà
          $id_nh = $bn_nh['id_nh'];
          $hoten_nh = $bn_nh['nguoinha'];
          $goitinh_nh = $bn_nh['goitinh_nh'];
          $sdt_nh = $bn_nh['sdt_nh'];
          $diachi_nh = $bn_nh['diachi_nh'];
          $quanhe = $bn_nh['quanhe'];
      }

  $query_select_ba = mysqli_query($conn,"SELECT ba.id, bn.id as 'mabenhnhan', k.tenkhoa as 'khoa', p.tenphong as 'phong', bs.hoten as 'bacsi',ba.benhchuandoan FROM benhnhan bn join ( khoa k join (phong p join (bacsi bs join benhan ba on bs.id = ba.bacsi) on p.id = ba.phong )on k.id = ba.khoa) on bn.id = ba.mabenhnhan WHERE mabenhnhan = $id_benhnhan");
      foreach ($query_select_ba as $benhan_show) {
        $id_ba = $benhan_show['id'];
        $khoa = $benhan_show['khoa'];
        $phong = $benhan_show['phong'];
        $bacsi = $benhan_show['bacsi'];
        $benhchuandoan = $benhan_show['benhchuandoan'];
      }
  if (isset($_POST['themdichvu'])) {
      $dichvu_select = $_POST['dichvu_select'];
      $bacsi_select = $_POST['bacsi_select'];
      $ngaythuchien = $_POST['ngaythuchien'];
      $query_insert_dvtbn = mysqli_query($conn,"INSERT into dichvutheobenhnhan(mabenhan,dichvu,ngaythuchien,bacsithuchien) 
        values('$id_ba','$dichvu_select','$ngaythuchien','$bacsi_select')");
  }
  $today = Date('Y-m-d');
  $diff = abs(strtotime($today) - strtotime($ngaynhapvien));
  $years = floor($diff / (365*60*60*24));
  $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
  $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
  $sl = mysqli_query($conn,"SELECT gia FROM phong where tenphong = '$phong'");
    foreach ($sl as $gia_phong) {
      $giaphong = $gia_phong['gia'];
    }
  $thanhtien = ($giaphong * $days) - ($giaphong * $days * 0.85);

  $query_tiendichvu = mysqli_query($conn,"SELECT SUM(dv.gia) as 'tongtien' from dichvu dv join dichvutheobenhnhan dvtbn on dvtbn.dichvu = dv.id where mabenhan = $id_ba");
  foreach ($query_tiendichvu as $tdv) {
    $tiendichvu = $tdv['tongtien'];
  }
  $tongtiendichvu = $tiendichvu - ($tiendichvu * 0.85);
  
  $query_tienthuoc = mysqli_query($conn,"SELECT SUM(tb.gia) as 'giathuoc' from benhan ba join (thuoctheobenhnhan ttbn join thuocban tb on ttbn.thuocmua = tb.id) on ba.id = ttbn.mabenhan WHERE ttbn.mabenhan = $id_ba");
  foreach ($query_tienthuoc as $tthuoc) {
    $giathuoc = $tthuoc['giathuoc'];
  }
  $tongchiphi = $thanhtien + $tongtiendichvu + $giathuoc;
?>

          <div class="page-content">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-default widget">
                  <div class="card-heading">
                    <h3 class="card-title">THANH TOÁN VIỆN PHÍ BHYT</h3>
                  </div>
                  <div class="card-body">
                    <form action="" method="POST" role="form">
                          <div class="col-md-4" style="float: left;">
                            <?php 
                          $query_show_khoa = mysqli_query($conn,"SELECT id,tenkhoa FROM khoa");

                         ?>                    
                        <div class="form-group">
                          <label for="">Khoa</label>
                          <select name="khoa" style="width: 95%;padding: 10px;margin-right: 10px;">
                            <?php foreach ($query_show_khoa as $show_khoa) :
                              $sl = $khoa == $show_khoa['tenkhoa'] ? 'selected' : '';
                              ?>
                              <option value="<?php echo $show_khoa['id']; ?>" <?php echo $sl; ?>><?php echo $show_khoa['tenkhoa']; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                            <?php 
                          $query_show_phong = mysqli_query($conn,"SELECT id,tenphong FROM phong");

                         ?> 
                        <div class="form-group">
                          <label for="">Phòng</label>
                          <select name="phong" style="width: 95%;padding: 10px;margin-right: 10px;">
                              <?php foreach ($query_show_phong as $show_phong) :
                                $sl = $phong == $show_phong['tenphong'] ? 'selected' : '';
                                ?>
                              <option value="<?php echo $show_phong['id']; ?>" <?php echo $sl; ?>><?php echo $show_phong['tenphong']; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                          </div>
                          <div class="col-md-4" style="float: left;">
                            <div class="form-group">
                              <label for="">Họ Tên:</label>
                              <input value="<?php echo $hoten_bn ?>" type="text" class="form-control" id="" placeholder="">
                            </div>
                            <div class="form-group">
                              <label for="">CMND:</label>
                              <input value="<?php echo $socmnd ?>" name="cmnd" type="text" class="form-control" id="" placeholder=""> 
                            </div>
                          </div>
                          <div class="col-md-4" style="float: left;">
                             <div class="form-group">
                              <label for="">Quê quán:</label>
                              <input value="<?php echo $diachi ?>" type="text" class="form-control" id="" placeholder=""> 
                            </div>
                            <div class="form-group">
                              <label for="">Số thẻ BHYT:</label>
                              <input value="<?php echo $sothebhyt ?>" type="text" class="form-control" id="" placeholder=""> 
                            </div>
                          </div>
                   </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="card card-default widget" style="margin-top: -30px;">
                  <div class="card-heading">
                    <h3 class="card-title">CHI PHÍ THANH TOÁN</h3>
                  </div>
                  <div class="card-body">
                    <form action="" method="POST" role="form">
                          <h3 style="margin-top: 25px;">Phòng</h3>
                          <div class="phong">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>Loại phòng</th>
                                  <th>Thời gian Ngày</th>
                                  <th>BHYT %</th>
                                  <th>Thành tiền VND</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td><?php echo $phong; ?></td>
                                  <td>
                                    <?php
                                      echo $days;
                                    ?>
                                   </td>
                                  <td>85</td>
                                  <td><?php
                                      echo $thanhtien;
                                    ?></td>
                                </tr>
                              </tbody>
                            </table>
                            <p class="text-right" style="margin-top: 10px;">Tổng tiền: <span style="font-weight: bold;"><?php
                                      echo $thanhtien;
                                    ?></span> VND</p>
                          </div>

                        
                          <h3 style="margin-top : 25px;">Điều trị</h3>
                        <div class="dieutri">
                          <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>Mã dịch vụ</th>
                                  <th>Ngày thực hiện</th>
                                  <th>Tên dịch vụ</th>
                                  <th>Giá VND</th>
                                  <th>BHYT %</th>
                                  <th>Bác sĩ thực hiện</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                $query_show_dvtbn = mysqli_query($conn,"SELECT dvtbn.id,dvtbn.ngaythuchien,dvtbn.mabenhan,dv.tendichvu as 'dichvu', dv.gia as 'gia', bs.hoten as 'bacsithuchien' from dichvu dv join (dichvutheobenhnhan dvtbn join bacsi bs on dvtbn.bacsithuchien = bs.id) on dvtbn.dichvu = dv.id where mabenhan = $id_ba");
                                foreach ($query_show_dvtbn as $dvtbn) : ?>
                                <tr>
                                  <td><?php echo $dvtbn['id']; ?></td>
                                  <td><?php echo $dvtbn['ngaythuchien']; ?></td>
                                  <td><?php echo $dvtbn['dichvu']; ?></td>
                                  <td><?php echo $dvtbn['gia']; ?></td>
                                  <td>85</td>
                                  <td><?php echo $dvtbn['bacsithuchien']; ?></td>
                                </tr>
                              <?php endforeach; ?>
                              </tbody>
                            </table>
                            <?php  ?>
                            <p class="text-right" style="margin-top: 10px;">Tổng tiền: <span style="font-weight: bold;"><?php echo $tongtiendichvu; ?></span> VND</p>
                        </div>

                        <h3 style="margin-top : 25px;">Thuốc mua</h3>
                        <div class="thuoc">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>Mã thuốc</th>
                                <th>Ngày cấp</th>
                                <th>Tên thuốc</th>
                                <th>Số lượng</th>
                                <th>Giá VND</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                              $query_show_thuocban_tb = mysqli_query($conn,"SELECT ttbn.id,tb.id as 'id_tb', tb.tenthuoc as 'thuocban', ttbn.soluong, ttbn.ngaycap, tb.gia as 'gia' from benhan ba join (thuoctheobenhnhan ttbn join thuocban tb on ttbn.thuocmua = tb.id) on ba.id = ttbn.mabenhan WHERE ttbn.mabenhan = $id_ba");
                               ?>
                              <tr>
                                <?php foreach ($query_show_thuocban_tb as $value_tb) : ?>
                                <td><?php echo $value_tb['id_tb']; ?></td>
                                <td><?php echo $value_tb['ngaycap']; ?></td>
                                <td><?php echo $value_tb['thuocban']; ?></td>
                                <td><?php echo $value_tb['soluong']; ?></td>
                                <td><?php echo $value_tb['gia']; ?></td>
                              </tr>
                            <?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>
                        <h3 style="margin-top: 20px;">Thuốc BHYT</h3>
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>Mã thuốc</th>
                                <th>Ngày cấp</th>
                                <th>Tên thuốc</th>
                                <th>Số lượng</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                              $query_show_thuocbhyt_tb = mysqli_query($conn,"SELECT ttbn.id,tbhyt.id as 'id_tbhyt', tbhyt.tenthuoc as 'thuocbhyt', ttbn.soluongthuocbhyt, ttbn.ngaycap from benhan ba join (thuocbhyttheobenhnhan ttbn join thuocbhyt tbhyt on ttbn.thuocbhyt = tbhyt.id) on ba.id = ttbn.mabenhan WHERE ttbn.mabenhan = $id_ba");
                               ?>
                              <tr>
                                <?php foreach($query_show_thuocbhyt_tb as $value_tbhyt) : ?>
                                <td><?php echo $value_tbhyt['id_tbhyt']; ?></td>
                                <td><?php echo $value_tbhyt['ngaycap']; ?></td>
                                <td><?php echo $value_tbhyt['thuocbhyt']; ?></td>
                                <td><?php echo $value_tbhyt['soluongthuocbhyt']; ?></td>
                              </tr>
                            <?php endforeach; ?>
                            </tbody>
                          </table>
                          <p class="text-right" style="margin-top: 10px;">Tổng tiền: <span style="font-weight: bold;"><?php echo $giathuoc; ?></span> VND</p>
                        <hr>
                        <div class="tong" style="margin-top: 20px;margin-bottom: 20px;">
                          <h3 class="text-right">Tổng chi phí thanh toán:</h3>
                          <h2 class="text-right" style="color: #2E2EFE"><?php echo $tongchiphi; ?><span> VND</span></h2>
                        </div>

                      <div class="text-right">
                        <a href="control/xuatkhoa.php?id=<?php echo $id_benhnhan ?>" id="thanhtoan" type="" class="btn btn-success" style="margin: 0px 5px 0 0;">Thanh toán</a>
                         <a href="#delete" data-toggle="modal" class="btn btn-danger">Hủy bỏ</a>
                      </div>
                   </form>
                  </div>
                </div>
<?php 
  require_once('header-footer/footer.php');
 ?>