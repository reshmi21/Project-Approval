<?php

$studroll="";
$studname="";
$uroll="";
if(isset($_SESSION['username']))
{
$studroll=$_SESSION['username'];
$stmt=$connect->prepare("SELECT * from students WHERE sroll='$studroll'");
$stmt->execute();
$q=$stmt->fetch();
if($q)
{
	$studname=$q['sname'];
	$uroll=$q['suni_roll'];
}
}
?>