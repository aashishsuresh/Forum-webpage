<?php
	include("config.php");
	session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		 $empid=$_POST["employeeno"];
		 $name=$_POST["firstname"]." ".$_POST["lastname"];
		 $email=$_POST["emailid"];
		 $password=$_POST["password"];
		 $confirmpassword=$_POST["confirmpassword"];
		 if($password==$confirmpassword)
		 {
			 $sql = "SELECT employeeid from faculties where employeeid='$empid'";
			 $result = mysqli_query($db,$sql);
			 $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			 $active = $row['active'];
			 $count = mysqli_num_rows($result);
			 // If result matched $myusername and $mypassword, table row must be 1 row
			 if($count != 0) {
				 echo "<script type='text/javascript'>
					 window.location.replace('signfaculty.php');
				 alert('EmployeeID already exists');</script>";
			 }
			 else
			 {
				 $sql = "insert into faculties values('$empid','$name','$email','$password',0)";
				 $result = mysqli_query($db,$sql);
				 $name="Prof.".$name;
				 $sql1 = "insert into users values('$empid','$name','$email','$password','faculty')";
				 $result1 = mysqli_query($db,$sql1);
				 $sql2 = "CREATE TABLE ".$empid."_contacts (user_id varchar(10),user_name text,PRIMARY KEY(user_id))";
				 $result2 = mysqli_query($db,$sql2);
				 echo "<script type='text/javascript'>
					 window.location.replace('mainpage.php');
				 alert('Account Successfully Created');</script>";
				 }
		 }
		 else {

		 }
}
?>
<html>
<head>
	<title>Faculty SignUp</title>
	<link rel="stylesheet" href="normalize.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="menu" style="color:#ffffcc">
AMeetup
</div>
<body>
<p>Time to meet your old students</p>
<center>Please enter the following details</center>
<section class="loginform cf">
		<form name="facultysignup" method="post" accept-charset="utf-8">
			<ul>
					<input type="text" name="employeeno" placeholder="Employee Number"required style="width: 400px;text-transform:uppercase">
			</ul>
			<br>
			<ul>
					<input type="text" name="firstname" placeholder="First Name"required style="width: 192px;">
					<input type="text" name="lastname" placeholder="Last Name" required style="width: 192px;">
			</ul>
			<br>
			<ul>
			<input type="email" name="emailid" placeholder="Email-ID" required style="width: 400px;">
			</ul>
			<br>
			<ul>
					<input type="password" name="password" placeholder="Enter your required password" required style="width: 400px;">
			</ul>
			<br>
			<ul>
					<input type="password" name="confirmpassword" placeholder="Re-enter the password" required style="width: 400px;">
			</ul>
			<br>
			<ul>
					<input type="submit" value="SignUp">
			</ul>
			<br>Note:All fields are mandatory
		</form>
	</section>
</body>
</html>
