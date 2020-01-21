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
		<li><a href="contacts.php">View Members</a></li>
		<li><a href="addcontacts.php">Add Members to the group</a></li>
		<li><a onclick="logout()">Logout</a></li>
	</ul>

<form method="POST">
<br>
<h1>Welcome <?php echo $login_session; ?>!</h1>
<br>
<center>
<a href="createtopic.php">Click Here to create a new topic for discussion</a>
<br/>
<?php
$sql = "SELECT  topic_id,  topic_subject,  topic_desc,topic_date  FROM topics ORDER by topic_date DESC";

$result = mysqli_query($db,$sql);
    if(mysqli_num_rows($result) == 0)
    {
        echo 'No topics defined yet.';
    }
    else
    {
        //prepare the table
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
										  echo '<section> <a href="topic.php?id=' . $row['topic_id'] . '">' . $row['topic_subject'] . '</a><br>';
											echo 'Created On    ';
											echo $row['topic_date'];
											echo '</section>';
        }
    }
?>
</center>
<br>
</body>
</html>
