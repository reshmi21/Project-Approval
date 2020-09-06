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
</head>
<body>

<div class="container">
<p id="head">approved by</p>
<div class="progress">
<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" id="progress" style="" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<button class="btn btn-primary" id="details">SEE SUGGESTIONS</button>
<p id="foot"></p>
</div>
	<script>
	let pcg
	//var count = Number(document.getElementById('count').innerHTML); //set this on page load in a hidden field after an ajax call
//var total = document.getElementById('total').innerHTML; //set this on initial page load
<?php
session_start();
require 'connect.php';
if(isset($_SESSION['username']))
{
	$id=$_SESSION['username'];
$stmt=$connect->prepare("select * from uploads where studentRoll='$id'");
$stmt->execute();
while($row=$stmt->fetch())
{ ?>
if('<?php echo $row["remark_by_hod"]; ?>'==='reject')
{
	pcg=100;
	document.getElementById('progress').classList.remove('progress-bar-success');
	document.getElementById('progress').classList.add('progress-bar-danger');
	document.getElementById('head').innerHTML="Sorry your project proposal is rejected";

}
else if(('<?php echo $row["remark_by_hod"]; ?>'==='accept')&&('<?php echo $row["remark_by_incharge"]; ?>'==='accept'))
{ 
	 pcg=100;
	 document.getElementById('head').innerHTML="your project proposal is approved! continue with your work";
 }
 else if('<?php echo $row["remark_by_hod"];?>'==='accept')	
{
	pcg=50;
	document.getElementById('progress').classList.add('progress-bar-success');	
	if('<?php echo $row["remark_by_incharge"]; ?>'==='reject')
	{
	pcg=100-pcg;	
	document.getElementById('progress').classList.add('progress-bar-danger');
	document.getElementById('head').innerHTML="Sorry your project proposal is rejected by incharge.Follow the suggestions and submit";
	}
}
 else
{
	 pcg=0;
 } 

 console.log(pcg);
document.getElementsByClassName('progress-bar').item(0).setAttribute('aria-valuenow',pcg);
document.getElementsByClassName('progress-bar').item(0).setAttribute('style','width:'+Number(pcg)+'%');
$('#details').click(function()
{
	$('#foot').html("by hod:<h3><?php echo $row["comment_by_hod"];?></h3>"+"by project-in-charge:<h3><?php echo $row["comment_by_incharge"];?></h3>");

}
);	
	 <?php } 
} ?>
	</script>
	</body>
	</html>