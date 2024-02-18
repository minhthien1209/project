<content>
	<div class="profile" style="max-height: 800px; max-height: 600px;">
	<div class="container">
		<div class="row">
			<div class="col-sm-7">
				<?php 
					if (isset($_SESSION['nhanvien'])) {
					?>
						<div class="profile-mg">
							<img src="img/<?php echo $_SESSION['nhanvien'][0]['hinhanh'];  ?>" style="width: 350px;height: 350px;">
						</div>
					<?php
					}
				 ?>
			</div>
			<div class="col-sm-5">
				<form method="post">
				<div class="profile-text">
					<div class="input-group mb-3 input-group-sm">
					    <div class="input-group-prepend">
					        <span class="input-group-text"><i class="fa fa-user-tie"></i></span>
					      </div>
						<input required type="text" class="ten" name="tennv" value="<?php echo $_SESSION['nhanvien'][0]['tennv']; ?>">
						<input type="text" hidden name="ha" value="<?php echo $_SESSION['nhanvien'][0]['hinhanh'];  ?>">
					</div>
					<div class="input-group mb-3 input-group-sm">
					    <div class="input-group-prepend">
					        <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
					      </div>
						<input required type="text" name="gioitinh" value="<?php echo $_SESSION['nhanvien'][0]['gioitinh'] ?>">
					</div>
					<div class="input-group mb-3 input-group-sm">
					    <div class="input-group-prepend">
					        <span class="input-group-text"><i class="fas fa-baby"></i></span>
					      </div>
						<input type="date" name="ngaysinh" value="<?php echo $_SESSION['nhanvien'][0]['ngaysinh'] ?>">
					</div>
					<div class="input-group mb-3 input-group-sm">
					    <div class="input-group-prepend">
					        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
					      </div>
						<textarea name="diachi" required><?php echo $_SESSION['nhanvien'][0]['diachi'] ?></textarea>
					</div>
					<div class="input-group mb-3 input-group-sm">
					    <div class="input-group-prepend">
					        <span class="input-group-text"><i class="fa fa-phone"></i></span>
					      </div>
						<input required type="text" name="sdt" value="<?php echo $_SESSION['nhanvien'][0]['sdt'] ?>">
					</div>
					<div class="input-group mb-3 input-group-sm">
					    <div class="input-group-prepend">
					        <span class="input-group-text"><i class="fas fa-user-plus"></i></span>
					      </div>
					<input type="date" name="ngaygianhap" value="<?php echo $_SESSION['nhanvien'][0]['ngaygianhap']; ?>">
					</div>
					
						<input type="file" name="hinhanh">
						<br>
						<div class="uptaikhoan">
						<button type="submit" name="sua">Cập Nhật</button>
						<a class="login-trigger" id="them" href="#" data-target="#login" data-toggle="modal">User</a>
						</div>
				</div>
			</form>
			</div>
		</div>
		</div>
	</div>
</content>  
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
		            		<input type="text" class="tk" required name="taikhoan" value="<?php echo $_SESSION['tk']; ?>">
		            		<input type="text" class="mk" required name="matkhau" value="<?php echo $_SESSION['mk']; ?>">
		            		
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