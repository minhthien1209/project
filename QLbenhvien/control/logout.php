<?php
	session_start();
	session_destroy();// xóa tất cả session
	header('location: ../index.php');
 ?>