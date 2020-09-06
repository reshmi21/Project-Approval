<?php
require 'connect.php';
session_start();


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["p_file"]["name"]);
$filename=basename($_FILES["p_file"]["name"]);
//echo $target_file;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$uploadOk=1;
if(isset($_POST["submit"])) {
	if($_FILES["p_file"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
	$uploadOk=0;
	}
	else
	{
 if (move_uploaded_file($_FILES['p_file']['tmp_name'], $target_file)) {
   // echo "File is valid, and was successfully uploaded.\n";
	$uploadOk=1;
} else {
    echo "File uploading failed.\n";
	$uploadOk=0;
}

}
include 'InputDetail.php';
if($uploadOk==1)
{
$row=$connect->prepare("INSERT into uploads VALUES('',?,?,?,?,?,?,?,'','','','')");
 $row->bindParam(1,$studname);
	  $row->bindParam(2,$_SESSION['username']);
	   $row->bindParam(3,$uroll);	
	$row->bindParam(4,$_POST['title']);
	  $row->bindParam(5,$_POST['desc']);
	 $row->bindParam(6,$filename);
	   $row->bindParam(7,$target_file);
	    $exe=$row->execute();
		if($exe)
	echo "<script>window.location.href='FacultyReg.php';</script>";
}
}

?>