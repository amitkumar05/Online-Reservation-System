<!DOCTYPE html>
<html>
<head>
	<title>user reg.</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">	<div class="form-group">
   <form name ="user"     method ="POST">
   	name      :	 <input   type="text" required="required" class="form-control"  name ="name" ><br>
   	address   :   <input  type ="text" required="required" class="form-control" name ="address"><br>
   	phone	  :   <input  type ="int" required="required" class="form-control" name ="phone"><br>
   	Mail_id    :   <input  type ="text"  required="required" class="form-control" name ="mail_id"><br>
   	age    :   <input  type ="int"  required="required" class="form-control" name ="age"><br>
	   	gender    :   <input type="radio"  name ="gender" value="M">Male
	   				<input type="radio" name ="gender" value="F">Female<br>
   	password  :   <input  type ="password" required="required"  name ="password"><br>
   	<input type ="submit" value="go">
   	</form></div>
   	</div>
<?php  session_start();  $check=0;
 	$con 	=	 mysqli_connect("localhost","root","amit","railway");
 	if($con){
 	if(isset($_POST['name']))
	{
 	 	$sql1 	=	"insert into user (Name,Gender,Age,Mobileno,Mail_id,Passwd,Address) values ('$_POST[name]','$_POST[gender]'
 			,'$_POST[age]','$_POST[phone]','$_POST[mail_id]','$_POST[password]','$_POST[address]')";
	
		if(mysqli_query($con,$sql1))
			{   $newurl="login.php";
            $_SESSION['name']=$_POST['name'];
            header('LOCATION: '.$newurl);
			}
		else
			echo "error".mysqli_error();
	
	}
}

else
	echo "failed connection ".mysqli_connet_error();
?>
</body>
</html>
