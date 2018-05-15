<?php

	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	mysql_connect("localhost","root","");
	mysql_select_db("tolet");
	
	$result = mysql_query("INSERT into login (usernam, password) VALUES ('$user','pass')");
	
				
	
	?>