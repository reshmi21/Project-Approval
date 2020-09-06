<?php
require 'connect.php';
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
</head>
<body>
<form class="form-horizontal" method="post" action="">
  <div class="form-group">
    <label class="col-sm-2 control-label">Enter the new password</label>
    <div class="col-sm-8">
      <input class="form-control" id="focusedInput" type="password" value="">
    </div>
	 <button class="btn btn-primary" name="update">update</button>
  </div>
 
</form>
<?php
if(isset($_GET['id']))
{
	
	if(isset($_POST['update']))
	{
	//echo "BTN IS ".$_POST["update"];	
	if(isset($_POST['newPassword']))
	{
	$stmt1=$connect->prepare("UPDATE faculty SET fid=? WHERE facIndex=?");
	$stmt1->bindParam(1,$_POST['newPassword']);
	$stmt1->bindParam(2,$_GET['id']);
	$stmt1->execute();
	}
	}
} 
?>
</body>
</html>