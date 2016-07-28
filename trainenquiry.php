<!DOCTYPE html>
<html>

<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}

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
height:500px;
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
</head>

<body>
<a href="login.php">HOME</a>
<header>
<h1>Indian Railway</h1>
</header>

<nav>
<h1>Book Ticket</h1>
<br>
<p>
<form name="book" action="http://localhost/railway/bookticket.php" method="post">
From: <input type="text" name="source">
To: <input type="text" name="destination">
Class: <input type="radio" name="sex" value="Sleeper">Sleeper
<input type="radio" name="sex" value="AC3">AC3<br>
Date: <input type="text" name="date">
<input type="submit" value="Submit">
</form> 
</p>

</nav>

<section>
<p>
<?php
//echo $_POST['source'];
//echo $_POST['destination'];
//echo $_POST['class'];
//echo $_POST['date'];

$con = mysqli_connect("localhost","root","amit","railway");
	if(!$con)
	{
		echo("<p>Connection to content server failed.</p>");
		exit();
	}
	else
	{
	$a="select * from train,trainday,trainstatus where train.Trainno=Trainstatus.Trainno and train.Trainno=traindat.Trainno"	

//$a="select train.Trainno,train.Train_name,trainday.Mon,trainday.Tue,trainday.Wed,trainday.Thu,trainday.Fri,trainday.Sat,trainday.Sun from train,trainday where train.Trainno=trainday.Trainno and Source='{$_POST['source']}' and Destination='{$_POST['destination']}'";	
//echo "<br>";
//echo $a;
		$result=mysqli_query($con,$a);
		if($result->num_rows===0) {echo "EMPTY QUERY! ";exit(0);}		
	        
		?>		
		<table style="width:100%">
		<tr>
		       <th>Trainno</th>
	               <th>Train name</th>		
    		       <th>M</th>
 		       <th>T</th>
   		       <th>W</th>   		       
			<th>T</th>
   		       <th>F</th>
   		       <th>S</th>
			<th>S</th>
			<th>Current Status</th>

		</tr> 
		<?php		
		while($row = mysqli_fetch_array($result)) 
		{ 			
		?>		
		<tr>		     
			
		      <td> <a href="http://localhost/railway/bookticket1.php"><?php echo $row['Trainno'];?> </a>  </td>

			<td><?php echo $row['Train_name'];?> </td>
			<td><?php echo $row['Mon'];?> </td>
			<td> <?php echo $row['Tue'];?> </td>
		       <td><?php echo $row['Wed'];?> </td>
			<td><?php echo $row['Thu'];?> </td>
			<td> <?php echo $row['Fri'];?> </td>
		       <td><?php echo $row['Sat'];?> </td>
			<td><?php echo $row['Sun'];?> </td>
			<td><?php echo
		</tr>
	       <?php       
		}
		?>		
		</table>	
	       <?php       
		}
		?>		
	


</section>

<footer>
Copyright © IndianRailway
</footer>

</body>
</html>

