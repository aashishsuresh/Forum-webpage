<?php
include('session.php');
include('config.php');
$user_id=$_GET['id'];
$user1contacts=$user_check."_contacts";
$user2contacts=$user_id."_contacts";
$sql="select * from users WHERE user_id='$user_id'";
$result = mysqli_query($db,$sql);
if($result)
{
  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
  $username=$row['user_name'];
}
$sql1 = "insert into $user1contacts values('$user_id','$username')";
$result1 = mysqli_query($db,$sql1);
$sql2 = "insert into $user2contacts values('$user_check','$login_session')";
$result2 = mysqli_query($db,$sql2);
echo "<script type='text/javascript'>alert('Posted Successfully');
window.location.replace('addcontacts.php');</script>";
?>
