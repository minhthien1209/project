<content>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-8">
        <a class="login-trigger" id="themhoadon" href="#" data-target="#login" data-toggle="modal">Thêm Sản Phẩm</a>
        <!--- pop-up --->
        <div id="ndung">
          <div class="form">
            <div id="login" class="modal fade" role="dialog">
              <div class="modal-dialog" style="max-width: 500px;">
                <div class="modal-content">
                  <div class="modal-body">
                    <h2 style="text-align: center;">Tìm Kiếm Sản Phẩm</h2>
                    <input class="form-control" id="myInput" type="text" placeholder="Nhập sản phẩm cần tìm kiếm">
                    <table id="seach" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>STT</th>
                          <th>Tên Sản Phẩm</th>
                          <th>Đơn vị</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody id="myTable">
                        <?php
                        $dem = 0;
                        foreach ($sanpham as $value) {
                          $dem++;
                        ?>
                          <tr>
                            <form method="post">
                              <td style="width: 70px">
                                <?php echo $dem; ?>
                              </td>
                              <input type="" hidden name="id_sp" value="<?php echo $value['id_sp']; ?>">
                              <td>
                                <span><?php echo $value['tensp']; ?></span>
                                <input hidden type="" name="tensp" value="<?php echo $value['tensp']; ?>">
                              </td>
                              <td>
                                <span><?php echo $value['donvi']; ?></span>
                                <input hidden type="" name="donvi" value="<?php echo $value['donvi']; ?>">
                              </td>
                              <td><button type="submit" name="them"><i class="fas fa-plus-circle"></i></button>
                              </td>
                            </form>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--- end pop-up --->
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tên</th>
              <th style="width: 100px">SL</th>
              <th style="width: 140px">Giá</th>
              <th style="width: 140px">Tiền</th>
              <th style="width: 140px">Đơn vị</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $tong = 0;
            if (isset($_SESSION['cartnhap'])) {
              $i = 0;
              foreach ($_SESSION['cartnhap'] as $key => $val) {
                $i++;
                $tong += (float)$val['gia'] * (float)$val['sl'];
            ?>
                <form method="post">
                  <tr>
                    <td>
                      <?php echo $i; ?>
                      <input hidden name="id" value="<?php echo $key ?>">
                    </td>
                    <td><?php echo $val['tensp']; ?></td>
                    <td><input type="text" id="sl_<?php echo $i ?>" class="sl" name="sl" value="<?php echo $val['sl']; ?>" onchange="valueHandle(<?php echo $i ?>)"></td>
                    <td><input type="text" id="gia_<?php echo $i ?>" name="gia" class="gia" value="<?php echo $val['gia'] . '000VNĐ'; ?>" readonly>
                    </td>
                    <td><input type="text" id="tongtien_<?php echo $i ?>" class="tien" value="<?php echo (float)$val['gia'] * (float)$val['sl'] . '000VNĐ'; ?>" readonly></td>
                    <td><input type="text" id="donvi_<?php echo $i ?>" class="donvi" name="donvi" value="<?php echo $val['donvi']; ?>"></td>

                    <td>
                      <button type="submit" name="xoa" onclick="return confirm('Bạn Có Muốn Xóa <?php echo $val['tensp'];  ?> ?');"><i class="fas fa-trash-alt"></i></button>
                      <button type="submit" onclick="return confirm('Bạn Có Muốn Sửa ?');" name="sua"><i class="fas fa-edit"></i></button>
                    </td>
                  </tr>
                </form>
            <?php
              }
            }
            ?>


          </tbody>
        </table>
      </div>
      <div class="col-sm-4" id="getId" data-value="<?php echo $i; ?>">
        <form method="post" class="form-add">
          <div class="khachhang">
            <h3><i class="fa fa-info-circle"></i>Thông tin hệ thống</h3>
            <br>
            <label>Nhân Viên</label>
            <select name="id_nv">
              <option value="<?php $_SESSION['nhanvien'][0]['id_nv'] ?>"><?php echo $_SESSION['nhanvien'][0]['tennv']; ?></option>
            </select>
          </div>
          <div class="donhang">
            <h3><i class="fa fa-info-circle"></i>Thông tin hóa đơn</h3>
            <p id="tongtien1">Tiền Hàng
              <?php echo $tong . "000VNĐ" ?>
            </p> <input type="text" hidden class="tongtien" name="tien" value="<?php $tam = 0;
                                                                                if (isset($_SESSION['cartnhap'])) {
                                                                                  foreach ($_SESSION['cartnhap'] as $key => $val) {
                                                                                    $tam += $val['sl'] * $val['gia'];
                                                                                  }
                                                                                  echo $tam;
                                                                                } ?>">
            <!-- <label>Khách Trả </label><input  onchange="nhap();" type="number" min="0" class="dl" name="">
           <p >Trả Lại <span id="LL" ></span></p> -->
            <button type="submit" name="adhang" class="addhang"><i class="fa fa-plus-circle"></i> Thêm</button>
            <button type="submit" class="back" name="back"><i class="fa fa-undo"></i>Quay Lại</button>
          </div>
        </form>
      </div>
    </div>
    <script>
      // function nhap() {
      //     $("#LL").html($('.dl').val()-$('.tongtien').val()+'000VNĐ'); 
      // }
      $(document).ready(function() {
        $("#myInput").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
      var id = document.getElementById('getId').dataset.value;

      function valueHandle(index) {
        var soluong = parseFloat(document.getElementById("sl_" + index).value)
        var gia = parseFloat(document.getElementById("gia_" + index).value)
        if (!isNaN(soluong) && !isNaN(gia)) {
          var tongtien = soluong * gia
          document.getElementById("tongtien_" + index).value = tongtien + "VNĐ"
          var tongall = 0;
          if (parseInt(id) > 1) {
            for (var i = 1; i <= parseInt(id); i++) {
              var tongBanDau = parseFloat(document.getElementById('sl_' + i).value) * parseFloat(document.getElementById('gia_' + i).value);
              tongall += tongBanDau
            }
            document.getElementById("tongtien1").innerHTML = "Tiền hàng: " + tongall + "VNĐ"

          } else if (parseInt(id) === 1) {
            document.getElementById("tongtien1").innerHTML = "Tiền hàng: " + tongtien + "VNĐ"
          }
        } else {
          document.getElementById("tongtien").value = 0 + "VNĐ"
        }
      }
    </script>
  </div>
</content>