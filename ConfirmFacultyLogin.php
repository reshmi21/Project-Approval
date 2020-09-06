<?php
session_start();
require 'connect.php';
if((isset($_POST["pass"]))and(isset($_POST["dept"])))
{
$stmt=$connect->prepare("SELECT * from faculty WHERE fid=? AND department=?");
$stmt->bindParam(1,$_POST["pass"]);
$stmt->bindParam(2,$_POST["dept"]);
$stmt->execute();
$row=$stmt->fetch();
if($row)
{
echo "desg is" .$row["desg"];
	////echo "logged in";
	$_SESSION['faculty']=$row['facIndex'];
	//echo $_SESSION['username'];
if($row["desg"]=='hod')	
	echo "<script>window.location.href='project-Hod.php';</script>";
if($row["desg"]=='pic')
	echo "<script>window.location.href='project-in-charge.php';</script>";
	//header('location: project-initial.php');
}	
	echo "incorrect username or passwword";
}
?>