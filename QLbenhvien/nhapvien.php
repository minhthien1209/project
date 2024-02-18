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
                  <li class="nav-item active"><a class="nav-link" href="nhapvien.php">+ Nhập viện</a></li>
                  <li class="nav-item"><a class="nav-link" href="danhsachnhapvien.php">+ Danh sách nhập viện</a></li>
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
  if (isset($_POST['thembenhnhan'])) {
    //Người nhà
    $hoten_nguoinha = $_POST['hoten_nguoinha'];
    $goitinh_nguoinha = $_POST['goitinh_nguoinha'];
    $sdt_nguoinha = $_POST['sdt_nguoinha'];
    $diachi_nguoinha = $_POST['diachi_nguoinha'];
    $quanhe_nguoinha = $_POST['quanhe_nguoinha'];

    $query_themnguoinha = mysqli_query($conn,"INSERT into nguoinha(hoten,gioitinh,sdt,diachi,quanhe) values('$hoten_nguoinha', '$goitinh_nguoinha', '$sdt_nguoinha','$diachi_nguoinha','$quanhe_nguoinha')");
    if ($query_themnguoinha) {
      $query_layidnguoinha = mysqli_query($conn,"SELECT MAX(id) FROM nguoinha");
      foreach ($query_layidnguoinha as $id) {
        $idnguoinha = $id['MAX(id)'];
        }
          //Bệnh nhân
          $ngaynhapvien = $_POST['ngaynhapvien'];
          $hoten_benhnhan = $_POST['hoten_benhnhan'];
          $goitinh_benhnhan = $_POST['goitinh_benhnhan'];
          $ngaysinh_benhnhan = $_POST['ngaysinh_benhnhan'];
          $diachi_benhnhan = $_POST['diachi_benhnhan'];
          $sdt_benhnhan = $_POST['sdt_benhnhan'];
          $quoctich = $_POST['quoctich'];
          $dantoc = $_POST['dantoc'];
          $socmnd = $_POST['socmnd'];
          $sobhyt = $_POST['sobhyt'];
          $chinhsach = $_POST['chinhsach'];

          $query_themmoibenhnhan = mysqli_query($conn,"insert into benhnhan(ngaynhapvien,hoten,gioitinh,ngaysinh,diachi,sdt,quoctich,dantoc,socmnd,sothebhyt,chinhsach,nguoinha) 
        values('$ngaynhapvien','$hoten_benhnhan','$goitinh_benhnhan','$ngaysinh_benhnhan','$diachi_benhnhan','$sdt_benhnhan','$quoctich','$dantoc','$socmnd','$sobhyt','$chinhsach',$idnguoinha)");
      if ($query_themmoibenhnhan) {
          $query_layidbenhnhan = mysqli_query($conn,"SELECT MAX(id) FROM benhnhan");
          foreach ($query_layidbenhnhan as $id_bn) {
            $idbenhnhan = $id_bn['MAX(id)'];
            }
            //Bệnh án
            $khoa = $_POST['khoa'];
            $phong = $_POST['phong'];
            $bacsi = $_POST['bacsi'];
            $chuandoanbenh = $_POST['chuandoanbenh'];

            $query_themmoibenhan = mysqli_query($conn,"insert into benhan(mabenhnhan,khoa,phong,bacsi,benhchuandoan) 
              values('$idbenhnhan','$khoa','$phong','$bacsi','$chuandoanbenh')");
        }
    }
  }

 ?>  
          <div class="page-content">
              <div class="col-md-12">
                <div class="card card-default widget">
                  <div class="card-heading">
                        <h3 class="card-title">Nhập viện</h3>
                  </div>
                  <div class="card-body">                   
                    <form action="" method="POST">
                      <div class="col-md-6" style="float: left;">
                        <legend>Thông tin người nhà</legend>
                                            
                        <div class="form-group">
                          <label for="">Họ tên</label>
                          <input name="hoten_nguoinha" type="text" class="form-control" id="" placeholder="" style="width: 95%;">
                        </div>
                        <div class="form-group">
                          <label for="">Giới tính</label>
                          <select name="goitinh_nguoinha" style="width: 95%;padding: 10px;margin-right: 10px; margin-bottom: 5px;">
                              <option value="Nam">Nam</option>
                              <option value="Nữ">Nữ</option>
                              <option value="Khác">Khác</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="">SDT</label>
                          <input name="sdt_nguoinha" type="text" class="form-control" id="" placeholder="" style="width: 95%;">
                        </div>
                        <div class="form-group">
                          <label for="">Địa chỉ</label>
                          <input name="diachi_nguoinha" type="text" class="form-control" id="" placeholder="" style="width: 95%;">
                        </div>
                        <div class="form-group">
                          <label for="">Quan hệ</label>
                          <input name="quanhe_nguoinha" type="text" class="form-control" id="" placeholder="" style="width: 95%;">
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
                            <?php foreach ($query_show_khoa as $show_khoa) :?>
                              <option value="<?php echo $show_khoa['id']; ?>"><?php echo $show_khoa['tenkhoa']; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        
                        <?php 
                          $query_show_phong = mysqli_query($conn,"SELECT id,tenphong FROM phong");

                         ?> 
                        <div class="form-group">
                          <label for="">Nhập vào phòng</label>
                          <select name="phong" style="width: 95%;padding: 10px;margin-right: 10px;">
                              <?php foreach ($query_show_phong as $show_phong) :?>
                              <option value="<?php echo $show_phong['id']; ?>"><?php echo $show_phong['tenphong']; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        
                        <?php 
                          $query_show_bacsi = mysqli_query($conn,"SELECT id,hoten FROM bacsi");

                         ?> 
                        <div class="form-group">
                          <label for="">Bác sĩ điều trị</label>
                          <select name="bacsi" style="width: 95%;padding: 10px;margin-right: 10px;">
                              <?php foreach ($query_show_bacsi as $show_bacsi) :?>
                              <option value="<?php echo $show_bacsi['id']; ?>"><?php echo $show_bacsi['hoten']; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="">Bệnh chuẩn đoán</label>
                          <input name="chuandoanbenh" type="text" class="form-control" id="" placeholder="" style="width: 95%;">
                        </div>
                      </div>
                      
                      <div class="col-md-12" style="float: left;">
                        <legend>Thông tin bệnh nhân</legend>
                                            
                        <div class="col-md-6" style="float: left;">
                          <div class="form-group">
                            <label for="">Ngày nhập viện</label>
                            <input name="ngaynhapvien" type="date" class="form-control" id="" placeholder="" style="width: 95%;">
                          </div>
                          
                          <div class="form-group">
                            <label for="">Họ tên</label>
                            <input name="hoten_benhnhan" type="" class="form-control" id="" placeholder="" style="width: 95%;">
                          </div>
                          
                          <div class="form-group">
                            <label for="">Giới tính</label>
                            <select name="goitinh_benhnhan" style="width: 95%;padding: 10px;margin-right: 10px; margin-bottom: 5px;">
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                                <option value="Khác">Khác</option>
                            </select>
                          </div>
                          
                          <div class="form-group">
                            <label for="">Ngày sinh</label>
                            <input name="ngaysinh_benhnhan" type="date" class="form-control" id="" placeholder="" style="width: 95%;">
                          </div>
                          
                          <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input name="diachi_benhnhan" type="" class="form-control" id="" placeholder="" style="width: 95%;">
                          </div>
                          
                          <div class="form-group">
                            <label for="">SDT</label>
                            <input name="sdt_benhnhan" type="" class="form-control" id="" placeholder="" style="width: 95%;">
                          </div>
                        </div>

                        <div class="col-md-6" style="float: left;">
                          <div class="form-group">
                            <label for="">Quốc tịch</label>
                            <select name="quoctich" style="width: 95%;padding: 10px;margin-right: 10px; margin-bottom: 5px;">
                                <option value="Việt Nam">Việt Nam</option>
                                <option value="Lào">Lào</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Thái Lan">Thái Lan</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Campuchia">Campuchia</option>
                                <option value="Dongtimor">Dongtimor</option>
                                <option value="Brunei">Brunei</option>
                                <option value="Singgapore">Singgapore</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="">Dân tộc</label>
                            <select name="dantoc" style="width: 95%;padding: 10px;margin-right: 10px; margin-bottom: 5px; margin-top: -5px;">
                                <option value="Kinh">Kinh</option>
                                <option value="Tày">Tày</option>
                                <option value="Thái">Thái</option>
                                <option value="Mường">Mường</option>
                                <option value="Nùng">Nùng</option>
                                <option value="Hơ Mông">Hơ Mông</option>
                                <option value="Dao">Dao</option>
                                <option value="Gia Rai">Gia Rai</option>
                                <option value="Ê Đê">Ê Đê</option>
                                <option value="Ba Na">Ba Na</option>
                                <option value="Sán Chay">Sán Chay</option>
                                <option value="Chăm">Chăm</option>
                                <option value="Cờ Ho">Cờ Ho</option>
                                <option value="Xơ Đăng">Xơ Đăng</option>
                                <option value="Sán Dìu">Sán Dìu</option>
                                <option value="Hrê">Hrê</option>
                            </select>
                          </div>
                          
                          <div class="form-group">
                            <label for="">Số CMND</label>
                            <input name="socmnd" type="" class="form-control" id="" placeholder="" style="width: 95%; margin-top: -5px;margin-bottom: 20px;">
                          </div>
                          
                          <div class="form-group">
                            <label for="">Số thẻ BHYT</label>
                            <input name="sobhyt" type="" class="form-control" id="" placeholder="" style="width: 95%;">
                          </div>
                          
                          <div class="form-group">
                            <label for="">Chính sách</label>
                            <select name="chinhsach" style="width: 95%;padding: 10px;margin-right: 10px; margin-bottom: 5px;">
                                <option value="Không">Không</option>
                                <option value="Hộ nghèo">Hộ nghèo</option>
                                <option value="Cận nghèo">Cận nghèo</option>
                                <option value="Dân tộc">Dân tộc</option>
                                <option value="Thương binh - Liệt sĩ">Thương binh - Liệt sĩ</option>
                            </select>
                          </div>
                          </div>
                        </div>
                      
                    
                      <div class="col-md-12" style="float: left;">
                          <div class="col-md-10" style="float: left;"> 
                          </div>
                          <div class="col-md-2" style="float: left;"><button type="submit" class="btn btn-info" name="thembenhnhan" onclick="alert('Thêm mới bệnh nhân thành công!!!');tai_lai_trang()">Nhập viện</button></div>
                      </div>
                    </form>
                </div>
              </div>
            </div>
    <script>
      function tai_lai_trang(){
        location.reload();
      }
    </script>
<?php 
  require_once('header-footer/footer.php');
 ?>
