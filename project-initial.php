
<?php
session_start();
require 'connect.php';
if (!isset($_SESSION['username'])) { 
    $_SESSION['msg'] = "You have to log in first"; 
    header('location: StudentLogin.php'); 
} 
   
if (isset($_GET['logout'])) { 
    session_destroy(); 
    unset($_SESSION['username']); 
    header("location: StudentLogin.php"); 
} 
?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link rel="stylesheet" href="styleFirst.css">
</head>

<body>

<div class="container">
<div class="project-form">
<?php include 'InputDetail.php'; ?>
<p>
welcome <strong><?php echo $studname ?> </strong>
 </p>

<form action="upload.php" method="post" enctype="multipart/form-data">
<div class="form-control">
<label for "title">enter the project title</label>
<input type="text" id="title" name="title" placeholder="enter the project title"/>
</div>
<div class="form-control">
<label for "desc">enter a description of project(100 words)</label>
<textarea id="desc" name="desc" class="md-textarea form-control" rows="3"></textarea>
</div>
<div class="form-control">
<label for "p_file">Upload the abstract of your project</label>
<input type="file" id="p_file" name='p_file'/>
</div>
<button type="submit" name="submit">Upload</button>
</form>
  <p>  
  <a href="project-initial.php?logout='1'" style="color: red;"> 
   Click here to Logout 
   </a> 
  </p>
<p>  
<a href='ProjectStatus.php' class="btn btn-primary">See status</a>
</p>
</div>
</body>
</html>
