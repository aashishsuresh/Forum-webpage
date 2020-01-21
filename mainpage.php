<html>
<style>
body{
background-image:url('IMG-20161109-WA0017.jpg');
background-repeat:no-repeat;
background-size:cover;
}
</style>
<head>
	<title>Welcome to AMeetUp</title>
	<link rel="stylesheet" href="normalize.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="menu" style="color:#ffffcc" position="fixed">
AMeetup
</div>
<p><span style="color:Violet;">||Welcome Back ex-VITian||</span></p>
<center><span style="font-size:30px;">Where you won't miss your college buds!</span></center>
	<section class="loginform cf">
		<form name="login" method="POST" action="logindirect.php">
			Already a Member ?
			Login as:
			<ul	>
			<li><input onclick="RadioButton(this)" type="radio" name="loginas" value="regularmember" checked>Alumni Member</li>
			<li><input onclick="RadioButton(this)" type="radio" name="loginas" value="faculty">Faculty </li>
			<li><input onclick="RadioButton(this)" type="radio" name="loginas" value="groupadmin">Group Login </li>
			</ul>
			<ul>
				<li>
					<label for="Username">Username</label>
					<input type="text" name="username" placeholder="Ex:15BCE1137 or EMP5001" required style="text-transform:uppercase">
				</li>
				<li>
					<label for="password">Password</label>
					<input type="password" name="password" placeholder="Password" required>
				</li>
				<li>
					<input type="submit" value="Login">
				</li>
			</ul>
		</form>
	</section>
	<center>Not having an alumni account?
	<a href="signalumni.php">Click here to SignUp for an alumni account!</a></center>
	<br>
	<center>Are you a Faculty who haven't registered yet?
	<a href="signfaculty.php">Click here to SignUp for your account!</a></center>
	<br>
	<center>Want to create a group and be the group admin?
	<a href="signadmin.php">Click here to create a group and unite people!</a></center>
</body>
</html>
