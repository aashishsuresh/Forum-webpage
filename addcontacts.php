<?php
include('session.php');
include('config.php');
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
<br>
<br>
<center>
<br/>
<?php
$table=$user_check."_contacts";
$sql = "SELECT users.* FROM users LEFT JOIN $table ON (users.user_id=$table.user_id) WHERE $table.user_id IS NULL AND users.user_id!='$user_check'";
$result = mysqli_query($db,$sql);
if(!$result)
{
  echo "error!";
}
else
{
    if(mysqli_num_rows($result) == 0)
    {
        echo 'No remaining members Yet.';
    }
    else
    {
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
											$userid=$row['user_id'];
											$usertype=$row['usertype'];
											if($usertype=='alumni')
											{
											$sql1 = "SELECT * from alumni_profile where registerno='$userid'";
											$result1 = mysqli_query($db,$sql1);
											$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
											echo '<section>';
											echo '<a href="insertcontact.php?id=' . $row['user_id'] . '">' . $row['user_name'] . '</a><br>';
											echo 'Lives at:'.$row1['livesin'].'</br>';
											echo 'Native Place:'.$row1['native'].'</br>';
											echo 'Works at:'.$row1['worksat'].'</br>';
											echo 'Studied From :'.$row1['batch'].'</br>';
											echo '</section>';
											}
											else
											 {
												 $sql2 = "SELECT * from faculty_profile where empno='$userid'";
												 $result2 = mysqli_query($db,$sql2);
												 if($result2)
												 {
												 $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
												 echo '<section>';
												 echo '<a href="insertcontact.php?id=' . $row['user_id'] . '">' . $row['user_name'] . '</a><br>';
												 echo 'Lives at:'.$row2['livesin'].'</br>';
												 echo 'Native Place:'.$row2['native'].'</br>';
												 echo 'Works at:'.$row2['worksat'].'</br>';
												 echo 'Worked at VIT from:'.$row2['batch'].'</br>';
												 echo '</section>';
											}
											else {
												echo '<section>';
												echo '<a href="insertcontact.php?id=' . $row['user_id'] . '">' . $row['user_name'] . '</a><br>';
												echo 'New User </br>';
												echo '</section>';
											}
										}
				}
    }
}
?>
</center>
<br>
</body>
</html>
