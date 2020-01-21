<?php
	include('session.php');
	include('config.php');
	error_reporting(0);
	session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		 $name=$login_session;
		 $empno=$user_check;
		 $batch=$_POST['batchfrom']." to ".$_POST['batchto'];
		 $livesin=$_POST['livesin'];
		 $native=$_POST['native'];
		 $worksat=$_POST['worksat'];
		$sql = "insert into faculty_profile values('$name','$empno','$livesin','$native','$worksat','$batch')";
	  $result = mysqli_query($db,$sql);
		if($result)
		{
		$sql1="UPDATE faculties SET newuser=1 where employeeid='$empno'";
	  $result1=mysqli_query($db,$sql1);
		if($result1)
			{
			echo "<script type='text/javascript'>alert('Profile Details successfully done');
			window.location.replace('userhome.php');</script>";
 			}
			else {
				echo('error');
			}
		}
		else {
			echo "External error" ;
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
Hello <?php echo $login_session; ?>!
<p>Time to Reunite</p>
<center>Please enter the following details</center>
<section class="loginform cf">
	 <form name="facultysignup" method="post" accept-charset="utf-8">
		 <ul>
				 <input type="text" name="livesin" placeholder="Tell Us where do you currently live?"required style="width: 400px;">
		 </ul>
		 <br>
		 <ul>
		 <input type="text" name="worksat" placeholder="Please tell Us where do you work currently Work?" required style="width: 400px;">
		 </ul>
		 <br>
		 <ul>
				 <input type="text" name="native" placeholder="Tell us Your Native Place" required style="width: 400px;">
		 </ul>
		 <br>
		 <ul>
				 <input type="text" name="batchfrom" placeholder="Which year did you Join VIT as a faculty?" required style="width: 400px;">
			 </ul>
      <br>
			 <ul>
				 <input type="text" name="batchto" placeholder="When did you leave VIT?" required style="width: 400px;">

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
