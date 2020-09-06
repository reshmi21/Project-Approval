
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
	<h1>Faculty Login</h1>
	<label for "pass">enter your college id</label>
	<input type="password" id="pass" placeholder="enter password" required />
	<label for "fdept">Choose your dept</label>
	<select id="fdept">
	<option value="">Choose your department</option>
	<option value="ece">ECE</option>
	<option value="cse">CSE</option>
	<option value="ee">EE</option>
	<option value="it">IT</option>
	<option value="aiee">AIEE</option>
	</select>
	<button class="btn btn-primary btn-lg" type="Submit" id="login">Login</button><br><br>
		 <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
	<p id="demo"></p><br>
	<p>Don't have an account? <a href="FacultyReg.php">Sign Up</a></p>
	</div>
	</div>
	
<script>
$('#login').click(function()
{
	pass=$('#pass').val();
	dept=$('#fdept').val();
	console.log(dept);
$.post('ConfirmFacultyLogin.php',{pass:pass,dept:dept},function(data)
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