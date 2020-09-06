<?php 
require 'connect.php';
if(isset($_POST["add"]))
{
	if((isset($_POST["username"]))and (isset($_POST["roll"]))and (isset($_POST["uroll"])) and (isset($_POST["email"]))and 
	(isset($_POST["password"])))
	{
		$row=$connect->prepare("INSERT into students VALUES('',?,?,?,?,?)");
 $row->bindParam(1,$_POST['username']);
	  $row->bindParam(2,$_POST['roll']);
	   $row->bindParam(3,$_POST['uroll']);	
	$row->bindParam(4,$_POST['email']);
	  $row->bindParam(5,$_POST['password']);
	  $exe=$row->execute();
	 if($exe)
	echo "<script>window.location.href='StudentLogin.php';</script>";
	}
}
?>