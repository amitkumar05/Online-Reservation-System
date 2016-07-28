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
    line-height:20px;
    background-color:#eeeeee;
    height:530px;
    width:350px;
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
</head>

<body>
<a href="login.php">HOME</a>

<section>
<?php
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
<form method ="POST" action ="add.php">
Train no:<input type="int" required="required" class="form-control" name="tno" ><br>
Train name:<input type="text" required="required" class="form-control" name="tname" ><br>
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
</select> <br>
Type: <select name="type" required="required" class="form-control">
        <option value="EXPRESS"> Express</option>
        <option value="SUPERFAST">Superfast</option>
</select> <br>time_source:<input type="time" required="required" class="form-control" name="tso" ><br>
time_destination:<input type="time" required="required" class="form-control" name="tde" ><br>
AC3 seats:<input type="int" class="form-control" required="required" name="ac" ><br>
Sleeper seats:<input type="int " class="form-control" required="required" name="sl" ><br>
Days : <br>Monday<input type ="radio" name="mon"  value ="y"><br>
        Tuesday<input type ="radio" name="tue" value ="y"><br>
        Wednesday<input type ="radio" name="wed" value ="y"><br>
        Thursday<input type ="radio" name="thu" value ="y"><br>
        Friday<input type ="radio" name="fri" value ="y"><br>
        Saturday<input type ="radio" name="sat" value ="y"><br>
        Sunday<input type ="radio" name="sun" value ="y"><br>
<input type ="submit" value="add"></form></div>
<?php
    
    if($con){
    if(isset($_POST['tno']))
    {
        $sql1 ="insert into train (Trainno,Train_name,Source,Destination,Type,Time_Source,Time_Destination,Time_Taken)  
        values ('$_POST[tno]','$_POST[tname]','$_POST[source]','$_POST[destination]','$_POST[type]','$_POST[tso]','$_POST[tde]','$_POST[tt]')"; 
        
        if(mysqli_query($con,$sql1))
            {
                echo "train successfully added<br>";    
            }
        else
            echo "error".mysqli_error();
        $sql1 ="insert into trainclassdetail (Trainno,Sleeper,AC3)  
        values ('$_POST[tno]','$_POST[sl]','$_POST[ac]')";
        if(mysqli_query($con,$sql1))
            {
                echo "train successfully added<br>";    
            }
        else
            echo "error".mysqli_error();
        if(isset($_POST['mon']))
            $mon='Y';
        else
            $mon='N';
                if(isset($_POST['tue']))
            $tue='Y';
        else
            $tue='N';
                if(isset($_POST['wed']))
            $wed='Y';
        else
            $wed='N';
                if(isset($_POST['thu']))
            $thu='Y';
        else
            $thu='N';
                if(isset($_POST['fri']))
            $fri='Y';
        else
            $fri='N';
                if(isset($_POST['sat']))
            $sat='Y';
        else
            $sat='N';
                    if(isset($_POST['sun']))
            $sun='Y';
        else
            $sun='N';
        $sql1 ="insert into trainday (Trainno,Mon,Tue,Wed,Thu,Fri,Sat,Sun)  
        values ('$_POST[tno]','$mon','$tue','$wed','$thu','$fri','$sat','$sun')";
        if(mysqli_query($con,$sql1))
            {
                echo "train successfully added<br>";    
            }
        else
            echo "error".mysqli_error();


    }
}
else
    echo "failed connection ".mysqli_connet_error();

?>
</section>
<footer>
Copyright © IndianRailway
</footer>

</body>
</html>

