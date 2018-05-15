<!DOCTYPE html>
<html>
<head>
	<title>TO-LET</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<!--Search-->
<?php
$db = mysqli_connect("localhost", "root", "", "tolet");
if(isset($_GET['search'])){
	$district = $_GET['District'];
	$month = $_GET['Month'];
	$rent = $_GET['Rent'];
	$status = $_GET['Status'];
	$query = mysqli_query($db,"Select * From tolet_data Where district = '$district' OR month = '$month' OR rent = '$rent' ");//OR status = '$status'");
	//print_r (mysqli_fetch_array($query));	
}

while ($row=mysqli_fetch_assoc($query)) {
	
		echo "<div id='img_div'>";
			echo "<img src= 'imgUp/".$row['img']."' >";
			echo "<p>".$row['district']."</p>";
			echo "<p>".$row['month']."</p>";
			echo "<p>".$row['rent']."</p>";
			echo "<p>".$row['status']."</p>";
		echo "</div>";
	}
	
	/*
	$row = mysqli_fetch_array($query);
	echo "<pre>";
	print_r($row);
	echo "</pre>";
	*/
	
?>


</body>
</html>