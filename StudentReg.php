
<!DOCTYPE html>
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link rel="stylesheet" href="StyleForm.css"/>
	<!-- Latest compiled and minified CSS -->

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
<h2>Student Registration</h2>
<form class="form" id="form" action="AddStudent.php" method="post">
<div class="form-control">
<label for "username">Username</label> 
<input type="text" id="username" name="username" placeholder="enter your name"/>
<small>Error message</small>
</div>
<div class="form-control">
<label for "roll">Your roll no:</label> 
<input type="text" id="roll" name="roll" placeholder="ex:ECE/2017/098"/>
<small>Error message</small>
</div>
<div class="form-control">
<label for "uroll">Your university roll no:</label> 
<input type="text" id="uroll" name="uroll" placeholder="enter your university roll">
<small>Error message</small>
</div>
<div class="form-control">
<label for "email">Email</label>
<input type="text" id="email" name="email" placeholder="enter your email"/>
<small>Error message</small>
</div>
<div class="form-control">
<label for "password">Password</label>
<input type="password" id="password" name="password" placeholder="enter your password"/>
<small>Error message</small>
</div>
<div class="form-control">
<label for "password2">Confirm Password</label>
<input type="password" id="password2" name="password2" placeholder="confirm your password"/>
<small>Error message</small>
</div>
<div class="clearfix">
      <button type="submit" class="signupbtn"name="add" >Sign Up</button>
	    <button type="button" class="cancelbtn">Cancel</button>
    </div>
</form>
<p id="demo"></p>
</div>
<script>
/*const form = document.getElementById('form');
const username = document.getElementById('username');
const roll = document.getElementById('roll');
const uroll = document.getElementById('uroll');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');

// Show input error message
function showError(input, message) {
  const formControl = input.parentElement;
  formControl.className = 'form-control error';
  const small = formControl.querySelector('small');
  small.innerText = message;
}

// Show success outline
function showSuccess(input) {
  const formControl = input.parentElement;
  formControl.className = 'form-control success';
}

// Check email is valid
function checkEmail(input) {
  const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (re.test(input.value.trim())) {
    showSuccess(input);
  } else {
    showError(input, 'Email is not valid');
  }
}

// Check required fields
function checkRequired(inputArr) {
  inputArr.forEach(function(input) {
    if (input.value.trim() === '') {
      showError(input, `${getFieldName(input)} is required`);
    }
  });
 
 
}

// Check input length
function checkLength(input, min, max) {
  if (input.value.length < min){
    showError(
      input,
      `${getFieldName(input)} must be at least ${min} characters`);
  }
  else if (input.value.length > max) {
    showError(
      input,
      `${getFieldName(input)} must be less than ${max} characters`
    );
  }
  else {
    showSuccess(input);
  }
	}


// Check passwords match
function checkPasswordsMatch(input1, input2) {
  if (input1.value !== input2.value) {
    showError(input2, 'Passwords do not match');
  }
  else
  {
	  showSuccess(input2);
  }
}

// Get fieldname
function getFieldName(input) {
  return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}

// Event listeners
form.addEventListener('submit', function(e) {
  e.preventDefault();
  if(username.value===''|| email.value==='' || password.value===''||password2.value==='')
  checkRequired([username, email, password, password2]);
else
{
checkLength(username,3, 15);
//checkLength(roll,3, 15);
//checkLength(uroll,3, 15);
	 checkLength(password, 6, 25);	
       checkEmail(email);
  checkPasswordsMatch(password, password2);	 
}
});
/*$('#add').click(function()
{
 $.post('AddStudent.php',{username:username,roll:roll,uroll:uroll,password:password,email:email},
function(data){
$('#demo').html(data);
});
});
*/
</script>
</body>
</html>
