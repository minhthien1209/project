<?php 
	$conn = mysqli_connect('localhost','root','','benhnhannoitru');
	$id = $_GET['id'];
	$query_delete_bn = mysqli_query($conn,"DELETE FROM dichvutheobenhnhan WHERE id= $id");
?>