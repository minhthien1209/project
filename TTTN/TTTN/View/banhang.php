<content>
	<div id="hang">
		<div class="top">
			<div class="banhang-top">
				<h3>DANH SÁCH ĐƠN HÀNG</h3>
				<a href="?muc=banhang&them"><i class="fas fa-shopping-cart"></i>Bán Hàng</a>
			</div>
			<div style="clear: left;"></div>
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<input class="form-control" id="myInput" type="text" placeholder="Nhập tên khách hàng">
					</div>
					<div class="col-sm-4"></div>
					<div class="col-sm-4">
						<div class="quy">
							<form method="post">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text"><button type="submit" name="ngay" href="">Ngày</button></span>
										<span class="input-group-text"><button type="submit" name="thang" href="">Tháng</button></span>
										<span class="input-group-text" style="border-top-right-radius: 3px;border-bottom-right-radius: 3px;"><button type="submit" name="nam" href="">Năm</button></span>
									</div>
								</div>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
		<div class="main-content">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th></th>
						<th>STT</th>
						<th>Tên Nhân Viên</th>
						<th>Tên Khách</th>
						<th>Ngày Bán</th>
						<th>Tổng Tiền</th>

					</tr>
				</thead>
				<tbody id="myTable">
					<?php
					$i = 0;
					if ($hoadonban != 0) {
						foreach ($hoadonban as $value) {
							$i++;
					?>
							<tr>
								<form method="post">
									<td><i id="them" href="#" data-target="#login<?php echo $i; ?>" data-toggle="modal" class="fa fa-plus-circle btn btn-primary login-trigger"></i></td>
									<td><?php echo $i; ?>
										<input hidden name="id" value="<$value['id_user']; ?>">
									</td>
									<td>
										<?php foreach ($nhanvien as $key) {
											if ($value['id_nv'] == $key['id_nv']) {
										?>
												<p><?php echo $key['tennv']; ?></p>
										<?php
											}
										} ?>
									</td>
									<td>
										<?php foreach ($khachhang as $key) {
											if ($value['id_k'] == $key['id_k']) {
										?>
												<span><?php echo $key['tenk']; ?></span>
										<?php
											}
										} ?>
									</td>
									<td>
										<input type="date" value="<?php echo $value['ngayban']; ?>" name="">
									</td>

									<!-- <td>
			<input type="date" value="<?php echo $value['donvi']; ?>" name="">
		</td> -->
									<td>
										<p><?php echo $value['tongtien'] . '000VNĐ'; ?></p>
									</td>
								</form>
							</tr>
					<?php }
					}
					?>

				</tbody>
			</table>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$("#myInput").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("#myTable tr").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});
		});
	</script>
</content>
<?php $i = 0;
if ($hoadonban != 0) {
	# code...
	foreach ($hoadonban as $key) {
		$i++; ?>

		<!--- pop-up --->
		<div id="chitiethoadon">
			<div class="form">
				<div id="login<?php echo $i; ?>" class="modal fade" role="dialog">
					<div class="modal-dialog" style="max-width: 700px;">
						<div class="modal-content">
							<div class="modal-body">
								<button data-dismiss="modal" class="close">&times;</button>
								<h3 style="text-align: center;">Chi Tiết Hóa Đơn</h3>
								<table class="table table-hover">
									<thead>
										<tr>
											<th style="width: 80px;">STT</th>
											<th>Tên Sản Phẩm</th>
											<th>Số Lượng</th>
											<th>Đơn vị</th>
											<th>Giá</th>
											<th>Thành Tiền</th>
										</tr>
									</thead>
									<tbody>
										<?php $j = 0;
										foreach ($chitietban as $va) {
											if ($key['id_hd'] == $va['id_hd']) {
												$j++; ?>
												<tr>
													<td><?php echo $j; ?></td>
													<td>
														<p><?php
															foreach ($sanpham as $ke) {
																if ($ke['id_sp'] == $va['id_sp']) {
																	echo $ke['tensp'];
																}
															} ?>
														<p>
													</td>
													<td>
														<p><?php echo $va['soluong']; ?>
														<p>
													</td>
													<td>
													<?php
															foreach ($sanpham as $ke) {
																if ($ke['id_sp'] == $va['id_sp']) {
																	echo $ke['donvi'];
																}
															} ?>
													</td>

													<td>
														<p><?php echo $va['giatien'] . '000VNĐ'; ?></p>
													</td>
													<td>
														<p><?php echo ($va['soluong'] * $va['giatien']) . '000VNĐ'; ?></p>
													</td>

												</tr>
										<?php
											}
										}
										?>

									</tbody>
								</table>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php
	}
} ?>

<!--- end pop-up --->
</div>
</div>