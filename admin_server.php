<?php 
	session_start();

	
	$username = "";
	$update = false;
	$errors = array(); 
	$_SESSION['success'] = "";

	
	$db = mysqli_connect('localhost', 'root', '', 'tolet');

	
	if (isset($_POST['reg_admin'])) {
		
		$username = mysqli_real_escape_string($db, $_POST['username']);
		
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		
		if (empty($username)) { array_push($errors, "Username is required"); }
		
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		
		if (count($errors) == 0) {
			$password = md5($password_1);
			$query = "INSERT INTO admin (Admin, password) 
					  VALUES('$username','$password')";
			mysqli_query($db, $query);

			$_SESSION['Admin'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}

	}

	// ... 

	
	if (isset($_POST['login_admin'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM admin WHERE Admin='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['Admin'] = $username;
				$_SESSION['success'] = "You are now logged in";
				
				header('location: imgUp.php');
				
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}