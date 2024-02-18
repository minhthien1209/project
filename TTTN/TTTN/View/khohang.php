<content>
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="item-box">
					<div class="left-box">
						<i style="color: #3498db" class="fas fa-dolly"></i>
					</div>
					<div class="right-box">
						<?php
						$dem = 0;
						foreach ($sanpham as $key) {
							$dem += $key['soluong'];
						} ?><h2 style="color: #3498db"><?php echo $dem; ?></h2><?php
																																		?>
						<p>Sản Phẩm Tồn</p>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="item-box">
					<div class="left-box">
						<i style="color: #e67e22" class="fas fa-coins"></i>
					</div>
					<div class="right-box">
						<?php
						$dem = 0;
						foreach ($sanpham as $key) {
							if ($key['soluong'] > 0) {
								$dem += $key['gianhap'] * $key['soluong'];
							}
						}
						?><h2 style="color: #e67e22"><?php echo $dem . '000'; ?></h2><?php
																																				?>
						<p>Tổng Vốn Tồn</p>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="item-box">
					<div class="left-box">
						<i style="color: #e74c3c" class="fas fa-dollar-sign"></i>
					</div>
					<div class="right-box">
						<?php
						$dem = 0;
						foreach ($sanpham as $key) {
							if ($key['soluong'] > 0) {
								$dem += $key['giaban'] * $key['soluong'];
							}
						}
						?><h2 style="color: #e74c3c"><?php echo $dem . '000'; ?></h2><?php
																																				?>
						<p>Tổng Giá Trị Tồn</p>
					</div>
				</div>
			</div>
		</div>
		<div class="lockho">
			<input class="form-control" id="myInput" type="text" placeholder="Nhập sản phẩm cần tìm kiếm">
			<form method="post">
				<select name="id_loaisp">
					<?php
					if (isset($ky)) {
						foreach ($loaisanpham as $key) {
							if ($key['id_loaisp'] == $ky) {
					?>
								<option selected value="<?php echo $key['id_loaisp']; ?>">
									<?php echo $key['tenloaisp']; ?>
								</option>
							<?php
							} else {
							?>
								<option value="<?php echo $key['id_loaisp']; ?>">
									<?php echo $key['tenloaisp']; ?>
								</option>
							<?php
							}
							?>

						<?php
						}
					} else {
						foreach ($loaisanpham as $key) {
						?>
							<option value="<?php echo $key['id_loaisp']; ?>">
								<?php echo $key['tenloaisp']; ?>
							</option>
					<?php
						}
					}
					?>
				</select>
				<button type="submit" name="lockho"><i class="fas fa-search-plus"></i></button>
			</form>
		</div>

		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th style="width: 30px;">STT</th>
					<th>Tên Sản Phẩm</th>
					<th style="width: 100px;">Số Lượng</th>
					<th>Vốn Tồn Kho</th>
					<th>Giá Trị Tồn</th>
				</tr>
			</thead>
			<tbody id="myTable">
				<?php
				$dem = 0;
				foreach ($sanpham as $value) {
					if ($value['soluong'] > 0) {
						$dem++;
				?>
						<tr>
							<td>
								<p><?php echo $dem; ?></p>
							</td>
							<td>
								<span class="taikhoan"><?php echo $value['tensp']; ?></span>
							</td>
							<td>
								<span><?php echo $value['soluong']; ?></span>
							</td>
							<td>
								<span><?php echo $value['soluong'] * $value['gianhap'] . '000VNĐ'; ?></span>
							</td>
							<td>
								<span><?php echo $value['soluong'] * $value['giaban'] . '000VNĐ'; ?></span>
							</td>
						</tr>
				<?php }
				}
				?>
			</tbody>
		</table>
	</div>
	<script>
		$(document).ready(function() {
			$(".fa-exclamation-circle").hide();
			$("#myInput").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("#myTable tr").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});
		});
	</script>
	</div>
</content>