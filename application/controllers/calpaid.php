<?php
	session_start();//add session here to check that employee is logged in
	include("../models/sale.php");
	if (isset($_SESSION['sale_id'])) {
		$sale_id=$_SESSION['sale_id'];
		$subtotal = 
		$paid = $_REQUEST['paid'];
		$balance = $subtotal - $paid;
		$_SESSION['balance'] = $balance;
		//header("location:viewAfterAdd.php");
		
	}	
?>