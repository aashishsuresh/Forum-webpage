<?php
include('session.php');
?>
<html>
<head>
	<link rel="stylesheet" href="normalize.css">
	<link rel="stylesheet" href="style.css">
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

	<style>
	body{
	background-image:url('IMG-20161109-WA0019.jpg');
	background-repeat:no-repeat;
	background-size:cover;
	}
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
			<li><a href="addcontacts.php">Add Contacts</a></li>
			<li><a onclick="logout()">Logout</a></li>
		</ul>
<form method="POST">
<section>
<?php
if($user_type=="regularmember")
{
$tbl_name="alumnimembers"; // Table name
// Connect to server and select database.
$sql="SELECT * FROM `alumnimembers` WHERE `registerno` LIKE '$user_check' AND `password` LIKE '$password'";
$result=mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
// Mysql_num_row is counting table row
// If result matched $myusername and $mypassword, table row must be 1 row
  echo "Register Number: ".$row['registerno'] ."<br/>";
  echo "Name: ".$row['Name'] ."<br/>";
  echo "Email-id: ".$row['emailid'] ."<br/>";
}
else if($user_type=="faculty")
{
	$tbl_name="faculties"; // Table name
	// Connect to server and select database.
	$sql="SELECT * FROM `faculties` WHERE `employeeid` LIKE '$user_check' AND `password` LIKE '$password'";
	$result=mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	// Mysql_num_row is counting table row
	// If result matched $myusername and $mypassword, table row must be 1 row
	  echo "Register Number:".$row['employeeid'] ."<br/>";
	  echo "Name:".$row['name'] ."<br/>";
	  echo "Email-id:".$row['emailid'] ."<br/>";
	  echo "Password:".$row['password'] ."<br/>";

}
?>
<input type="submit" value="Edit">
</section>
</form>
</body>
</html>
