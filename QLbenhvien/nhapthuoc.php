<?php 
    require_once('header-footer/header.php');
 ?>
 <div class="modal fade" id="thanhtoan">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Xác nhận</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              
                            </div>
                            <div class="modal-body">
                              <p>Xác nhận thanh toán hóa đơn?</p>    
                              <a href="nhapthuoc.php"><button type="submit" class="btn btn-info" style="float: right; ">Đồng ý</button></a>
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
                              <p>Không thanh toán hóa đơn?</p>    
                              <a href="nhapthuoc.php"><button type="submit" class="btn btn-danger " style="float: right;">Không thanh toán</button></a>
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
                  <li class="nav-item"><a class="nav-link" href="xuatkhoa.php">+ Xuất khoa</a></li>
                  <li class="nav-item"><a class="nav-link" href="danhsachxuatkhoa.php">+ Danh sách xuất khoa</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-container dropdown-toggle" data-toggle="collapse" data-parent="#sidebar-stacked" href="#p4">
                  <i class="ion"><img src="img/icon/glyphicons-228-usd.png" style="width:12px;" alt=""></i> <span class="nav-text">Viện phí</span>
                </a>
                <ul class="nav nav-pills nav-stacked collapse" id="p4">
                  <li class="nav-item"><a class="nav-link" href="thanhtoankhongbaohiem.php">+ Xác nhận thanh toán nội trú</a></li>
                  <li class="nav-item"><a class="nav-link" href="thanhtoancobaohiem.php">+ Xác nhận BHYT nội trú</a></li>
                </ul>
                <li class="nav-item">
                <a class="nav-container dropdown-toggle" data-toggle="collapse" data-parent="#sidebar-stacked" href="#p8">
                  <i class="ion"><img src="img/icon/glyphicons-629-doctor.png" style="width:16px;" alt=""></i> <span class="nav-text">Quản lý thuốc</span>
                </a>
                <ul class="nav nav-pills nav-stacked " id="p8">
                  <li class="nav-item active"><a class="nav-link" href="nhapthuoc.php">+ Nhập thuốc</a></li>
                  <li class="nav-item"><a class="nav-link" href="danhsachthuoc.php">+ Danh sách thuốc</a></li>
                </ul>
              	</li>
              	<li class="nav-item">
                <a class="nav-link" href="danhsachbacsi.php"><i class="ion"><img src="img/icon/glyphicons-595-stethoscope.png" style="width:16px;" alt=""></i> <span class="nav-text">Danh sách bác sĩ</span></a>
              </li>
            </ul>
          </div>
          <div class="page-content">
            <div class="row">
                <div class="card card-default widget">
                  <div class="card-heading">
                    <h3 class="card-title">NHẬP THUỐC</h3>
                  </div>
                  <div class="card-body col-md-12">
                    <div class="col-md-6" style="float: left;">
                      <form action="" method="POST">
                        <legend>Thuốc có sẵn</legend>
                      
                        <div class="form-group">
                          <select name="" style="width: 95%;padding: 10px;margin-right: 10px; margin-bottom: 5px;">
                              <option value="dht">Thuốc 1</option>
                              <option value="dht">Thuốc 2</option>
                              <option value="dht">Thuốc 3</option>
                              <option value="dht">Thuốc 4</option>
                              <option value="dht">Thuốc 5</option>
                          </select>
                          <input type="number" style="width: 95%;padding: 7.5px 10px;margin-right: 10px;margin-bottom: 5px;" placeholder="SL">
                          <select name="" style="width: 95%;padding: 10px;margin-right: 10px; margin-bottom: 5px;">
                              <option value="dht">Nhà phân phối 1</option>
                              <option value="dht">Nhà phân phối 2</option>
                              <option value="dht">Nhà phân phối 3</option>
                              <option value="dht">Nhà phân phối 4</option>
                              <option value="dht">Nhà phân phối 5</option>
                          </select> 
                          <div class="text-right" style="width: 95%;">
                            <a href="" class="btn btn-info">+</a>
                          </div>
                        </div>
                      </form>
                      <form action="" method="POST" role="form">
                        <legend>Thuốc BHYT sẵn</legend>
                      
                        <div class="form-group">
                          <select name="" style="width: 95%;padding: 10px;margin-right: 10px; margin-bottom: 5px;">
                              <option value="dht">Thuốc 1</option>
                              <option value="dht">Thuốc 2</option>
                              <option value="dht">Thuốc 3</option>
                              <option value="dht">Thuốc 4</option>
                              <option value="dht">Thuốc 5</option>
                          </select>
                          <input type="number" style="width: 95%;padding: 7.5px 10px;margin-right: 10px;margin-bottom: 5px;" placeholder="SL">
                          <select name="" style="width: 95%;padding: 10px;margin-right: 10px; margin-bottom: 5px;">
                              <option value="dht">Nhà phân phối 1</option>
                              <option value="dht">Nhà phân phối 2</option>
                              <option value="dht">Nhà phân phối 3</option>
                              <option value="dht">Nhà phân phối 4</option>
                              <option value="dht">Nhà phân phối 5</option>
                          </select> 
                          <div class="text-right" style="width: 95%;">
                            <a href="" class="btn btn-info">+</a>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="col-md-6" style="float: left;">
                      <form action="" method="POST">
                        <legend>Thuốc mới</legend>
                      
                        <div class="form-group">
                          <input type="" style="width: 95%;padding: 7.5px 10px;margin-right: 10px;margin-bottom: 5px;" placeholder="Tên thuốc...">
                          <div class="col-md-12" style="padding-left: 0;">
                            <input type="number" style="width: 47.5%;padding: 7.5px 10px;margin-right: 10px;margin-bottom: 5px; float: left;" placeholder="SL">
                            <input type="" style="width: 47.5%;padding: 7.5px 10px;margin-right: 10px;margin-bottom: 5px;float: left;" placeholder="Giá...">
                          </div> 
                          <select name="" style="width: 95%;padding: 10px;margin-right: 10px; margin-bottom: 5px;">
                              <option value="dht">Nhà phân phối 1</option>
                              <option value="dht">Nhà phân phối 2</option>
                              <option value="dht">Nhà phân phối 3</option>
                              <option value="dht">Nhà phân phối 4</option>
                              <option value="dht">Nhà phân phối 5</option>
                          </select>
                          <div class="text-right" style="width: 95%;">
                            <a href="" class="btn btn-info">+</a>
                          </div>
                        </div>
                      </form>
                      <form action="" method="POST" role="form">
                        <legend>Thuốc BHYT mới</legend>
                      
                        <div class="form-group">
                          <select name="" style="width: 95%;padding: 10px;margin-right: 10px; margin-bottom: 5px;">
                              <option value="dht">Thuốc 1</option>
                              <option value="dht">Thuốc 2</option>
                              <option value="dht">Thuốc 3</option>
                              <option value="dht">Thuốc 4</option>
                              <option value="dht">Thuốc 5</option>
                          </select>
                          <input type="number" style="width: 95%;padding: 7.5px 10px;margin-right: 10px;margin-bottom: 5px;" placeholder="SL">
                          <select name="" style="width: 95%;padding: 10px;margin-right: 10px; margin-bottom: 5px;">
                              <option value="dht">Nhà phân phối 1</option>
                              <option value="dht">Nhà phân phối 2</option>
                              <option value="dht">Nhà phân phối 3</option>
                              <option value="dht">Nhà phân phối 4</option>
                              <option value="dht">Nhà phân phối 5</option>
                          </select> 
                          <div class="text-right" style="width: 95%;">
                            <a href="" class="btn btn-info">+</a>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

            <div class="card card-default widget col-md-12" style="margin-top: -30px;">
                  <div class="card-body">
                    <form action="" method="POST" role="form">
                        <h3 style="margin-top : 25px;">Danh sách thuốc nhập</h3>
                        <div class="thuoc">
                          <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Tên thuốc</th>
                                  <th>Loại thuốc</th>
                                  <th>Số lượng</th>
                                  <th>Giá tiền Vỉ/Lọ</th>
                                  <th>Đối tác cũng cấp</th>
                                  <th>Thành tiền VND</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td>HAHAHAHA</td>
                                  <td>Thuốc tiêm</td>
                                  <td>250</td>
                                  <td>7.500</td>
                                  <td>Cty cp aaaa</td>
                                  <td>1.875.000</td>
                                </tr>
                                <tr>
                                  <td>2</td>
                                  <td>HEHEHEHEHE</td>
                                  <td>Thuốc uống</td>
                                  <td>570</td>
                                  <td>2.700</td>
                                  <td>Cty cp aaaa</td>
                                  <td>1.539.000</td>
                                </tr>
                                <tr>
                                  <td>3</td>
                                  <td>HIHIHIHI</td>
                                  <td>Thuốc BHYT</td>
                                  <td>1200</td>
                                  <td>0</td>
                                  <td>Cty cp aaaa</td>
                                  <td>0</td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="tong" style="margin-top: 20px;margin-bottom: 20px;">
                          <h3 class="text-right">Tổng chi phí nhập thuốc:</h3>
                          <h2 class="text-right" style="color: #2E2EFE">3.414.000<span> VND</span></h2>
                        </div>

                      <div class="text-right">
                        <a href="#thanhtoan" data-toggle="modal" style="text-decoration: none; color: #fff;"><button type="submit" class="btn btn-success" style="margin: 10px 5px 0 0;">Thanh toán</button></a>
                         <a href="#delete" data-toggle="modal" style="text-decoration: none; color: #fff;"><button type="submit" class="btn btn-danger" style="margin: 10px 5px 0 0;">Hủy bỏ</button></a>
                      </div>
                   </form>
                  </div>
                </div>
<?php 
  require_once('header-footer/footer.php');
 ?>

