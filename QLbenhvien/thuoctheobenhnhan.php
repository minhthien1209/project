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
  if (isset($_POST['themthuocbhyt'])) {
      $thuocbhytb_input = $_POST['thuocbhytb_input'];
      $sl_thuocbhytb = $_POST['sl_thuocbhytb'] != '' ? $_POST['sl_thuocbhytb'] : 0;
      // $sql_1 = "INSERT into thuocbhyttheobenhnhan(mabenhan,thuocbhyt,soluongthuocbhyt) 
      //   values('$id_ba','$thuocbhytb_input','$sl_thuocbhytb')";
      // echo $sql_1;
      $query_insert_thuocbhyt = mysqli_query($conn,"INSERT into thuocbhyttheobenhnhan(mabenhan,thuocbhyt,soluongthuocbhyt) 
        values('$id_ba','$thuocbhytb_input','$sl_thuocbhytb')");
  }
  if (isset($_POST['themthuocban'])) {
      $thuocban_input = $_POST['thuocban_input'];
      $sl_thuocban = $_POST['sl_thuocban'] != '' ? $_POST['sl_thuocban'] : 0;
      $query_insert_thuocban = mysqli_query($conn,"INSERT into thuoctheobenhnhan(mabenhan,thuocmua,soluong) 
        values('$id_ba','$thuocban_input','$sl_thuocban')");
  }
 ?>

          <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                  <div class="card card-default widget" style="height: 95%">
                    <div class="card-body">
                      <div class="panel panel-default" style="margin-top: 20px;">
                      <h3 style="padding-bottom: 10px;">THUỐC CẤP PHÁT</h3>
<!--                         <form action="" method="POST" role="form"> -->
                          <div class="col-md-3" style="float: left;">
                            <div class="form-group">
                              <label for="">Mã bệnh nhân:</label>
                              <input value="<?php echo $id_bn ?>" type="text" class="form-control" id="" placeholder="">
                            </div>
                            <div class="form-group">
                              <label for="">Họ Tên:</label>
                              <input value="<?php echo $hoten_bn ?>" type="text" class="form-control" id="" placeholder="">
                            </div>
                            <div class="form-group">
                              <label style="" for="">Số bệnh án:</label>
                              <input value="<?php echo $id_ba ?>" type="text" class="form-control" id="" placeholder="">
                            </div>
                            <?php 
                              $query_show_khoa = mysqli_query($conn,"SELECT id,tenkhoa FROM khoa");
                            ?>  
                            <div class="form-group">
                              <label for="">Khoa</label>
                              <select name="khoa" style="width: 100%;padding: 10px;margin-right: 10px;">
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
                              <select name="phong" style="width: 100%;padding: 10px;margin-right: 10px;">
                                  <?php foreach ($query_show_phong as $show_phong) :
                                    $sl = $phong == $show_phong['tenphong'] ? 'selected' : '';
                                    ?>
                                  <option value="<?php echo $show_phong['id']; ?>" <?php echo $sl; ?>><?php echo $show_phong['tenphong']; ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                            <div class="form-group" style=";">
                              <label for="">Số thẻ BHYT:</label>
                              <input value="<?php echo $sothebhyt; ?>" name="sothebhyt" type="text" class="form-control" id="" placeholder="">
                            </div>
                          </div>
                          
                          <div class="col-md-3" style="float: left;">
                            <label for="">Chuẩn đoán:</label>
                            <textarea name="benhchuandoan" cols="28" rows="4" placeholder="<?php echo $benhchuandoan; ?>"></textarea>
                          </div>
                          <?php 
                              $query_show_thuocbhyt = mysqli_query($conn,"SELECT id,tenthuoc FROM thuocbhyt");
                            ?>
                            <form action="" method="POST" role="form">
                              <div class="col-md-3" style="float: left;">
                            <div class="form-group" style=>
                              <label style="" for="">Thuốc cấp BHYT:</label>
                              <select name="thuocbhytb_input" style="padding: 9px 30px 9px 5px">
                                <?php foreach ($query_show_thuocbhyt as $thuocbhyt) : ?>
                                <option value="<?php echo $thuocbhyt['id']; ?>"><?php echo $thuocbhyt['tenthuoc']; ?></option>
                              <?php endforeach; ?>
                              </select>
                              <button name="themthuocbhyt" type="submit" class="btn-info" style="border-radius: 5px; height: 35px; margin-left: 5px;">+</button>
                            </div>
                            <input name="sl_thuocbhytb" type="number" class="form-control" id="" placeholder="SL" style="width: 30%; margin-top: -2px;">
                          </div>
                            </form>
                          
                          <?php 
                              $query_show_thuocban = mysqli_query($conn,"SELECT id,tenthuoc FROM thuocban");
                            ?>
                            <form action="" method="POST" role="form">
                              <div class="col-md-3" style="float: left;">
                            <div class="form-group" style=>
                              <label style="" for="">Thuốc:</label>
                              <select name="thuocban_input" style="padding: 9px 45px 9px 5px">
                                <?php foreach ($query_show_thuocban as $thuocban) : ?>
                                <option value="<?php echo $thuocban['id']; ?>"><?php echo $thuocban['tenthuoc']; ?></option>
                              <?php endforeach; ?>
                              </select>
                              <button name="themthuocban" type="submit" class="btn-info" style="border-radius: 5px; height: 35px; margin-left: 5px;">+</button>
                            </div>
                            <input name="sl_thuocban" type="number" class="form-control" id="" placeholder="SL" style="width: 30%; margin-top: -2px;">
                          </div>
                            </form>
                      </div>
                      <div class="col-md-9" style="float: left; margin-top: 15px;">
                        <div class="view_thuoc">
                          <h5>Thuốc BHYT</h5>
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>Mã thuốc</th>
                                <th>Ngày cấp</th>
                                <th>Tên thuốc</th>
                                <th>Số lượng</th>
                                <th></th>
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
                                <td><a href="control/delete_thuoc_bhyt.php?id=<?php echo $value_tbhyt['id']; ?>" class="btn-sm btn-danger del_dv_thuocbhyt">Xóa</a></td>
                              </tr>
                            <?php endforeach; ?>
                            </tbody>
                          </table>
                          <h5 style="margin-top: 15px;">Thuốc mua</h5>
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>Mã thuốc</th>
                                <th>Ngày cấp</th>
                                <th>Tên thuốc</th>
                                <th>Số lượng</th>
                                <th>Giá VND</th>
                                <th></th>
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
                                <td><a href="control/delete_thuoc.php?id=<?php echo $value_tb['id']; ?>" class="btn-sm btn-danger del_dv_thuoc">Xóa</a></td>
                              </tr>
                            <?php endforeach; ?>
                            </tbody>
                          </table>
                      </div>
                      </div>
                  </div>
                    
            </div>
            </div>
            </div>
                            <script type="text/javascript">
                  document.querySelector("#today").valueAsDate = new Date();
                </script> 
<?php 
  require_once('header-footer/footer.php');
 ?>
<script type="text/javascript">
                $(document).on('click','.del_dv_thuoc',function(e){
                  e.preventDefault(); // return false
                  var href = $(this).attr('href');
                   $.ajax({
                    url: href,
                    type:'GET',
                    success:function(res){
                     swal({
                         title: 'Chắn chắn không?',
                         text: "Xác nhận xóa dịch vụ",
                         type: 'warning',
                         showCancelButton: true,
                         confirmButtonColor: '#3085d6',
                         cancelButtonColor: '#d33',
                         confirmButtonText: 'Đồng ý!'
                       }).then((result) => {
                         if (result.value) {
                           swal(
                             'Đã xóa!',
                             'Bạn đã xóa dịch vụ vừa chọn',
                             'success'
                           )
                         }
                       });
                       $('.view_thuoc').load(location.href + ' .view_thuoc');
                    }
                  });
                  
                });
              </script>

<script type="text/javascript">
                $(document).on('click','.del_dv_thuocbhyt',function(e){
                  e.preventDefault(); // return false
                  var href = $(this).attr('href');
                   $.ajax({
                    url: href,
                    type:'GET',
                    success:function(res){
                     swal({
                         title: 'Chắn chắn không?',
                         text: "Xác nhận xóa dịch vụ",
                         type: 'warning',
                         showCancelButton: true,
                         confirmButtonColor: '#3085d6',
                         cancelButtonColor: '#d33',
                         confirmButtonText: 'Đồng ý!'
                       }).then((result) => {
                         if (result.value) {
                           swal(
                             'Đã xóa!',
                             'Bạn đã xóa dịch vụ vừa chọn',
                             'success'
                           )
                         }
                       });
                       $('.view_thuoc').load(location.href + ' .view_thuoc');
                    }
                  });
                  
                });
              </script>