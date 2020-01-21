<?php
	include("config.php");
	session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		 $username=$_POST["username"];
		 $groupname=$_POST["groupname"];
		 $email=$_POST["emailid"];
		 $password=$_POST["password"];
		 $userpassword=$_POST["userpassword"];
		 $usertype=$_POST["admin"];
		 $groupid=$_POST["groupID"];
			$sql1 = "SELECT groupadmin from groups where groupadmin='$username'";
 			$result1 = mysqli_query($db,$sql1);
			$count1 = mysqli_num_rows($result1);
		 if($count1>0){
			 echo "<script type='text/javascript'>alert('One User can create only one group');
			 window.location.replace('mainpage.php');</script>";
		 }
			 else {

		 if($usertype=="alumni")
		 {
			 $sql = "SELECT registerno from alumnimembers where registerno='$username' and password='$userpassword'";
			 $result = mysqli_query($db,$sql);
			 $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			 $active = $row['active'];
			 $count = mysqli_num_rows($result);

			 // If result matched $myusername and $mypassword, table row must be 1 row

			 if($count == 1 )
			 {
				 $sql = "insert into groups values('$groupid','$groupname','$username','$usertype','$password')";
				 $result = mysqli_query($db,$sql);
				 $tblname1=$groupid."_posts";
				 $tblname2=$groupid."_members";
				 $sql = "create table '$tblname1' (username text,date text,post varchar(100))";
				 $result = mysqli_query($db,$sql);
				 $sql = "create table '$tblname2' (userID varchar(10))";
				 $result = mysqli_query($db,$sql);
				 echo "<script type='text/javascript'>alert('Group Successfully created');
				 window.location.replace('mainpage.php');</script>";
				}
			 else
			 {
				echo "<script type='text/javascript'>alert('Sorry..Invalid Username or password OR Username does not exist');
				 window.location.replace('signadmin.php');</script>";
			 }
		 }
		 elseif($usertype=="faculty")
		 {
			 $sql = "SELECT EmployeeID from faculties where employeeid='$username' and password='$userpassword'";
			 $result = mysqli_query($db,$sql);
			 $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			 $active = $row['active'];
			 $count = mysqli_num_rows($result);

			 // If result matched $myusername and $mypassword, table row must be 1 row

			 if($count == 1 )
			 {
				 $sql = "insert into groups values('$groupid','$groupname','$username','$usertype','$password')";
				 $result = mysqli_query($db,$sql);
				 $tblname1=$groupid."_posts";
				 $tblname2=$groupid."_members";
				 $sql = "create table '$tblname1' (username text,date text,post varchar(100))";
				 $result = mysqli_query($db,$sql);
				 $sql = "create table '$tblname2' (userID varchar(10))";
				 $result = mysqli_query($db,$sql);
				 echo "<script type='text/javascript'>alert('Group Successfully created');
				 window.location.replace('mainpage.php');</script>";			}
			 else
			 {
				echo "<script type='text/javascript'>alert('Sorry..Invalid Username or password OR Username does not exist');
				 window.location.replace('signadmin.php');</script>";
			 }
		 	}
		}
	}
?>

<html>
<head>
	<title>create group</title>
	<link rel="stylesheet" href="normalize.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="menu" style="color:#ffffcc">
AMeetup
</div>
<body>
<p>Unity is power</p>
<center>Please enter the following details</center>
 <script language="JavaScript">
 function changeRadioButton(el){
    var admin;
    if (el.value == 'alumni'){
        admin = 'alumni';
    }else if(el.value == 'faculty'){
        admin = 'faculty';
    document.getElementById("admin").value = admin;
}
</script>
<section class="loginform cf">
		<form name="creategroup" method="post" accept-charset="utf-8">
				Are you
				<ul>
				<li>
				<input onclick="changeRadioButton(this)" type="radio" name="admin" value="alumni">an Alumni?</input>
				</li>
				<li>
				<input onclick="changeRadioButton(this)" type="radio" name="admin" value="faculty">a Faculty?</input>
				</li>
				</ul>
				<br/>
				<ul>
				<input type="text" name="groupname" placeholder="Enter the name of the group you are about to create" required style="width: 400px;">
				</ul>
				<br/>
				<ul>
				<input type="text" name="groupID" placeholder="Enter a Unique GroupID for the group" required style="width: 400px;">
				</ul>
				<br/>
				<ul>
						<input type="text" name="username" placeholder="Enter Register Number or EmployeeID"required style="width: 400px;">
				</ul>
				<br>
				<ul>
				<input type="email" name="emailid" placeholder="Email-ID" required style="width: 400px;">
				</ul>
				<br>
				<ul>
						<input type="password" name="userpassword" placeholder="Please enter the passsword of your login" required style="width: 400px;">
				</ul>
				<br>
				<ul>
						<input type="password" name="password" placeholder="Enter your required password for the group" required style="width: 400px;">
				</ul>
				<br>
				<ul>
						<input type="submit" value="SignUp">
				</ul>
				<br>Note:All fields are mandatory
		</form>

</section>
