<!DOCTYPE html>
<html>

<head>
<style>
header {
    background-color:black;
    color:white;
    text-align:center;
    padding:5px;	 
}
section {
    height:510px;
    width:1000px;
    float:left;
    padding:10px;	 	 
}
footer {
    background-color:black;
    color:white;
    clear:both;
    text-align:center;
    padding:5px;	 	 
}
</style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
<a href="login.php">HOME</a>
<div class="container"> <div class="form-group">
   <form name ="user"     method ="POST">
   user    :     <input   type ="text"  required="required" class="form-control"   name ="uname" ><br>
    password :   <input  type ="password"  required="required" class="form-control"   name ="password"><br>
    <input type ="submit" class="form-control" value="Login">
    </form></div>
    </div>
<?php 
session_start();
   $con  =   mysqli_connect("localhost","root","amit","railway");
   if($con){
   if(isset($_POST['uname']))
   {
      $sql1    =  "select count(*) from user where Mail_id='$_POST[uname]' and Passwd='$_POST[password]'";
      if($result=mysqli_query($con,$sql1))
         {
            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
               if($row['count(*)']==1){echo "welcome";$check=1;}
               else
                  $check=0;
            }
         }
      else
         echo "error".mysqli_error();
  
   if($check==1){
      $sql="select Name from user where Mail_id='$_POST[uname]' and Passwd='$_POST[password]'";
      if($result=mysqli_query($con,$sql)){
         while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
            echo "<br>".$row['Name'];
            $newurl="user.php";
            $_SESSION['uname']=$row['Name'];
            header('LOCATION: '.$newurl);
         }
      }
      else
         echo "error".mysqli_error();
   }
   else{
      echo "Incorrect username  or password<br>";
   }
}
}
else
   echo "failed connection ".mysqli_connet_error();
?>
<footer>
Copyright © IndianRailway
</footer>

</body>
</html>

