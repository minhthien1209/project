<header>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3">
				<div class="logo">
					<a href="index.php"></a>
				</div>
			</div>
			<div class="col-sm-6">

			</div>
			<div class="col-sm-3">
				<div class="dropdown">
					<button type="button" class="lo" data-toggle="dropdown">
						<div class="login">
							<img src="img/<?php echo $_SESSION['nhanvien'][0]['hinhanh'] ?>" width="50px" height="50px">
							<span>
								<?php echo $_SESSION['nhanvien'][0]['tennv']; ?>
							</span>
						</div>
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="?muc=taikhoan">Quản Lý</a>
						<form method="post">
							<input type="submit" value="Đăng xuất" name="dangxuat">
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
</header>