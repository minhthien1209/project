<content>
	<div class="container">   
	<div class="top-sp">
		<input class="form-control" id="myInput" type="text" placeholder="Nhập tên khách hàng cần tìm kiếm"> 
		<a class="login-trigger" id="them" href="#" data-target="#login" data-toggle="modal">Thêm Khách Hàng </a>
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
	            <h4>Thêm Khách Hàng</h4>
	            	<div class="container">
						<input required type="text" class="ten" name="tenk" placeholder="Tên Khách Hàng"> <br>
						<input required type="text" name="gioitinh"placeholder="Giới Tính"><br>
						<input required type="text" name="sdt"placeholder="SĐT">
						<br>
						<input type="date" name="ngaythem" placeholder="Ngày Thêm">
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
      <tr id="th">
        <th>STT</th>
        <th>Tên Khách Hàng</th>
        <th>Giới Tính</th>
        <th>SĐT</th>
        <th>Ngày Thêm</th>
        <th></th>
      </tr>
    </thead>
    <tbody id="myTable">
	<?php 
		$dem=0;
		foreach ($khachhang as $value) {			
		$dem++;				
	?>
	<tr>
	<form method="post">
		<td><?php echo $dem; ?><input type="" style="display: none;" name="id_k" value="<?php echo $value['id_k']; ?>"></td>
		<td>
			<span style="display: none;">
				<?php echo $value['tenk'];?>
			</span>
			<input type="" required name="tenk" value="<?php echo $value['tenk']; ?>"></td>
		<td><input type="" required name="gioitinh" value="<?php echo $value['gioitinh']; ?>"></td>
		<td><input type="" name="sdt" value="<?php echo $value['sdt']; ?>"></td>
		<td><input type="date" name="ngaythem" value="<?php echo $value['ngaythem']; ?>"></td>
		<td style="width: 100px;"><a href="?muc=khachhang&idxoa=<?php echo $value['id_k']; ?>" name="xoa" onclick="return confirm('Bạn Có Muốn Xóa <?php echo $value['tenk'];  ?> ?');"><i class="fas fa-trash-alt"></i></a> 
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
