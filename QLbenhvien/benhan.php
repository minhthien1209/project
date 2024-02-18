<?php 
    require_once('header-footer/header.php');
 ?>
 <div class="modal fade" id="sever">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Xác nhận</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              
                            </div>
                            <div class="modal-body">
                              <p>Lưu lại?</p> 
                              <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true" style="float: right; margin-left: 5px;">Đóng</button>
                              <a href="danhsachnhapvien.php"><button type="submit" class="btn btn-success " style="float: right;">Lưu</button></a>
                            </div>
                            </div>
                          </div>
                       </div>
      <div class="modal fade" id="delete">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Xác nhận</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              
                            </div>
                            <div class="modal-body">
                              <p>Bạn có thực sự muốn hủy bỏ thông tin thuốc nhập vào?</p>    
                              <a href="benhan.php"><button type="submit" class="btn btn-danger " style="float: right;">Xóa</button></a>
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
 ?>
          <div class="page-content">
                <div class="card card-default widget">
                  <div class="card-body">
                      <div class="panel panel-default" style="margin-top: 20px;">
                      <h3 style="padding-bottom: 10px;">BỆNH ÁN</h3>
                        <form action="" method="POST" role="form">
                          <div class="col-md-3" style="float: left;">
                            <div class="form-group">
                              <label for="">Ngày thực hiện:</label>
                              <input name="ngaythuchien" type="date" class="form-control" id="today" placeholder="">
                            </div>
                            <div class="form-group">
                              <label for="">Mã bệnh nhân:</label>
                              <input value="<?php echo $id_bn ?>" type="text" class="form-control" id="" placeholder="">
                            </div>
                           
                          </div>
                          
                          <div class="col-md-3" style="float: left;">
                            <div class="form-group">
                              <label for="">Họ Tên:</label>
                              <input value="<?php echo $hoten_bn ?>" type="text" class="form-control" id="" placeholder="">
                            </div>
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
                          </div>
                          
                          <div class="col-md-3" style="float: left;">
                            <div class="form-group">
                              <label style="" for="">Số bệnh án:</label>
                              <input value="<?php echo $id_ba ?>" type="text" class="form-control" id="" placeholder="">
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
                          <?php 

                           ?>
                          <div class="col-md-3" style="float: left;">
                           <?php 
                              $query_show_dichvu = mysqli_query($conn,"SELECT dv.id,dv.tendichvu,dv.gia,k.tenkhoa as 'khoa' FROM khoa k join dichvu dv on dv.khoa = k.id");

                             ?>                    
                                <div class="form-group">
                                  <label for="">Dịch vụ</label>
                                  <select name="dichvu_select" style="width: 95%;padding: 10px;margin-right: 10px;">
                                    <?php foreach ($query_show_dichvu as $show_dv) :?>
                                      <option value="<?php echo $show_dv['id']; ?>"><?php echo $show_dv['tendichvu']; ?></option>
                                    <?php endforeach; ?>
                                  </select>
                                </div>
                        
                                <?php 
                          $query_show_bacsi = mysqli_query($conn,"SELECT id,hoten FROM bacsi");

                         ?> 
                        <div class="form-group">
                          <label for="">Bác sĩ thực hiện</label>
                          <select name="bacsi_select" style="width: 95%;padding: 10px;margin-right: 10px;">
                              <?php foreach ($query_show_bacsi as $show_bacsi) :?>
                              <option value="<?php echo $show_bacsi['id']; ?>"><?php echo $show_bacsi['hoten']; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                             <div class="text-right">
                              <button type="submit" class="btn btn-success" name="themdichvu" onclick="alert('Thêm mới dịch vụ thành công!!!');tai_lai_trang()">Thêm dịch vụ</button>
                             </div>
                             <div>
                              <br>
                              <br>
                              <br>
                             </div>
                          </div>
                        </form>

                          
                          <h3>DỊCH VỤ ĐÃ CHỌN</h3>
                          <br>
                          <div class="table_show">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>Mã dịch vụ</th>
                                  <th>Ngày thực hiện</th>
                                  <th>Tên dịch vụ</th>
                                  <th>Giá VND</th>
                                  <th>Bác sĩ thực hiện</th>
                                  <th></th>
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
                                  <td><?php echo $dvtbn['bacsithuchien']; ?></td>
                                  <td><a href="control/delete_dichvu.php?id=<?php echo $dvtbn['id']; ?>" class="btn btn-danger del_dv">Xóa</a></td>
                                </tr>
                              <?php endforeach; ?>
                              </tbody>
                            </table>
                          </div>
                          <!-- <p class="text-right" style="margin-top: 15px;">Tổng tiền: <b>2.550.000</b> VND</p> -->
                      </div>
                  </div>
                </div>
                <script type="text/javascript">
                  document.querySelector("#today").valueAsDate = new Date();
                </script>
                <script>
                function tai_lai_trang(){
                  location.reload();
                }
              </script>
              
<?php 
  require_once('header-footer/footer.php');
 ?>
<script type="text/javascript">
                $(document).on('click','.del_dv',function(e){
                  e.preventDefault(); // return false
                  var href = $(this).attr('href');
                   $.ajax({
                    url: href,
                    type:'GET',
                    success:function(res){
                     swal({
                         title: 'Xóa bệnh nhân?',
                         text: "Xác nhận xóa vĩnh viễn bệnh nhân?",
                         type: 'warning',
                         showCancelButton: true,
                         confirmButtonColor: '#3085d6',
                         cancelButtonColor: '#d33',
                         confirmButtonText: 'Đồng ý!'
                       }).then((result) => {
                         if (result.value) {
                           swal(
                             'Hoàn tất!',
                             'Xóa thành công!!!',
                             'success'
                           )
                         }
                       });
                       $('.table_show').load(location.href + ' .table_show');
                    }
                  });
                  
                });
              </script>