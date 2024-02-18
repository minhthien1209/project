<content>
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
			</div>
			<div class="col-sm-6">
				<div class="chonngay">
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
		<div class="row">

			<div class="col-sm-4">
				<div class="item-box">
					<div class="left-box">
						<i style="color: #3498db" class="fas fa-dollar-sign"></i>
					</div>
					<div class="right-box">
							<?php
						$dem1=0;
						if ($hoadonnhap!=0) {
						foreach ($hoadonnhap as $ke) {
							foreach ($chitietnhap as $value)
							{
								if ($ke['id_hd']==$value['id_hd']) {
										foreach ($sanpham as $key){
											if ($value['id_sp']==$key['id_sp']) {
												$dem1+=$key['giaban'] * $value['soluong'];
											}
										}			
								}
							}
						}
						?><h2 style="color: #3498db"><?php echo $dem1; ?></h2>
						<?php
					}
						else{
							?><h2 style="color: #3498db"><?php echo 0; ?></h2>
						<?php
						}
						 ?>
						<p>Tổng Doanh Thu Dự Kiến</p>
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
						$dem=0;
						if ($hoadonnhap!=0) {
						foreach ($hoadonnhap as $key) {
								$dem+=$key['tongtien'];
						}?><h2 style="color: #e67e22"><?php echo $dem; ?></h2><?php
						}
						else{
							?><h2 style="color: #e67e22"><?php echo 0; ?></h2><?php
						}
						?>
						<p>Tổng Vốn Nhập</p>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="item-box">
					<div class="left-box">
						<i style="color: #e74c3c" class="fas fa-piggy-bank"></i>
					</div>
					<div class="right-box">
						<h2 style="color: #e74c3c"><?php echo $dem1-$dem; ?></h2>
						<p>Lợi Nhuận</p>
					</div>
				</div>
			</div>
		</div>
		<div class="lockho">
			<input class="form-control" id="myInput" type="text" placeholder="Nhập sản phẩm cần tìm kiếm">
			<form method="post">
				<select name="id_k" class="khach">
				<?php if (isset($ky)) {
							foreach ($nhanvien as $key) {
							if ($key['id_nv']==$ky) {
								?>
									<option selected value="<?php echo $key['id_nv']; ?>">
								<?php echo $key['tennv']; ?>
								</option>
								<?php	
							}
							else{
							?>
							<option value="<?php echo $key['id_nv']; ?>">
								<?php echo $key['tennv']; ?>
								</option>
							<?php
							}
						}
						}
						else{
							foreach ($nhanvien as $key) {
							?>
							<option value="<?php echo $key['id_nv']; ?>">
								<?php echo $key['tennv']; ?>
								</option>
							<?php
							}	
						}
				 ?>
				</select>
				<button type="submit" name="lockho" class="nutbam"><i class="fas fa-search-plus"></i></button>
			</form>
		</div>
		
	<table class="table table-bordered table-striped">
    <thead>
      <tr>
    	<th></th>
        <th>STT</th>
        <th>Tên Nhân Viên</th>
        <th>Ngày Nhập</th>
        <th>Tổng Tiền</th>
      </tr>
    </thead>
    <tbody id="myTable">
	<?php 
		$i=0;
		if ($hoadonnhap!=0) {
		foreach ($hoadonnhap as $value) {	
		$i++;		
	?>
	<tr>
	<form method="post">
		<td><i id="them" href="#" data-target="#login<?php echo $i; ?>" data-toggle="modal" class="fa fa-plus-circle btn btn-primary login-trigger"></i></td>
		<td><?php echo $i; ?>
		</td>
		<td>
			<?php foreach ($nhanvien as $key) {
					if ($value['id_nv']==$key['id_nv']) {
						?>
						<p><?php echo $key['tennv']; ?></p>
					<?php
				}
			} ?>
		</td>
		<td>
			<input type="date" value="<?php echo $value['ngaynhap']; ?>" name="">
		</td>
		<td>
			<p><?php echo $value['tongtien'].'000VNĐ'; ?></p>
		</td>
	</form>
	</tr>
	<?php }

		}
	 ?>
	
    </tbody>
  </table>
</div>
</content>
<script>
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

		<!-- start pop-up -->

  <?php $i=0; if ($hoadonnhap!=0) {
  	# code...
   foreach ($hoadonnhap as $key) {
	$i++; ?>

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
						        <th>Giá</th>
						        <th>Thành Tiền</th>
						      </tr>
						    </thead>
						    <tbody>
						    	<?php $j=0; foreach($chitietnhap as $va) {
						    		if ($key['id_hd']==$va['id_hd']) {
						    		$j++;?>
						    			<tr>
									        <td><?php echo $j; ?></td>
									      	<td><p><?php
									      	foreach ($sanpham as $ke) {
									      		if ($ke['id_sp']==$va['id_sp']) {
									      	 echo $ke['tensp']; 
									      		}
									      	}?><p></td>
									      	<td><p><?php echo $va['soluong']; ?><p></td>
									      	<td>
									      		<p><?php echo $va['giatien'].'000VNĐ'; ?></p>
									      	</td>
									      	<td><p><?php echo ($va['soluong']*$va['giatien']).'000VNĐ'; ?></p></td>
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