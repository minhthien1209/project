<?php 
    require_once('header-footer/header.php');
 ?>
      <div class="modal fade" id="themmoibenhnhan">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Xác nhận</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          
        </div>
        <div class="modal-body">
          <p>Bạn có thực sự muốn hủy bỏ thông tin nhập vào?</p>    
          <a href="nhapvien.php"><button type="submit" class="btn btn-danger " style="float: right;">Hủy</button></a>
        </div>
        </div>
      </div>
   </div>

    <div class="modal fade" id="themmoinguoinha">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">  
            <h4 class="modal-title">Thông báo</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
            <div class="modal-body">
              <h2>Thêm mới thất bại</h2>  
              <div class="col-md-12 text-center">
                <?php
                $query_img = mysqli_query($conn,"select anh from bacsi where id = 1");
                 ?>
                 <?php foreach ($query_img as $img) : ?>
                  <img src="<?php echo  $img['anh']; ?>" alt="" style="width: 40%; height: auto;">
                  <?php endforeach; ?>
              </div>  
              <button type="submit" class="btn btn-danger" data-dismiss="modal" style="float: right;">Đóng</button>
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
                  <i class="ion"><img src="img/icon/glyphicons-496-bed-alt.png" style="width:16px;" alt=""></i> <span class="nav-text">Quản lý thuốc</span>
                </a>
                <ul class="nav nav-pills nav-stacked collapse" id="p8">
                  <li class="nav-item"><a class="nav-link" href="danhsachthuoc.php">+ Danh sách thuốc</a></li>
                </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="danhsachbacsi.php"><i class="ion"><img src="img/icon/glyphicons-672-heartbeat.png" style="width:16px;" alt=""></i> <span class="nav-text">Danh sách bác sĩ</span></a>
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
  if (isset($_POST['hoten_benhnhan'])) {

          //bệnh nhân
          $ngaynhapvien_update = $_POST['ngaynhapvien'];
          $hoten_bn_update = $_POST['hoten_benhnhan'];
          $gioitinh_update = $_POST['goitinh_benhnhan'];
          $ngaysinh_update = $_POST['ngaysinh_benhnhan'];
          $diachi_update = $_POST['diachi_benhnhan'];
          $sdt_update = $_POST['sdt_benhnhan'];
          $quoctich_update = $_POST['quoctich'];
          $dantoc_update = $_POST['dantoc'];
          $socmnd_update = $_POST['socmnd'];
          $sothebhyt_update = $_POST['sobhyt'];
          $chinhsach_update = $_POST['chinhsach'];
          //người nhà
          $hoten_nh_update = $_POST['hoten_nguoinha'];
          $goitinh_nh_update = $_POST['goitinh_nguoinha'];
          $sdt_nh_update = $_POST['sdt_nguoinha'];
          $diachi_nh_update = $_POST['diachi_nguoinha'];
          $quanhe_update = $_POST['quanhe_nguoinha'];
          //Bệnh án
          $khoa_update = $_POST['khoa'];
          $phong_update = $_POST['phong'];
          $bacsi_update = $_POST['bacsi'];
          $benhchuandoan_update = $_POST['chuandoanbenh'];
  }
  if (isset($_POST['chinhsuabenhnhan'])) {
    $query_update_ba = mysqli_query($conn,"UPDATE benhan SET mabenhnhan = '$id_bn', khoa = '$khoa_update', phong = '$phong_update', bacsi = '$bacsi_update', benhchuandoan = '$benhchuandoan_update' WHERE id=$id_ba");
    $query_update_bn = mysqli_query($conn,"UPDATE benhnhan SET ngaynhapvien = '$ngaynhapvien_update',hoten = '$hoten_bn_update',gioitinh = '$gioitinh_update',ngaysinh = '$ngaysinh_update',diachi = '$diachi_update',sdt = '$sdt_update',quoctich = '$quoctich_update',dantoc = '$dantoc_update',socmnd = '$socmnd_update',sothebhyt = '$sothebhyt_update',chinhsach = '$chinhsach_update',nguoinha = '$id_nh' WHERE id= $id_benhnhan");
    $query_update_nh = mysqli_query($conn,"UPDATE nguoinha SET hoten = '$hoten_nh_update',gioitinh = '$goitinh_nh_update',sdt = '$sdt_nh_update',diachi = '$diachi_nh_update',quanhe = '$quanhe_update' WHERE id= $id_nh");

      header('location: danhsachnhapvien.php');
    }

 ?>

          <div class="page-content">
              <div class="col-md-12">
                <div class="card card-default widget">
                  <div class="card-heading">
                        <h3 class="card-title">Chỉnh sửa thông tin bệnh nhân</h3>
                  </div>
                  <div class="card-body">                   
                    <form action="" method="POST">
                      <div class="col-md-6" style="float: left;">
                        <legend>Thông tin người nhà</legend>
                                            
                        <div class="form-group">
                          <label for="">Họ tên</label>
                          <input value="<?php echo $hoten_nh ?>" name="hoten_nguoinha" type="text" class="form-control" id="" placeholder="" style="width: 95%;" required>
                        </div>
                        <?php 
                          if ($goitinh_nh == 'Nam') {
                            $sl1 = 'selected';
                            }else{$sl1 = '';}

                          if ($goitinh_nh == 'Nữ') {
                              $sl2 = 'selected';
                            }else {$sl2 = '';}

                          if ($goitinh_nh == 'Khác') {
                              $sl3 = 'selected';
                            }else {$sl3 = '';}
                         ?>
                        <div class="form-group">
                          <label for="">Giới tính</label>
                          <select name="goitinh_nguoinha" style="width: 95%;padding: 10px;margin-right: 10px; margin-bottom: 5px;">
                              <option value="Nam" <?php echo $sl1; ?>>Nam</option>
                              <option value="Nữ" <?php echo $sl2; ?>>Nữ</option>
                              <option value="Khác" <?php echo $sl3; ?>>Khác</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="">SDT</label>
                          <input value="<?php echo $sdt_nh ?>" name="sdt_nguoinha" type="text" class="form-control" id="" placeholder="" style="width: 95%;" required>
                        </div>
                        <div class="form-group">
                          <label for="">Địa chỉ</label>
                          <input value="<?php echo $diachi_nh  ?>" name="diachi_nguoinha" type="text" class="form-control" id="" placeholder="" style="width: 95%;">
                        </div>
                        <div class="form-group">
                          <label for="">Quan hệ</label>
                          <input value="<?php echo $quanhe ?>" name="quanhe_nguoinha" type="text" class="form-control" id="" placeholder="" style="width: 95%;" required>
                        </div>
                      </div>
                      <div class="col-md-6" style="float: left;">
                        <legend>Bệnh án</legend>
                        
                        <?php 
                          $query_show_khoa = mysqli_query($conn,"SELECT id,tenkhoa FROM khoa");

                         ?>                    
                        <div class="form-group">
                          <label for="">Nhập vào khoa</label>
                          <select name="khoa" style="width: 95%;padding: 10px;margin-right: 10px;">
                            <?php foreach ($query_show_khoa as $show_khoa) :
                              $sl = $khoa == $show_khoa['id'] ? 'selected' : '';
                              ?>
                              <option value="<?php echo $show_khoa['id']; ?>" <?php echo $sl; ?>><?php echo $show_khoa['tenkhoa']; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        
                        <?php 
                          $query_show_phong = mysqli_query($conn,"SELECT id,tenphong FROM phong");

                         ?> 
                        <div class="form-group">
                          <label for="">Nhập vào phòng</label>
                          <select name="phong" style="width: 95%;padding: 10px;margin-right: 10px;">
                              <?php foreach ($query_show_phong as $show_phong) :
                                $sl = $phong == $show_phong['id'] ? 'selected' : '';
                                ?>
                              <option value="<?php echo $show_phong['id']; ?>" <?php echo $sl; ?>><?php echo $show_phong['tenphong']; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        
                        <?php 
                          $query_show_bacsi = mysqli_query($conn,"SELECT id,hoten FROM bacsi");

                         ?> 
                        <div class="form-group">
                          <label for="">Bác sĩ điều trị</label>
                          <select name="bacsi" style="width: 95%;padding: 10px;margin-right: 10px;">
                              <?php foreach ($query_show_bacsi as $show_bacsi) :
                                $sl = $bacsi == $show_bacsi['id'] ? 'selected' : '';
                                ?>
                              <option value="<?php echo $show_bacsi['id']; ?>" <?php echo $sl; ?>><?php echo $show_bacsi['hoten']; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="">Bệnh chuẩn đoán</label>
                          <input value="<?php echo $benhchuandoan ?>" name="chuandoanbenh" type="text" class="form-control" id="" placeholder="" style="width: 95%;">
                        </div>
                      </div>
                      
                      <div class="col-md-12" style="float: left;">
                        <legend>Thông tin bệnh nhân</legend>
                                            
                        <div class="col-md-6" style="float: left;">
                          <div class="form-group">
                            <label for="">Ngày nhập viện</label>
                            <input value="<?php echo $ngaynhapvien ?>" name="ngaynhapvien" type="date" class="form-control" id="" placeholder="" style="width: 95%;" required>
                          </div>
                          
                          <div class="form-group">
                            <label for="">Họ tên</label>
                            <input value="<?php echo $hoten_bn ?>" name="hoten_benhnhan" type="" class="form-control" id="" placeholder="" style="width: 95%;" required>
                          </div>
                          <?php 
                          if ($gioitinh == 'Nam') {
                            $sl1_bn = 'selected';
                            }else{$sl1_bn = '';}

                          if ($gioitinh == 'Nữ') {
                              $sl2_bn = 'selected';
                            }else {$sl2_bn = '';}

                          if ($gioitinh == 'Khác') {
                              $sl3_bn = 'selected';
                            }else {$sl3_bn = '';}
                         ?>
                          <div class="form-group">
                            <label for="">Giới tính</label>
                            <select name="goitinh_benhnhan" style="width: 95%;padding: 10px;margin-right: 10px; margin-bottom: 5px;">
                                <option value="Nam" <?php echo $sl1_bn; ?> >Nam</option>
                                <option value="Nữ" <?php echo $sl2_bn; ?> >Nữ</option>
                                <option value="Khác" <?php echo $sl3_bn; ?> >Khác</option>
                            </select>
                          </div>
                          
                          <div class="form-group">
                            <label for="">Ngày sinh</label>
                            <input value="<?php echo $ngaysinh ?>" name="ngaysinh_benhnhan" type="date" class="form-control" id="" placeholder="" style="width: 95%;" required>
                          </div>
                          
                          <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input value="<?php echo $diachi ?>" name="diachi_benhnhan" type="" class="form-control" id="" placeholder="" style="width: 95%;" required>
                          </div>
                          
                          <div class="form-group">
                            <label for="">SDT</label>
                            <input value="<?php echo $sdt ?>" name="sdt_benhnhan" type="" class="form-control" id="" placeholder="" style="width: 95%;">
                          </div>
                        </div>
                        <?php 
                          if ($quoctich == 'Việt Nam') {
                            $sl1_qt = 'selected';
                            }else{$sl1_qt = '';}
                          if ($quoctich == 'Lào') {
                              $sl2_qt = 'selected';
                            }else {$sl2_qt = '';}
                          if ($quoctich == 'Indonesia') {
                              $sl3_qt = 'selected';
                            }else {$sl3_qt = '';}
                          if ($quoctich == 'Myanmar') {
                              $sl4_qt = 'selected';
                            }else {$sl4_qt = '';}
                          if ($quoctich == 'Thái Lan') {
                              $sl5_qt = 'selected';
                            }else {$sl5_qt = '';}
                          if ($quoctich == 'Philippines') {
                              $sl6_qt = 'selected';
                            }else {$sl6_qt = '';}
                          if ($quoctich == 'Campuchia') {
                              $sl7_qt = 'selected';
                            }else {$sl7_qt = '';}
                          if ($quoctich == 'Dongtimor') {
                              $sl8_qt = 'selected';
                            }else {$sl8_qt = '';}
                          if ($quoctich == 'Brunei') {
                              $sl9_qt = 'selected';
                            }else {$sl9_qt = '';}
                          if ($quoctich == 'Singgapore') {
                              $sl10_qt = 'selected';
                            }else {$sl10_qt = '';}
                         ?>
                        <div class="col-md-6" style="float: left;">
                          <div class="form-group">
                            <label for="">Quốc tịch</label>
                            <select name="quoctich" style="width: 95%;padding: 10px;margin-right: 10px; margin-bottom: 5px;">
                                <option value="Việt Nam" <?php echo $sl1_qt; ?>>Việt Nam</option>
                                <option value="Lào" <?php echo $sl2_qt; ?>>Lào</option>
                                <option value="Indonesia" <?php echo $sl3_qt; ?>>Indonesia</option>
                                <option value="Myanmar" <?php echo $sl4_qt; ?>>Myanmar</option>
                                <option value="Thái Lan" <?php echo $sl5_qt; ?>>Thái Lan</option>
                                <option value="Philippines" <?php echo $sl6_qt; ?>>Philippines</option>
                                <option value="Campuchia" <?php echo $sl7_qt; ?>>Campuchia</option>
                                <option value="Dongtimor" <?php echo $sl8_qt; ?>>Dongtimor</option>
                                <option value="Brunei" <?php echo $sl9_qt; ?>>Brunei</option>
                                <option value="Singgapore" <?php echo $sl10_qt; ?>>Singgapore</option>
                            </select>
                          </div>
                          <?php 
                          if ($dantoc == 'Kinh') {
                            $sl1_dt = 'selected';
                            }else{$sl1_dt = '';}
                          if ($dantoc == 'Tày') {
                              $sl2_dt = 'selected';
                            }else {$sl2_dt = '';}
                          if ($dantoc == 'Thái') {
                              $sl3_dt = 'selected';
                            }else {$sl3_dt = '';}
                          if ($dantoc == 'Mường') {
                              $sl4_dt = 'selected';
                            }else {$sl4_dt = '';}
                          if ($dantoc == 'Nùng') {
                              $sl5_dt = 'selected';
                            }else {$sl5_dt = '';}
                          if ($dantoc == 'Hơ Mông') {
                              $sl6_dt = 'selected';
                            }else {$sl6_dt = '';}
                          if ($dantoc == 'Dao') {
                              $sl7_dt = 'selected';
                            }else {$sl7_dt = '';}
                          if ($dantoc == 'Gia Rai') {
                              $sl8_dt = 'selected';
                            }else {$sl8_dt = '';}
                          if ($dantoc == 'Ê Đê') {
                              $sl9_dt = 'selected';
                            }else {$sl9_dt = '';}
                          if ($dantoc == 'Ba Na') {
                              $sl10_dt = 'selected';
                            }else {$sl10_dt = '';}
                          if ($dantoc == 'Sán Chay') {
                              $sl11_dt = 'selected';
                            }else {$sl11_dt = '';}
                          if ($dantoc == 'Chăm') {
                              $sl12_dt = 'selected';
                            }else {$sl12_dt = '';}
                          if ($dantoc == 'Cờ Ho') {
                              $sl13_dt = 'selected';
                            }else {$sl13_dt = '';}
                          if ($dantoc == 'Xơ Đăng') {
                              $sl14_dt = 'selected';
                            }else {$sl14_dt = '';}
                          if ($dantoc == 'Sán Dìu') {
                              $sl15_dt = 'selected';
                            }else {$sl15_dt = '';}
                          if ($dantoc == 'Hrê') {
                              $sl16_dt = 'selected';
                            }else {$sl16_dt = '';}
                         ?>
                          <div class="form-group">
                            <label for="">Dân tộc</label>
                            <select name="dantoc" style="width: 95%;padding: 10px;margin-right: 10px; margin-bottom: 5px; margin-top: -5px;">
                                <option value="Kinh" <?php echo $sl1_dt; ?>>Kinh</option>
                                <option value="Tày" <?php echo $sl2_dt; ?>>Tày</option>
                                <option value="Thái" <?php echo $sl3_dt; ?>>Thái</option>
                                <option value="Mường" <?php echo $sl4_dt; ?>>Mường</option>
                                <option value="Nùng" <?php echo $sl5_dt; ?>>Nùng</option>
                                <option value="Hơ Mông" <?php echo $sl6_dt; ?>>Hơ Mông</option>
                                <option value="Dao" <?php echo $sl7_dt; ?>>Dao</option>
                                <option value="Gia Rai" <?php echo $sl8_dt; ?>>Gia Rai</option>
                                <option value="Ê Đê" <?php echo $sl9_dt; ?>>Ê Đê</option>
                                <option value="Ba Na" <?php echo $sl10_dt; ?>>Ba Na</option>
                                <option value="Sán Chay" <?php echo $sl11_dt; ?>>Sán Chay</option>
                                <option value="Chăm" <?php echo $sl12_dt; ?>>Chăm</option>
                                <option value="Cờ Ho" <?php echo $sl13_dt; ?>>Cờ Ho</option>
                                <option value="Xơ Đăng" <?php echo $sl14_dt; ?>>Xơ Đăng</option>
                                <option value="Sán Dìu" <?php echo $sl15_dt; ?>>Sán Dìu</option>
                                <option value="Hrê" <?php echo $sl16_dt; ?>>Hrê</option>
                            </select>
                          </div>
                          
                          <div class="form-group">
                            <label for="">Số CMND</label>
                            <input value="<?php echo $socmnd ?>" name="socmnd" type="" class="form-control" id="" placeholder="" style="width: 95%; margin-top: -5px;margin-bottom: 20px;" required>
                          </div>
                          
                          <div class="form-group">
                            <label for="">Số thẻ BHYT</label>
                            <input value="<?php echo $sothebhyt ?>" name="sobhyt" type="" class="form-control" id="" placeholder="" style="width: 95%;">
                          </div>
                          <?php 
                          if ($chinhsach == 'Không') {
                            $sl1_cs = 'selected';
                            }else{$sl1_cs = '';}

                          if ($chinhsach == 'Hộ nghèo') {
                              $sl2_cs = 'selected';
                            }else {$sl2_cs = '';}

                          if ($chinhsach == 'Cận nghèo') {
                              $sl3_cs = 'selected';
                            }else {$sl3_cs = '';}

                          if ($chinhsach == 'Dân tộc') {
                              $sl4_cs = 'selected';
                            }else {$sl4_cs = '';}

                          if ($chinhsach == 'Thương binh - Liệt sĩ') {
                              $sl5_cs = 'selected';
                            }else {$sl5_cs = '';}
                         ?>
                          <div class="form-group">
                            <label for="">Chính sách</label>
                            <select name="chinhsach" style="width: 95%;padding: 10px;margin-right: 10px; margin-bottom: 5px;">
                                <option value="Không" <?php echo $sl1_cs; ?>>Không</option>
                                <option value="Hộ nghèo" <?php echo $sl2_cs; ?>>Hộ nghèo</option>
                                <option value="Cận nghèo" <?php echo $sl3_cs; ?>>Cận nghèo</option>
                                <option value="Dân tộc" <?php echo $sl4_cs; ?>>Dân tộc</option>
                                <option value="Thương binh - Liệt sĩ" <?php echo $sl5_cs; ?>>Thương binh - Liệt sĩ</option>
                            </select>
                          </div>
                          </div>
                        </div>
                      
                    
                      <div class="col-md-12" style="float: left;">
                          <div class="col-md-10" style="float: left;"> 
                          </div>
                          <div class="col-md-2" style="float: left;"><button type="submit" class="btn btn-info" name="chinhsuabenhnhan" id="update">Chỉnh sửa</button></div>
                      </div>
                    </form>
                </div>
              </div>
            </div>

<?php 
  require_once('header-footer/footer.php');
 ?>
