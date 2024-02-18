<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản Lý Bán Hàng</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.0/css/all.min.css" integrity="" crossorigin="anonymous"/>
	<link rel="stylesheet" type="text/css" href="css/themkh.css">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	
	<div class="header">
			<div class="logo">
				<a href="index.php"><img src="img/logo.png"></a>
			</div>
			<div class="main-menu">
				<ul class="nav-link">
					<li><a href="index.php?action=nhanvien">Nhân Viên</a>
					</li>
					<li><a href="index.php?action=khachhang">Khách Hàng</a>
					</li>
					<li><a href="index.php?action=sanpham">Sản Phẩm</a></li>
					<li><a href="index.php?action=user">User</a></li>
					<li><a href="index.php?action=loaisanpham">Loại Sản Phẩm</a></li>
				</ul>
			</div>
	</div>
<content>
	<div class="Them">
		<form method="post">
			<input type="text" name="tensp" placeholder="Tên Sản Phẩm">
			<input type="text" name="chatlieu"placeholder="Chất Liệu">
			<input type="text" name="mau"placeholder="Màu Sắc">
			<br>
			<input type="number" name="gia" placeholder="Giá">
			<input type="text" name="mota"placeholder="Mô tả.."><br>
			<input type="date" name="ngay"placeholder="">
			<input type="text" name="hinhanh"placeholder="Hình ảnh">
			<input type="submit" value="Thêm" name="them">
			<a href="index.php?action=quanlytong">Quản Lý</a>
		</form>
	</div>
 </content>
</body>
 </html>