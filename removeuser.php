
<html>
<head>
<title>Search</title>
<body>
<a href="login.php">HOME</a>
<?php
$user=array();
$a=0;
$con    =    mysqli_connect("localhost","root","amit","railway");
    if($con){
        $sql="select Mail_id from user";
        if($result=mysqli_query($con,$sql)){
                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                {
                    $user[$a]=$row['Mail_id'];
                    $a++;
                }
        }
        else
            echo "error".mysqli_error();
        }
        $a=0;
?>
<div class="container">
<form method ="POST" action ="removeuser.php">
User you want to delete :
<input name ="user" id="user" list="suggests">
<datalist id="suggests">
<?php while($a < sizeof($user)) {
    echo "<option value=";echo $user[$a++] .">";}
    ?>
</datalist>
<br>
<input type="submit" value="delete">
<?php
if(isset($_POST['user'])){
    $sql="delete from user where Mail_id='$_POST[user]'";
    if(mysqli_query($con,$sql))
    {
        $sql="select count(*) from user where Mail_id='$_POST[user]'";
        if($result=mysqli_query($con,$sql))
        {
                if($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    if($row['count(*)']==0)echo "Deleted successfully";
                    else
                        echo "error in deleting the user";
                }
                else
                    echo "error2".mysqli_error();
        }
        else
            echo "error3".mysqli_error();
    }
}
?>
</body>
</head>
</html>
