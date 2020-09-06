<?php
require 'connect.php';
if((isset($_POST["check"]))and(isset($_POST["eid"])))

{
	$eid=$_POST["eid"];
	$rem=$_POST["check"];
	$stmt1=$connect->prepare("UPDATE uploads SET remark_by_incharge='$rem' WHERE id=$eid");
	$stmt1->execute();

}
if((isset($_POST["comment"]))and(isset($_POST["getid"])))
{
	 $id=$_POST["getid"];
	$comm=$_POST["comment"];
	$stmt2=$connect->prepare("UPDATE uploads SET comment_by_incharge='$comm' WHERE id=$id");
	$stmt2->execute();
}
?>