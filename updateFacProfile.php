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
	<body>
	<div class="container">
	<table class="table table-bordered" id="table" >
<thead>
<tr>
<th>ID</th>
<th>Faculty name</th>
<th>Department</th>
<th>Designation</th>
<th></th>
</tr>
</thead>
<tbody>
<?php
if(isset($_GET['id']))
{
$stmt=$connect->prepare("select * from faculty WHERE facIndex=?");
$stmt->bindParam(1,$_GET['id']);
$stmt->execute();
while($row=$stmt->fetch())
{?>
<tr>
<td id="tid"><?php echo $row['facIndex']?></td>
<td><input type="text" id="newName"><?php echo $row['facName']?></td>
<td><input type="text" id="newDept"><?php echo $row['department']?></td>
<td><input type="text" id="newDesg"><?php echo $row['desg']?></td>
<td><button class="btn btn-primary" name="save" id="save">Save</button></td>
<tr>

<?php
}
}
?>
<p id="demo"></p>
</tbody>
</table>
</div>
<script>

$('#save').click(function()
{
<?php
if(isset($_GET['id']))
{ ?>
	tid=<?php echo $_GET['id'];?>;
	newName=$('#newName').val();
	newDept=$('#newDept').val();
	newDesg=$('#newDesg').val();
	console.log(tid);
	$.post('newFacDetails.php',{tid:tid,newName:newName,newDept:newDept,newDesg:newDesg},function(data)
		{
			$('#demo').html(data);
		});
});
<?php } ?>
	</script>
	</body>
	</html>