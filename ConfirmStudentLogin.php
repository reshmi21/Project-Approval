<?php
session_start();
require 'connect.php';
if((isset($_POST["name"]))and(isset($_POST["pass"])))
{
$stmt=$connect->prepare("SELECT * from students where sroll=? AND spassword=?");
$stmt->bindParam(1,$_POST["name"]);
$stmt->bindParam(2,$_POST["pass"]);
$stmt->execute();
$row=$stmt->fetch();
if($row)
{ 
$username=$_POST["name"];
	echo "logged in";
	$_SESSION['username']=$username;
	echo $_SESSION['username'];
	echo "<script>window.location.href='project-initial.php';</script>";
	//header('location: project-initial.php');
	
}
else
	echo "incorrect username or passwword";
}
?>