<?php 
	require_once 'Controller/HomeController.php';
	ob_start();	
	$HT=new HomeControl();
	$HT->Dieuhuong();
	ob_flush();
 ?>