<content>
		<div class="container">   
		<div class="top-sp">
		<input class="form-control" id="myInput" type="text" placeholder="Nhập tài khoản cần tìm kiếm"> 
		<?php 	if ($kt!=0) {
			?>
				<a class="login-trigger" id="them" href="#" data-target="#login" data-toggle="modal">Thêm User</a>
			<?php
		} ?>
	</div>  
		  <!--- pop-up --->
		<div id="ndung">
		  <div class="form">
		   <div id="login" class="modal fade" role="dialog">
		      <div class="modal-dialog" style="max-width: 300px;">
		        <div class="modal-content">
		          <div class="modal-body">
		            <form method="post">
		            <button data-dismiss="modal" class="close">&times;</button>
		            <h4>Thêm Tài Khoản</h4>
		            	<div class="container">
		            		<input type="text" class="tk" required onchange="check();" name="taikhoan" placeholder="Tài Khoản">
		            		<i class="fa fa-exclamation-circle" style="float: right; color:red;line-height: 40px"></i>
		            		<input type="text" class="mk" required name="matkhau" placeholder="Mật Khẩu">
		            		<select name="id_nv">
								<?php foreach ($kt as $key) {
									 	?>
											<option value="<?php 	echo $key['id_nv']; ?> ">
												<?php 	echo $key['tennv']; ?>
											</option>
										<?php
								}
								 ?>
							</select>
							<select name="level" id="">
								<option value="1">Quản Lý</option>
								<option value="2">Nhân Viên</option>
							</select>
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
        <th>Tài Khoản</th>
        <th>Mật Khẩu</th>
        <th>ID Nhân Viên</th>
        <th>Level</th>
        <th></th>
      </tr>
    </thead>
    <tbody id="myTable">
	<?php 
		$i=0;
		foreach ($user as $value) {	
		$i++;		
	?>
	<tr>
	<form method="post">
		<td><?php echo $i; ?>
		<input hidden name="id" value="<?php echo $value['id_user']; ?>">
		</td>
		<td>
			<span class="taikhoan" style="display: none;"><?php echo $value['taikhoan']; ?></span>
			<input required type=""  name="taikhoan" value="<?php echo $value['taikhoan']; ?>">
		</td>
		<td><input required type="" name="matkhau" value="<?php echo $value['matkhau']; ?>"></td>
		<td><select name="id_nv">
				<?php foreach ($nhanvien as $key) {
					 if ($value['id_nv']==$key['id_nv']) {
						?>
							<option value="<?php 	echo $key['id_nv']; ?> " selected>
								<?php 	echo $key['tennv']; ?>
							</option>
						<?php
					}else{
						?>
							<option value="<?php 	echo $key['id_nv']; ?> ">
								<?php 	echo $key['tennv']; ?>
							</option>
						<?php
					}
				}
				 ?>
			</select>
		</td>
		<td>
			<select name="level">
				<?php if ($value['level']==1) {
					?>
						<option value="1" selected>Quản Lý</option>
						<option value="2">Nhân Viên</option>
					<?php
				}else{
					?><option value="1">Quản Lý</option>
						<option value="2" selected>Nhân Viên</option>
					<?php
				}
				 ?>
			</select></td>
		<td><a href="?muc=user&idxoa=<?php echo $value['id_user']; ?>" name="xoa" onclick="return confirm('Bạn Có Muốn Xóa <?php echo $value['taikhoan'];  ?> ?');"><i class="fas fa-trash-alt"></i></a> 
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
		var x=$('.taikhoan');
		var dem=0;
		for (var i = 0; i < x.length; i++) {
			if ($('.tk').val()==x[i].innerHTML) {
				dem=1;
			}
		}
		if (dem!=0) {
			$('.fa-exclamation-circle').show();
			$('.tk').addClass('canhbao');
			$('.tk').val('');
		}
		else{
			$('.tk').removeClass ('canhbao');
			$(".fa-exclamation-circle").hide();
		}
	}
$(document).ready(function(){
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