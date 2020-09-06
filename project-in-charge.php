<?php
session_start();
require 'connect.php';
if (!isset($_SESSION['faculty'])) { 
    $_SESSION['msg'] = "You have to log in first"; 
    header('location: FacultyLogin.php'); 
} 
   
if (isset($_GET['logout'])) { 
    session_destroy(); 
    unset($_SESSION['faculty']); 
    header("location: FacultyLogin.php"); 
} 
?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<!--<link rel="stylesheet" href="style1.css">-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
 <script 
    src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> 
    </script> 
	<style>
	body {
  font-family: "Lato", sans-serif;
}

.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 18px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 26px;
  margin-left: 50px;
}

.openbtn {
  font-size: 15px;
  cursor: pointer;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #444;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}
tr:nth-child(even) {
  background-color: #f2f2f2;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
	</style>
</head>
<body>

<div class="container">
<div class="col-45">
<?php 
if(isset($_SESSION["faculty"]))
{ 
$stmt=$connect->prepare("SELECT * from faculty WHERE facIndex=?");
$stmt->bindParam(1,$_SESSION["faculty"]);
$stmt->execute();
$row=$stmt->fetch();
if($row)
{?>
<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="updateFacProfile.php?id=<?php echo $row["facIndex"]; ?>">update profile</a>
  <a href="ChangePassword.php?id=<?php echo $row["facIndex"]; ?>">Change Password</a>
     <a href="project-in-charge.php?logout='1'">Logout</a>
  <a href="index.php">Contact</a>
</div>
<div id="main">
  <button class="openbtn" onclick="openNav()">☰ Welcome <?php echo $row["facName"]; ?></button>  
<?php }
} ?>
</div>
</div>
<div class ="col-65">
<table class="table table-bordered" id="table">
<thead>
<tr>
<th>ID</th>
<th>Student name</th>
<th>Student class roll</th>
<th>Student university roll</th>
<th>Title</th>
<th>decsription</th>
<th>abstract</th>
<th>Evaluate</th>
<th>comments/reason of rejection</th>
</tr>
</thead>
<tbody>
<?php
require 'connect.php';
$stmt=$connect->prepare("select * from uploads WHERE remark_by_hod='accept'");
$stmt->execute();
while($row=$stmt->fetch())
{?>
<tr>
<td><?php echo $row['id']?></td>
<td><?php echo $row['studentName']?></td>
<td><?php echo $row['studentRoll']?></td>
<td><?php echo $row['studentUniRoll']?></td>
<td><?php echo $row['title']?></td>
<td><?php echo $row['description']?></td>
<td class="text-center"><a href="downloadFile.php?id=<?php echo $row['id']?>" class="btn btn-primary">Download</a></td>
<td class="text-center" id="eval">
<button class="btn btn-success" id="accept" value="accept" onclick="show(this,<?php echo $row['id']?>)" ><i class="fa fa-thumbs-up"></i></button>
<button class="btn btn-danger" id="reject" value="reject" onclick="show(this,<?php echo $row['id']?>)"><i class="fa fa-thumbs-down"></i></button>
<p id="demo"></p>
</td>
<td class="text-center">
<textarea  name="" id="comment" rows="3" cols="25" onchange="getComment(this,<?php echo $row['id']?>)"></textarea>
</td>
</tr>
<?php
}

?>
</tbody>
</table>
</div>
</div>
<script>

function show(e,eid)
{	
var check=e.value;
var parent=e.parentElement;
//console.log(parent);
if(e.value==='accept'){
e.innerHTML= "ACCEPTED";
 parent.querySelector('#reject').style.display="none";
 }
if(e.value==='reject'){
e.innerHTML= "REJECTED";
 parent.querySelector('#accept').style.display="none";
 }
 $.post('ForwardFile.php',{eid:eid,check:check},function(data)
			{
				$('#demo').html(data);
			}
			);
}

function getComment(e1,e2)	
{
	var comment=e1.value;
	var getid=e2;
	//console.log(e2);
	$.post('ForwardFile.php',{comment:comment,getid:getid},
	function(data)
			{
				$('#demo').html(data);
				
			}
			);
}
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}	
	
</script>

</body>
</html>