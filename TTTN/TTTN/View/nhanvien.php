
<content>  
	<div class="container-fluid">   
		<div class="top-sp">
			<input class="form-control" id="myInput" type="text" placeholder="Nhập nhân viên cần tìm kiếm"> 
			<a class="login-trigger" id="them" href="#" data-target="#login" data-toggle="modal">Thêm Nhân Viên</a>
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
									<h4>Thêm Nhân Viên</h4>
									<div class="container">
										<label>Tên Nhân Viên</label><input required type="" class="ten" name="tennv" placeholder="Tên Nhân Viên"> <br>
										<label>Giới Tính</label><input required type="" name="gioitinh" placeholder="Giới Tính"> <br>
										<label>Ngày Sinh</label><input type="date" name="ngaysinh" placeholder="Ngày Sinh"> <br>
										<label>Địa Chỉ</label><input required type="" name="diachi" placeholder="Địa Chỉ"> <br>
										<label>SDT</label><input required type="" name="sdt" placeholder="SĐT"> <br>
										<label>Hình ảnh</label><input type="file" name="hinhanh"> <br>
									</div>
									<br>
									<input class="btn login" name="login" type="submit" value="Submit" />
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
					<th>Tên Nhân Viên</th>
					<th>Giới Tính</th>
					<th>Ngày Sinh</th>
					<th style="width: 150px;">Địa Chỉ</th>
					<th style="width: 150px;">SĐT</th>
					<th>Hình Ảnh</th>
					<th>Ngày Gia Nhập</th>
					<th></th>
				</tr>
			</thead>
			<tbody id="myTable">
				<?php 
				$dem=0;
				foreach ($nhanvien as $value) {			
					$dem++;		
					?>
					<tr>
						<form method="post">
							<td><?php echo $dem; ?>
								<input  type="" style="display: none;" name="id_nv" value="<?php echo $value['id_nv']; ?>">
							</td>
							<td style="width: 200px">
								<span style="display: none;"><?php echo $value['tennv']; ?></span>
								<input required id="ten" type="" name="tennv" value="<?php echo $value['tennv']; ?>"></td>
							<td><input required type="" name="gioitinh" value="<?php echo $value['gioitinh']; ?>"></td>
							<td><input type="date" name="ngaysinh" value="<?php echo $value['ngaysinh']; ?>"></td>
							<td><input required type="" name="diachi" value="<?php echo $value['diachi']; ?>"></td>
							<td><input required type="" name="sdt" value="<?php echo $value['sdt']; ?>"></td>
							<td><img src="img/<?php echo $value['hinhanh']; ?>" width=100px height=100px><input type="file" name="hinhanh">
								<input type="text" name="ha" hidden value="<?php echo $value['hinhanh']; ?>">
							</td>
							<td><input type="date" name="ngaygianhap" value="<?php echo $value['ngaygianhap']; ?>"></td>
							<td style="width: 107px;"><a href="?muc=nhanvien&idxoa=<?php echo $value['id_nv']; ?>" name="xoa" onclick="return confirm('Bạn Có Muốn Xóa <?php echo $value['tennv'];  ?> ?');"><i class="fas fa-trash-alt"></i></a> 
								<button type="submit" name="sua" onclick="return confirm('Bạn Có Muốn Sửa Không ?');"><i class="fas fa-edit"></i></button>
							</td>
						</form>
					</tr>
				<?php } ?>

			</tbody>
		</table>
	</div>
	<script>
	$(document).ready(function(){
		$("#myInput").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#myTable tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});
</script>

</content>