
 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Demo</title>
 </head>
 <body>
   <?php 
  $conn = mysqli_connect('localhost','root','','benhnhannoitru');
  mysqli_set_charset($conn,'utf8');
  $query_layidnguoinha = mysqli_query($conn,"SELECT MAX(id) FROM nguoinha");
       if ($query_layidnguoinha)  : ?>
      <?php foreach ($query_layidnguoinha as $id) : ?>
            <?php $idnguoinha = $id['MAX(id)']; ?>

            <button type=""><?php echo $idnguoinha; ?></button> 

       <?php endforeach; ?>
    <?php endif; ?>


  <?php 
  
  $conn = mysqli_connect('localhost','root','','benhnhannoitru');
  mysqli_set_charset($conn,'utf8');
  // $id_benhnhan = $_GET['id'];

    $query_select_ba = mysqli_query($conn,"SELECT ba.id, bn.id as 'mabenhnhan', k.tenkhoa as 'khoa', p.tenphong as 'phong', bs.hoten as 'bacsi',ba.benhchuandoan FROM benhnhan bn join ( khoa k join (phong p join (bacsi bs join benhan ba on bs.id = ba.bacsi) on p.id = ba.phong )on k.id = ba.khoa) on bn.id = ba.mabenhnhan WHERE mabenhnhan = $id_benhnhan");
      foreach ($query_select_ba as $benhan_show) {
        $id_ba = $benhan_show['id'];
        $khoa = $benhan_show['khoa'];
        $phong = $benhan_show['phong'];
        $bacsi = $benhan_show['bacsi'];
        $benhchuandoan = $benhan_show['benhchuandoan'];
      } 
  $query_select_bn = mysqli_query($conn,"SELECT bn.id,bn.ngaynhapvien,bn.hoten,bn.gioitinh,bn.ngaysinh,bn.diachi,bn.sdt,bn.quoctich,bn.dantoc,bn.socmnd,bn.sothebhyt,bn.chinhsach,nh.id as 'id_nh',nh.hoten as 'nguoinha', nh.gioitinh as 'goitinh_nh', nh.sdt as 'sdt_nh', nh.diachi as 'diachi_nh', nh.quanhe as 'quanhe' from benhnhan bn join nguoinha nh on bn.nguoinha = nh.id WHERE bn.id = 3");
  foreach ($query_select_bn as $bn_nh) {
      $ten_benhnhan = $bn_nh['hoten'];
      $ten_nguoinha = $bn_nh['nguoinha'];
      $goitinh_nh = $bn_nh['goitinh_nh'];
  }


  // if (isset($_POST['chinhsuabenhnhan'])) {
  //   // $query_update = mysqli_query($conn,"UPDATE benhnhanSET socmnd='1111444477', sothebhyt='55555' WHERE id=47;");
  //   }

 ?>
 <form action="" method="POST" role="form">
   <legend>Form title</legend>
 
   <div class="form-group">
     <h1 for="">tenbenhnha</h1>
     <input value="<?php echo $ten_benhnhan ?>" type="" class="form-control" id="" >
   </div>
    <div class="form-group">
     <h1 for="">tennguoinha</h1>
     <input value="<?php echo $bacsi ?>" type="" class="form-control" id="" >
   </div>

   <div class="form-group">
    <label for="">Giới tính</label>
    <select name="goitinh_nguoinha" style="width: 95%;padding: 10px;margin-right: 10px; margin-bottom: 5px;">
        <option value="Nam">Nam</option>
        <option value="Nữ">Nữ</option>
        <option value="Khác">Khác</option>
    </select>
  </div>
 
   
 
   <button type="submit" class="btn btn-primary">Submit</button>
 </form>
 </body>
 </html>