<?php
include('session.php');
error_reporting(0);
?>
<html>
<head>
	<link rel="stylesheet" href="normalize.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="chatbar.css">
<!--For Logout Confirmation-->
<script type="text/javascript">
function logout()
{
var logg =	confirm("Are You sure you want to Logout?");
if(logg)
{
window.location.replace("mainpage.php");
}
}
</script>
</head>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333333;
}

li {
    float: left;
}
section {
	width: 410px;
	font-family: Myriad Pro;
	margin: 50px auto;
	padding: 25px;
	background-color: rgba(250,250,250,0.5);
	border-radius: 5px;
    box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2),
    			inset 0px 1px 0px 0px rgba(250, 250, 250, 0.5);
    border: 1px solid rgba(0, 0, 0, 0.3);
}
li a {
    display: block;
    color: white;
    text-align: center;
    padding: 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111111;
}
</style>
	<body>
		<div class="menu" style="color:#ffffcc; position:fixed">
	AMeetup
	</div>
	<br/>
	<br/>
	<br/>
	<ul>
		<li><a href="userhome.php">Home</a></li>
		<li><a href="profile.php">Profile</a></li>
		<li><a href="contacts.php">Contacts</a></li>
		<li><a onclick="logout()">Logout</a></li>
	</ul>

<form method="POST">
<br>
<h1>Welcome Admin!</h1>
<br>
<center>
<br/>
<a href="moderate.php">Click Here to Moderate Topics and posts</a>
</center>
<br>
</body>
</html>
