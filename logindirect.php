<?php
include('config.php');
error_reporting(0);
$myusername=$_POST['username'];
$mypassword=$_POST['password'];
$loginas=$_POST['loginas'];
if($loginas=="regularmember")
{
if($myusername=="admin")
{
if($mypassword=="admin")
{
	echo "<script type='text/javascript'>alert('Login Successful');
	window.location.replace('adminlogin.php');</script>";
}
else {
	echo "<script type='text/javascript'>alert('Invalid Password');
	window.location.replace('mainpage.php');</script>";
}
}
else
{
$tbl_name="alumnimembers"; // Table name
// Connect to server and select databse.
$sql="SELECT * FROM `alumnimembers` WHERE `registerno` LIKE '$myusername' AND `password` LIKE '$mypassword'";
$result=mysqli_query($db,$sql);
// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$newuser=$row['newuser'];
if($count==1)
{
// Register $myusername, $mypassword and redirect to file "login_success.php"
session_start();
$_SESSION['login_user'] = $myusername;
$_SESSION['login_as'] = $loginas;
$_SESSION['password'] = $mypassword;
if($newuser==0)
{
header("location:alumniprofile.php");
}
else {
header("location:userhome.php");
}
}
else
{
	echo "<script type='text/javascript'>alert('Invalid Username or Password');
	window.location.replace('mainpage.php');</script>";
}
}
}
else if($loginas=="faculty")
{
	$tbl_name="faculties"; // Table name
	// Connect to server and select databse.
	$sql="SELECT * FROM `faculties` WHERE `employeeid` LIKE '$myusername' AND `Password` LIKE '$mypassword'";
	$result=mysqli_query($db,$sql);
	// Mysql_num_row is counting table row
	$count=mysqli_num_rows($result);
	// If result matched $myusername and $mypassword, table row must be 1 row
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$newuser=$row['newuser'];
	if($count==1)
	{
	// Register $myusername, $mypassword and redirect to file "login_success.php"
	session_start();
	$_SESSION['login_user'] = $myusername;
	$_SESSION['login_as'] = $loginas;
	$_SESSION['password'] = $mypassword;
	if($newuser==0)
	{
	header("location:facultyprofile.php");
	}
	else
	{
	header("location:userhome.php");
	}
  }
	else
	{
		echo "<script type='text/javascript'>alert('Invalid Username or Password');
		window.location.replace('mainpage.php');</script>";
	}
}
	else
	{
		$tbl_name="groups"; // Table name
		// Connect to server and select databse.
		$sql="SELECT * FROM `groups` WHERE `groupID` LIKE '$groupID' AND `password` LIKE '$mypassword'";
		$result=mysqli_query($db,$sql);
		// Mysql_num_row is counting table row
		$count=mysqli_num_rows($result);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$groupname=$row['groupname'];
		// If result matched $myusername and $mypassword, table row must be 1 row
		if($count==1)
		{
		// Register $myusername, $mypassword and redirect to file "login_success.php"
		session_start();
		$_SESSION['login_user'] = $myusername;
		$_SESSION['login_as'] = $loginas;
		$_SESSION['password'] = $mypassword;
		$_SESSION['groupname']=$groupname;
		header("location:grouphome.php");
	}
}
?>
