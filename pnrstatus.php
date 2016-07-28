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
    
    height:530px;
    width:300px;
    float:left;
    padding:10px;	      
}
section {
	line-height:25px;   
	 width:920px;
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
</head>

<body>
<a href="login.php">HOME</a>
<header>
<h1>Indian Railway</h1>
</header>

<nav>
<p>
</p>

</nav>

<section>

<?php 

if(isset($_POST['pnr']))
{
	$con = mysqli_connect("localhost","root","amit","railway");
?>
<h1>
PNR STATUS:
</h1>
<?php
$a="select * from train,ticket where train.Trainno=ticket.Trainno and ticket.PNR={$_POST['pnr']}";
$result=mysqli_query($con,$a);
$row = mysqli_fetch_array($result);


	$pnr=$row['PNR'];
	$date=$row['Date'];
	$no=$row['No_Passenger'];
	$fare=$row['Fare'];
	$agent=$row['Bookedby'];
	$trainno=$row['Trainno'];
	$times=$row['Time_Source'];
	$timed=$row['Time_Destination'];
	$source=$row['Source'];
	$destination=$row['Destination'];
	$trainname=$row['Train_name'];
	$time=$row['Time_Taken'];
	$class=$row['Class'];
?>	
<table style="width:100%">
<p>
		<tr>
			<th>PNR No.</th> 		       
			<th>Trainno</th>
	               <th>Train name</th>		
    		       <th>Date</th>
 		       <th>Class</th>
   		        <th>Fare</th> 		       	    
		</tr> 
		<tr>		     
			<td> <font size="3"> <?php echo $pnr;?> </font></td>			
		        <td> <font size="3"><?php echo $trainno;?></font></td>
			<td> <font size="3"> <?php echo $trainname;?> </font></td>
			<td> <font size="3"> <?php echo $date;?> </font></td>
			<td> <font size="3"> <?php echo $class;?> </font></td>
			<td> <font size="3"> <?php echo $fare;?> </font></td>
			
		</tr>
		<tr>
		       <th>Boarding Station</th>
 		       <th>Leaving Station</th>   		       
			<th>Arrival Time</th>
	               <th>Departure Time</th>		
    		       	<th>Time Taken</th>		
			<th>Booked By</th>
		
		</tr> 
		<tr>
			<td> <font size="3"> <?php echo $source;?> </font></td>
			<td> <font size="3"> <?php echo $destination;?> </font></td>
			<td> <font size="3"> <?php echo $times;?> </font></td>
			<td> <font size="3"> <?php echo $timed;?> </font></td>
			<td> <font size="3"> <?php echo $time;?> </font></td>			

		</tr>
</p>	

<?php

$a="select * from passengerdetail where PNR={$_POST['pnr']}";
$result=mysqli_query($con,$a);
$i=0;
while($row = mysqli_fetch_array($result))
{
$i++;

?>

<table style="width:100%">
<p>
		<tr>
			<th>S.no</th>		      
			 <th>Passenger name</th>
	               <th>Age</th>		
    		       <th>Gender</th>
 		       <th>Status</th>
			<th>Berth no.</th>  		      
		</tr> 
	
		<tr>
			<td> <font size="3"> <?php echo $i;?> </font></td>
			<td> <font size="3"> <?php echo $row['Name'];?> </font></td>
			<td> <font size="3"> <?php echo $row['Age'];?> </font></td>
			<td> <font size="3"> <?php echo $row['Gender'];?> </font></td>
			<td> <font size="3"> <?php echo $row['Current_Mode'];?> </font></td>
			<td> <font size="3"> <?php echo $row['Current_Status'];?> </font></td>		
		</tr>
<?php
	}
?>
</p>
<?php
}

else
{
?>

<form name="input" action="<?php $_PHP_SELF?>"  method="post">
PNR : <input type="text" name="pnr"></br> 
<input type="submit" value="Submit">
</form>
<?php
}
?>
</section>


</body>
</html>



