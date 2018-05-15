<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		//header('location: index.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>TO-LET</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<p id = "demo"></p><center>
<script> var d = new Date();
document.getElementById("demo").innerHTML=d.toDateString();
</script></p>

<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
			<a href="UserUpdate.php" class="button"onclick="window.open(this.href); return false;">Post</a>
			
			
			<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
		<?php endif ?>

<div class="topbar">
<h4 style="color:white"><center>
DISTRICT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MONTH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RENT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;STATUS
</h4>
<div style="width: 100%; height: 500px;display:inline-block;">

<form action="result.php" method ="get"><center>
  <select name="District">
    <option value="Dhaka">Dhaka</option>
    <option value="Chittagong">Chittagong</option>
    <option value="Rajshahi">Rajshahi</option>
    <option value="Khulna">Khulna</option>
	<option value="Sylhet">Sylhet</option>
	<option value="Barishal">Barishal</option>
	<option value="Rangpur">Rangpur</option>
	<option value="Mymansing">Mymansing</option>
  </select>

  <select name="Month">
    <option value="JAN">JANUARY</option>
    <option value="FEB">FEBRUARY</option>
    <option value="MAR">MARCH</option>
	<option value="APR">APRIL</option>
	<option value="MAY">MAY</option>
	<option value="JUN">JUNE</option>
	<option value="JUL">JULY</option>
	<option value="AUG">AUGUST</option>
	<option value="SEP">SEPTEMBER</option>
	<option value="OCT">OCTOBER</option>
	<option value="NOV">NOVEMBER</option>
	<option value="DEC">DECEMBER</option>
  </select>
 
  <select name="Rent">
    <option value="10000">10000</option>
    <option value="12000">12000</option>
    <option value="15000">15000</option>
	<option value="20000">20000</option>
	<option value="25000">25000</option>
	<option value="30000">30000</option>
	<option value="35000">35000</option>
	<option value="40000">40000</option>
	<option value="45000">45000</option>
	<option value="50000">50000</option>
	
  </select>
  

  <select name="Status">
    <option value="FAMILY">FAMILY</option>
    <option value="BACHALOR">BACHALOR</option>
  </select>
 
		
		
		
  <br><br>
  <input type = "submit" value = "Search" name ="search"><center>
</form>



<div class="social-button">
  <a href="login.php" class="button"onclick="window.open(this.href); return false;">Log In</a><center>
</div>

<img style="width: 120%; height: 300%; position: relative;" src="wewewe.jpg">

<div style="position: absolute; 
   top: 300px; 
  margin: auto;
   width: 100%; color: white;  background: rgba(0, 0, 0, 0.4);
   font-size: 40px;"><h1 align="center">To-Let Canvas</h1></div>
</div>


<footer id='ok'ssss>

<br><br>
<table style="width: 90%; color: grey; margin: auto;">
  <th><b>Contact no</b></th>
  <th><b>Location</b></th>
  <th><b>Find us</b></th>

<tr >
  
<td><p>01710000000<br><br>01810000000<br><br>01910000000<br><br>01910000000</p></td>
<td><p>
<h4 style= <"text-align:center;">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;By using location we can find out the desired place. The place people <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;want to rent the house and the environment of that place can be find out by these type <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;of specific description.  The specific distance from school, college , hospital etc can <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;also be known by location. Location helps not only the people who will rent <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;house, it will be helpful for the landlord.

<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Our Office Location :
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Banani, Dhaka,Bangladesh.
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Road no. : 4 ,block no. : D
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;House no.: 13 ,Flat no. : 3D
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email : toletcanvas@gmail.com

</p></td>
<td><p>ABCD.</p></td>




</tr>



</table>
<br>
<hr style="border: .8px solid #C3C3C3;">

<div class="social-button">
  <button style="background-color: blue; color: white;"><b>Facebook</b></button>
  <button style="background-color: #8181F7; color: white; border-color: #8181F7;"><b>Twitter</b></button>

</div>
<br><br>

</footer>

</body>
</html>