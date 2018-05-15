<?php

	$db = mysqli_connect("localhost", "root", "", "tolet");
//update
	if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$district = $_POST['district'];
	$month = $_POST['month']; 
	$rent = $_POST['rent'];
	$status = $_POST['status'];

	mysqli_query($db, "UPDATE tolet_data SET district='$district', month='$month', rent='$rent', status='$status' WHERE id=$id");
	$_SESSION['message'] = "Address updated!"; 
	header('location: index.php');
}


?>