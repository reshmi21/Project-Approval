<?php 
require 'connect.php';
if(isset($_POST["submit"]))
{
	if((isset($_POST["Name"]))and (isset($_POST["Email"])) and (isset($_POST["Message"])))
	{
		$row=$connect->prepare("INSERT into message VALUES('',?,?,?)");
 $row->bindParam(1,$_POST['Name']);
	  $row->bindParam(2,$_POST['Email']);

	$row->bindParam(3,$_POST['Message']);
	  $exe=$row->execute();
	 if($exe)
	echo "<script>window.location.href='index.php';</script>";
	}
}
?>