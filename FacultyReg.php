
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="StyleReg.css">
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
	<h1>Faculty Registration</h1>
	 <label for "fname">enter your name</label>
	<input type="text" id="fname" placeholder="enter your name" required />
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
	<label for "fpost">Choose your post</label>
	<select id="fpost">
	<option value="">Choose your post</option>
	<option value="hod">Head of department</option>
	<option value="pic">Project in charge</option>
	</select>
		<div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn" id="reg">Sign Up</button>
    </div>
	<p>Already registered ?<a href="FacultyLogin.php">Login</a></p>
	<p id="show"></p>
	</div>
	<script>
$('#reg').click(function()
{
	name=$('#fname').val();
	pass=$('#pass').val();
	dept=$('#fdept').val();
	post=$('#fpost').val();
	
	/*<?php
	 require 'connect.php';
	 $stmt1=$connect->prepare("SELECT * FROM faculty");
	 $stmt1->execute(); 
	while($row=$stmt1->fetch())
	{	?>
	 if(pass===<?php echo $row["fid"];?>)
	 { 
	error=1; 
	 }
	<?php } ?> 
	console.log(error);
if(error===1)
{
	$('#show').html("Choose a different password");
}
else
{*/	
$.post('AddFaculty.php',{name:name,pass:pass,dept:dept,post:post},function(data)
	{
		$('#show').html(data+" "+'Now'+'<a href="FacultyLogin.php">Login</a>');
		//==='logged in')
		//{
          //return false;
		//}
	}
	);

});
</script>
</body>
</html>