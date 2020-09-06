<?php
require 'connect.php';
if((isset($_POST["name"]))and(isset($_POST["pass"]))and(isset($_POST["dept"]))and(isset($_POST["post"])))
{
$stmt=$connect->prepare("INSERT into faculty VALUES('',?,?,?,?)");
$stmt->bindParam(1,$_POST["name"]);
$stmt->bindParam(2,$_POST["pass"]);
$stmt->bindParam(3,$_POST["post"]);
$stmt->bindParam(4,$_POST["dept"]);
$exe=$stmt->execute();
if($exe)
echo "Succesfully registered";	
}	


	
?>