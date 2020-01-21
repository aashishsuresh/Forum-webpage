<?php
include('config.php');
include('session.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$topic_id=$_POST['topic_id'];
$subject=$_POST['Reply'];
$sql1 = "insert into posts values('NULL','$subject',NOW(),'$topic_id','$user_check')";
$result1 = mysqli_query($db,$sql1);
if($result1)
{
	$webpage="topic.php?id=".$topic_id;
	echo "<script type='text/javascript'>alert('Posted Successfully');
	window.location.replace('".$webpage."');</script>";
}
else
{
	echo "<script type='text/javascript'>alert('Sorry..Please try again')";

}
}
?>
