
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet"  href="StyleLogin.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!--<link rel="stylesheet" href="mystyle.css">-->
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
	<h1>Student Login</h1>
	<label for "sroll">enter your class roll no</label>
	<input type="text" id="sroll" placeholder="enter your roll number" required />
	<label for "pass">enter your password</label>
	<input type="password" id="pass" placeholder="enter password" required />
	<button class="btn btn-primary btn-lg" type="Submit" id="login">Login</button><br><br>
	<p id="demo"></p><br>
	 <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
	<p>Don't have an account? <a href="StudentReg.php">Sign Up</a></p>
	</div>
	
<script>
$('#login').click(function()
{
	name=$('#sroll').val();
	pass=$('#pass').val();
$.post('ConfirmStudentLogin.php',{name:name,pass:pass},function(data)
	{
		$('#demo').html(data);
		//==='logged in')
		//{
			//window.open('project-initial.php');
          //return false;
		//}
	}
	);
  
});
</script>
</body>
</html>