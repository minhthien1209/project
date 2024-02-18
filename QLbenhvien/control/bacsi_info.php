<?php 
  $conn = mysqli_connect('localhost','root','','benhnhannoitru');
  mysqli_set_charset($conn,'utf8');
  $id = $_GET['id'];
  $query_show_bs = mysqli_query($conn,"SELECT bs.id,bs.hoten,bs.gioitinh,bs.sdt,k.tenkhoa as 'khoa' ,cv.tenchucvu as 'chucvu',bs.anh from khoa k join (bacsi bs join chucvu cv on bs.chucvu = cv.id ) on bs.khoa = k.id WHERE bs.id = $id");
  	foreach($query_show_bs as $bs) {
  		// $id = $bs['id'];
  		// $hoten = $bs['hoten'];
  		// $gioitinh = $bs['gioitinh'];
  		// $sdt = $bs['sdt'];
  		// $khoa = $bs['khoa'];
  		// $chucvu = $bs['chucvu'];
  		// $anh = $bs['anh'];
  	}
  	echo json_encode($bs);
 ?>