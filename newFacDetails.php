<?php
require 'connect.php';
if((isset($_POST["tid"]))and(isset($_POST["newName"]))and(isset($_POST["newDept"]))and(isset($_POST["newDesg"])))

{
	$stmt1=$connect->prepare("UPDATE faculty SET facName=?,department=?,desg=? WHERE facIndex=?");
	$stmt1->bindParam(1,$_POST["newName"]);
	$stmt1->bindParam(2,$_POST["newDept"]);
	$stmt1->bindParam(3,$_POST["newDesg"]);
	$stmt1->bindParam(4,$_POST["tid"]);
	$up=$stmt1->execute();
	if($up)
	echo "updated record";
	else
		echo "error";
}
?>