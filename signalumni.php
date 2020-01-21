 <?php
   include("config.php");
   include("PHPMailer-master/PHPMailer-master/PHPMailerAutoload.php");
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $regno=$_POST["registerno"];
			$name=$_POST["firstname"]." ".$_POST["lastname"];
			$email=$_POST["emailid"];
			$password=$_POST["password"];
			$confirmpassword=$_POST["confirmpassword"];
			if($password==$confirmpassword)
			{
				$sql = "SELECT registerno from alumnimembers where registerno='$regno'";
	      $result = mysqli_query($db,$sql);
	      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	      $count = mysqli_num_rows($result);

	      // If result matched $myusername and $mypassword, table row must be 1 row

	      if($count != 0) {
          echo "<script type='text/javascript'>
            window.location.replace('signalumni.php');
          alert('Register Number already exists');</script>";
	   		}
				else
				{
					$sql = "insert into alumnimembers values('$regno','$name','$email','$password',0)";
		      $result = mysqli_query($db,$sql);
          $sql1 = "insert into users values('$regno','$name','$email','$password','alumni')";
		      $result1 = mysqli_query($db,$sql1);
          $sql2 = "CREATE TABLE ".$regno."_contacts (user_id varchar(10),user_name text,PRIMARY KEY(user_id))";
     			$result2 = mysqli_query($db,$sql2);
				}
			}
      $mail = new PHPMailer;
      if($result)
      {
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = 'shri0101silence@gmail.com';
          $mail->Password = 'slsasela';
          $mail->SMTPSecure = 'tls';
          $mail->Port = 587;
          $mail->setFrom('shri0101silence@gmail.com', 'AmeetUp');
          $mail->addReplyTo('shri0101silence@gmail.com', 'Ameetup');
          $mail->addAddress($email);

          $mail->isHTML(true);

          $bodyContent="<div style='width: 50%; margin: auto; border: 5px solid black; padding: 1% 3%; display: block;'>";
          $bodyContent.=" Click Here to Verify your Account";
          $bodyContent.="</div>";

          $mail->Subject="Ameetup user verification";
          $mail->Body= $bodyContent;
      }
      echo "<script type='text/javascript'>alert('Account successfully created');
      window.location.replace('mainpage.php');</script>";
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
<p>Time to Reunite</p>
<center>Please enter the following details</center>
<section class="loginform cf">
		<form name="alumnisignup" method="post" accept-charset="utf-8">
			<ul>
					<input type="text" name="registerno" placeholder="Register Number"required style="width: 400px;text-transform:uppercase">
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
