<content>
	<div class="container">   
	<div class="top-sp">
		<input class="form-control" id="myInput" type="text" placeholder="Nhập loại sản phẩm cần tìm kiếm"> 
		<a class="login-trigger" id="them" href="#" data-target="#login" data-toggle="modal">Thêm Loại Sản Phẩm</a>
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
		            <h4>Thêm Loại Sản Phẩm</h4>
		            	<div class="container">
		            		<input type="" required name="tenloaisp" placeholder="Tên Loại Sản Phẩm">
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
        <th>Tên Loại</th>
        <th></th>
      </tr>
    </thead>
    <tbody id="myTable">
	<?php 
		$dem=0;
		foreach ($loaisanpham as $value) {			
		$dem++;		
	?>
	<tr>
	<form method="post">
		<td><?php echo $dem; ?><input type="" hidden name="id_loaisp" value="<?php echo $value['id_loaisp']; ?>"></td>
		<td>
			<span style="display: none;"><?php echo $value['tenloaisp']; ?></span>
			<input required type="" name="tenloaisp" value="<?php echo $value['tenloaisp']; ?>">
		</td>
		<td style="width: 100px;"><a href="?muc=loaisanpham&idxoa=<?php echo $value['id_loaisp'];  ?>" name="xoa" onclick="return confirm('Bạn Có Muốn Xóa <?php echo $value['tenloaisp'];  ?> ?');"><i class="fas fa-trash-alt"></i></a> 
			<button type="submit" onclick="return confirm('Bạn Có Muốn Sửa <?php echo $value['tenloaisp']; ?> ?');" name="sua"><i class="fas fa-edit"></i></button></td>
	</form>
	</tr>
	<?php } ?>
    </tbody>
  </table>
</div>
<!-- js thanh tìm kiếm -->
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
