<?php
	include('session.php');
	error_reporting(0);
	session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		 $name=$login_session;
		 $regno=$user_check;
		 $batch=$_POST['batchfrom']." to ".$_POST['batchto'];
		 $livesin=$_POST['livesin'];
		 $native=$_POST['native'];
		 $worksat=$_POST['worksat'];
			$sql = "insert into alumni_profile values('$name','$regno','$livesin','$native','$worksat','$batch')";
	    $result = mysqli_query($db,$sql);
			$sql1="UPDATE alumnimembers SET newuser=1 where registerno='$regno'";
	    $result1=mysqli_query($db,$sql1);
			echo "<script type='text/javascript'>alert('Profile Details successfully done');
			window.location.replace('userhome.php');</script>";
 			}
?>
<html>
<head>
 <title>Alumni SignUp</title>
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
	 <form name="alumnisignup" method="post" accept-charset="utf-8">
		 <ul>
				 <input type="text" name="livesin" placeholder="Tell Us where do you currently live?"required style="width: 400px;" >
		 </ul>
		 <br>
		 <br>
		 <ul>
		 <input type="text" name="worksat" placeholder="Tell Us where do you Work?" required style="width: 400px;">
		 </ul>
		 <br>
		 <ul>
				 <input type="text" name="native" placeholder="Tell us Your Native Place" required style="width: 400px;">
		 </ul>
		 <br>
		 <ul>
			 <li>
				 <input type="text" name="batchfrom" placeholder="Which year did you Join VIT?" required>
			 </li>
			 <li>
				 <input type="text" name="batchto" placeholder="Pass Out Year" required >
			 </li>
		 </ul>
		 <br>
		 <br>
		 <ul>
				 <input type="submit" value="SignUp">
		 </ul>
		 <br>Note:All fields are mandatory
	 </form>
 </section>
</body>
</html>
