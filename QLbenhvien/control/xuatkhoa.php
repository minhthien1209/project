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

  $query_select_ba = mysqli_query($conn,"SELECT ba.id, bn.id as 'mabenhnhan', k.tenkhoa as 'khoa', p.tenphong as 'phong',bs.id as 'id_bs', bs.hoten as 'bacsi',ba.benhchuandoan FROM benhnhan bn join ( khoa k join (phong p join (bacsi bs join benhan ba on bs.id = ba.bacsi) on p.id = ba.phong )on k.id = ba.khoa) on bn.id = ba.mabenhnhan WHERE mabenhnhan = $id_benhnhan");
      foreach ($query_select_ba as $benhan_show) {
        $id_ba = $benhan_show['id'];
        $khoa = $benhan_show['khoa'];
        $phong = $benhan_show['phong'];
        $id_bs = $benhan_show['id_bs'];
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




$sql_ins_xuatkhoa = mysqli_query($conn,"INSERT INTO xuatkhoa(ngayxuatvien,benhnhan,benhan,nguoinha,diachi,sothebhyt,chinhsach,benhchuandoan,bacsidieutri,chiphiravien) VALUES ('$today','$id_benhnhan','$id_ba','$id_nh','$diachi','$sothebhyt','$chinhsach','$benhchuandoan','$id_bs','$tongchiphi')");
$delete_dvtbn = mysqli_query($conn,"DELETE FROM dichvutheobenhnhan WHERE mabenhan= $id_ba");
$delete_thuoctheobenhnhan = mysqli_query($conn,"DELETE FROM thuoctheobenhnhan WHERE mabenhan= $id_ba");
$delete_thuocbhyttheobenhnhan = mysqli_query($conn,"DELETE FROM thuocbhyttheobenhnhan WHERE mabenhan= $id_ba");
    $query_delete_ba = mysqli_query($conn,"DELETE FROM benhan WHERE mabenhnhan= $id_bn");
      if ($query_delete_ba) {
        $query_delete_bn = mysqli_query($conn,"DELETE FROM benhnhan WHERE id= $id_bn");
        if ($query_delete_bn) {
          $query_delete_nh = mysqli_query($conn,"DELETE FROM nguoinha WHERE id= $id_nh");
          header('location: ../danhsachnhapvien.php');
          }
        }
?>