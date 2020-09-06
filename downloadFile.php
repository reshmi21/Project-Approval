<?php
require 'connect.php';

if(isset($_GET['id']))
{
		$id=$_GET['id'];
		$stmt=$connect->prepare("select * from uploads where id=?");
		$stmt->bindParam(1,$id);
		$stmt->execute();
		$row=$stmt->fetch();
		$filename=$row['name_of_file'];
		$file=$row['file'];
		//echo $file;
		if(file_exists($file))
		{
			header('Content-type: application/pdf'); 
  
		header('Content-Disposition: inline; filename="' . $filename . '"'); 
  
			header('Content-Transfer-Encoding: binary'); 
  
			header('Accept-Ranges: bytes'); 
  
// Read the file 
			@readfile($file); 
		}
}
