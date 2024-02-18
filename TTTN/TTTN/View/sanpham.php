<content>
	<div class="container">
		<div class="top-sp">
			<input class="form-control" id="myInput" type="text" placeholder="Nhập sản phẩm cần tìm kiếm">
			<a class="login-trigger" id="them" href="#" data-target="#login" data-toggle="modal">Thêm Sản Phẩm</a>
		</div>
		<!--- pop-up --->
		<div id="ndung">
			<div class="form">
				<div id="login" class="modal fade" role="dialog">
					<div class="modal-dialog" style="max-width: 500px;">
						<div class="modal-content">
							<div class="modal-body">
								<form method="post">
									<button data-dismiss="modal" class="close">&times;</button>
									<h4>Thêm Sản Phẩm</h4>
									<div class="container">
										<input type="" required name="tensp" onchange="check();" class="ten" placeholder="Tên Sản Phẩm"><i class="fa fa-exclamation-circle" style="float: right; color:red;line-height: 40px"></i><br>
										<select name="id_loaisp">
											<?php
											foreach ($loaisanpham as $value) {
												echo "<option value=" . $value['id_loaisp'] . ">" . $value['tenloaisp'] . "</option>";
											} ?>
										</select>
										<br>
										<input type="number" min="0" class="giaban" name="giaban" value="0" placeholder="Giá Bán"> <br>
										<input type="number" min="0" class="gianhap" name="gianhap" value="0" placeholder="Giá Nhập"> <br>
										<input type="text" class="gianhap" name="donvi" placeholder="Đơn vị"> <br>

										<br>
										<input type="file" name="hinhanh"> <br>
										<input type="" name="mota" placeholder="Mô tả">
									</div>
									<br>
									<button class="btn login" name="login" type="submit">Submit</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--- end pop-up --->
		<div style="clear: left;"></div>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên Sản Phẩm</th>
					<th>Loại Sản Phẩm</th>
					<th style="width: 100px">Giá Bán</th>
					<th style="width: 100px">Giá Nhập</th>
					<th style="width: 100px">Số Lượng</th>
					<th style="width: 110px;">Hình Ảnh</th>
					<th style="width: 110px;">Đơn vị</th>
					<th>Mô Tả</th>
					<th style="width: 62px"></th>
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
							<td>
								<p><?php echo $dem; ?></p><input type="" style="display: none;" name="id_sp" value="<?php echo $value['id_sp']; ?>">
							</td>
							<td>
								<span class="taikhoan" style="display: none;"><?php echo $value['tensp']; ?></span>
								<input type="" required name="tensp" value="<?php echo $value['tensp']; ?>">
							</td>
							<td>
								<select name="id_loaisp">
									<?php
									foreach ($loaisanpham as $key) {
										if ($key['id_loaisp'] == $value['id_loaisp']) {
									?>
											<option selected="selected" value="<?php echo $key['id_loaisp']; ?>"> <?php echo $key['tenloaisp']; ?></option>
									<?php
										} else {
											echo "<option value=" . $key['id_loaisp'] . ">" . $key['tenloaisp'] . "</option>";
										}
									} ?>
								</select>
							</td>
							<td><input type="number" name="giaban" min="0" value="<?php echo $value['giaban']; ?>"></td>
							<td><input type="number" name="gianhap" min="0" value="<?php echo $value['gianhap']; ?>"></td>
							<td><input type="number" name="soluong" value="<?php echo $value['soluong']; ?>"></td>
							<td><img src="img/<?php echo $value['hinhanh']; ?>" width=100px height=100px>
								<input type="file" name="hinhanh">
								<input type="text" name="ha" hidden value="<?php echo $value['hinhanh']; ?>">
							</td>
							<td><input type="" name="mota" value="<?php echo $value['donvi']; ?>"></td>
							<td><input type="" name="mota" value="<?php echo $value['mota']; ?>"></td>
							<td style="width: 100px;"><a href="?muc=sanpham&idxoa=<?php echo $value['id_sp'];  ?>" name="xoa" onclick="return confirm('Bạn Có Muốn Xóa <?php echo $value['tensp'];  ?> ?');"><i class="fas fa-trash-alt"></i></a>
								<button type="submit" name="sua" onclick="return confirm('Bạn Có Muốn Sửa Không ?');"><i class="fas fa-edit"></i></button>
							</td>
						</form>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<script>
		function check() {
			var x = $('.taikhoan');
			var dem = 0;
			for (var i = 0; i < x.length; i++) {
				if ($('.ten').val() == x[i].innerHTML) {
					dem = 1;
				}
			}
			if (dem != 0) {
				$('.fa-exclamation-circle').show();
				$('.ten').addClass('canhbao');
				$('.ten').val('');
			} else {
				$('.ten').removeClass('canhbao');
				$(".fa-exclamation-circle").hide();
			}
		}

		function checksp() {
			if ($('.giaban').val() <= $('.gianhap').val()) {
				var x = confirm("Điều Chỉnh Giá Bán");
				if (x) {
					return false;
				}
				return true;
			} else
				return true;
		}
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
</content>