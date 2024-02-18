<?php 
	$conn = mysqli_connect('localhost','root','','benhnhannoitru');
	$id = $_GET['id'];
	$query_delete_thuoc = mysqli_query($conn,"DELETE FROM thuocbhyttheobenhnhan WHERE id= $id");
?>