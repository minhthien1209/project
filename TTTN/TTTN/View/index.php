<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title></title>
	<!---  CDN BS4 CSS --->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<!--- CDN ICON Awesome css --->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.0/css/all.min.css" integrity=""
		crossorigin="anonymous" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	<?php
	// unset($_SESSION['tk']);
	if (isset($_SESSION['tk'])) {
		include_once 'header.php';
		?>
	<div class="main">
		<div class="left">
			<div class="nav">
				<ul>
					<li><a href="?muc=khachhang"><i class="fas fa-user-edit"></i>Khách Hàng</a></li>
					<?php if ($_SESSION['level'] == 1) {
						?>
					<li><a href="?muc=nhanvien"><i class="fas fa-user-shield"></i>Nhân Viên</a></li>
					<li><a href="?muc=user" onclick="test();"><i class="far fa-user-circle"></i>User</a></li>
					<?php
					} ?>
					<li><a href="?muc=sanpham"><i class="fas fa-box-open"></i>Sản Phẩm</a></li>
					<li><a href="?muc=loaisanpham"><i class="fab fa-dropbox"></i>Loại Sản Phẩm</a></li>
					<li><a href="?muc=banhang"><i class="fas fa-shopping-cart"></i>Bán Hàng</a></li>
					<li><a href="?muc=nhaphang"><i class="far fa-clipboard"></i>Nhập Hàng</a></li>
					<li>
						<a data-toggle="collapse" data-target="#demo"><i class="fas fa-chart-line"></i>Thống Kê</a>
					</li>
					<div id="demo" class="collapse">
						<li><a href="?muc=doanhthu&loai=chung"><i class="fas fa-dollar-sign"></i>Doanh Thu</a></li>
						<li><a href="?muc=doanhthu&loai=kho"><i class="fas fa-boxes"></i>Kho Hàng</a></li>
						<li><a href="?muc=doanhthu&loai=nhap"><i class="fas fa-shipping-fast"></i>Nhập Kho</a></li>
					</div>
				</ul>
			</div>
		</div>
		<div class="right">
			<?php
			if (isset($_GET['muc'])) {
				switch ($_GET['muc']) {
					case 'doanhthu': {
							switch ($_GET['loai']) {
								case 'chung': {
										require_once 'doanhthu.php';
										break;
									}
								case 'kho': {
										include_once 'khohang.php';
										break;
									}
								case 'nhap': {
										include_once 'baocaonhap.php';
										break;
									}
							}
							break;
						}
					case 'banhang': {
							if (isset($_GET['them'])) {
								include_once 'addhoadon.php';
							} else
								include_once 'banhang.php';
							break;
						}
					case 'nhaphang': {
							if (isset($_GET['them'])) {
								include_once 'addhoadonnhap.php';
							} else
								include_once 'nhaphang.php';

							break;
						}
					case 'sanpham': {
							include_once 'sanpham.php';
							break;
						}
					case 'taikhoan': {
							include_once 'taikhoan.php';
							break;
						}
					case 'nhanvien': {
							include_once 'nhanvien.php';
							break;
						}
					case 'loaisanpham': {
							include_once 'loaisanpham.php';
							break;
						}
					case 'khachhang': {
							include_once 'khach.php';
							break;
						}
					case 'user': {
							include_once 'user.php';
							break;
						}
				}
			} else {
				header('location: index.php?muc=banhang&them');
			}
			?>
		</div>
	</div>
	<?php } else
		include_once 'View/login.php';
	?>
</body>

</html>