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
nav {
    line-height:5px;
    background-color:#eeeeee;
    height:530px;
    width:300px;
    float:left;
    padding:10px;	      
}
section {
    width:350px;
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
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>

$(function() {
$( "#datepicker" ).datepicker();
});

</script> 
<body>
<a href="login.php">HOME</a>
<header>
<h1>Indian Railway</h1>
</header>
<?php 
session_start();
echo "Welcome ". $_SESSION['uname']."<br>";
$station=array();
   $con =mysqli_connect("localhost","root","amit","railway");
   if($con){
   $sql1="select * from station";
   if($result=mysqli_query($con,$sql1)){
    $a=0;
   while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $station[$a]=$row['Sname'];$a++;}
    }
   }
   #$station =array("hii","look");
?>
<nav>
<h1>Book Ticket</h1>
<br>
<form name="book" action="bookticket.php" method="post">
Source: <select name="source" required="required" class="form-control">
        <?php
        for($a=0;$a<sizeof($station);$a++){
        echo "<option value= '$station[$a]'>"."$station[$a]"."<br>"."</option>";
        } 
        ?>
</select> <br>
Destination: <select name="destination" required="required" class="form-control">
        <?php
        for($a=0;$a<sizeof($station);$a++){
        echo "<option value= '$station[$a]'>"."$station[$a]"."<br>"."</option>";
        } 
        ?>
        </select>

Date: <input type="text"  id ="datepicker" name="date">
<input type="submit" value="Submit">
</form> 
</p>

</nav>

<section>
<p>
<ul>

<li> <a href="http://localhost/railway/cancel.php">Cancel</a>  </li>

<br>

<li> <a href="http://localhost/railway/pnrstatus.php">PNR Status</a>  </li>

<br>

<li> <a href="http://localhost/railway/traindetail.php">Train Detail</a>  </li>

<br>

<br>
</ul>

<br>
</p>

</section>

<footer>
Copyright © IndianRailway
</footer>

</body></head>
</html>

