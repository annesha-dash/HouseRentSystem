<?php
include('server.php');
	$db = mysqli_connect("localhost", "root", "", "tolet");
	
	function updateDB($sql){
		
		$conn = mysqli_connect("localhost","root","","tolet");
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		if(mysqli_query($conn, $sql)) {
			return true;
		}
		else{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			return false;
		}
	}
	
	function getFromDB($sql){
		
		$conn = mysqli_connect("localhost","root","","tolet");
		
		$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
		
		return $result;
	}
	
	$msg = "";

	if (isset($_POST['upload'])) {
		$target = "imgUp/".basename($_FILES['image']['name']);
		
		$image = $_FILES['image']['name'];
		$district = $_POST['district'];
		$month = $_POST['month'];
		$rent = $_POST['rent'];
		$status =$_POST['status'];

		$sql = "INSERT INTO tolet_data  VALUES (null,'$image', '$district', '$month','$rent','$status',1)";
		//mysqli_query($db, $sql);
		updateDB($sql);
		//die();

		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
		}
	}

	$result = getFromDB("SELECT * FROM tolet_data");

?>

<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		echo $id;
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM tolet_data WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$district0 = $n['district'];
			$month0 = $n['month'];
			$rent0 = $n['rent'];
			$status0 = $n['status'];
		}
	}
?>

	


<!DOCTYPE html>
<html>
<head>
	<title>TO-LET</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<!--<title>Image Upload</title>-->
	
	<style type="text/css">
		#content{
			width: 50%;
			margin: 20px auto;
			border: 1px solid #cbcbcb;
		}
		form{
			width: 50%;
			margin: 20px auto;
		}
		form div{
			margin-top: 5px;
		}
		#img_div{
			width: 80%;
			padding: 5px;
			margin: 15px auto;
			border: 1px solid #cbcbcb;
		}
		#img_div:after{
			content: "";
			display: block;
			clear: both;
		}
		img{
			float: left;
			margin: 5px;
			width: 300px;
			height: 140px;
		}
	</style>
</head>
<body>

<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>


<div id="content">
<?php

	while ($row = mysqli_fetch_array($result)) {
		echo "<div id='img_div'>";
			echo "<img src= 'imgUp/".$row['img']."' >";
			echo "<p>".$row['district']."</p>";
			echo "<p>".$row['month']."</p>";
			echo "<p>".$row['rent']."</p>";
			echo "<p>".$row['status']."</p>";
		echo "</div>";
	}
	
?>

<?php $results = mysqli_query($db, "SELECT * FROM tolet_data"); ?>

<table>
	
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			
			<td>
				<a href="imgUp.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
<?php
	require('update.php');
?>  
	
	<form method="POST" action="imgUp.php" enctype="multipart/form-data">
		<input type="hidden" name="size" value="1000000">
		<div>
			<input type="file" name="image">
		</div>
		<br>
	<label>District</label>
		<input type="text" name="district" value="<?php if(isset($_GET['edit'])) echo $district0; ?>">
<br>	
<div>	
	<label>Month</label>
		<input type="text" name="month" value="<?php if(isset($_GET['edit'])) echo $month0; ?>">			
		</div>
		<div>
	<label>Rent</label>
		<input type="text" name="rent" value="<?php if(isset($_GET['edit'])) echo $rent0; ?>">	
</div>
<div>		
	<label>Status</label>
		<input type="text" name="status" value="<?php if(isset($_GET['edit'])) echo $status0; ?>">
</div>		
		<div>
		
		
        
		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
		<?php else: ?>
			<button type="submit" name="upload">POST</button>
		<?php endif ?>
	</div>
	</form>
</div>
</body>
</html>
