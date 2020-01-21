<?php
   include('logindirect.php');
   session_start();
   $user_check = $_SESSION['login_user'];
   $user_type = $_SESSION['login_as'];
   $password = $_SESSION['password'];
   if($user_type=="regularmember")
   {
   $ses_sql = mysqli_query($db,"select Name from alumnimembers where registerno = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['Name'];
  }
  elseif($user_type=="faculty")
  {
  $ses_sql = mysqli_query($db,"select Name from faculties where employeeid = '$user_check' ");
  $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
  $login_session = "Prof.".$row['Name'];
 }
 else {
   $ses_sql = mysqli_query($db,"select groupname from groups where groupid = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['groupname'];
 }
   if(!isset($_SESSION['login_user']))
   {
      header("location:mainpage.php");
   }
?>
