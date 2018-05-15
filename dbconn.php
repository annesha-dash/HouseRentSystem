<?php

	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	mysql_connect("localhost","root","");
	mysql_select_db("tolet");
	
	$result = mysql_query("select * from login where username = '$user' and password = '$pass'")
				or die("Failed to query database".mysql_error());
				
	$row = mysql_fetch_array($result);
	if($row['username']==$user && $row['password']==$pass){
		echo "LogIn Success";
	}else{
		echo"Failed";
	}
	?>