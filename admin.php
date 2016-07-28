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
<header>
<h1>Indian Railway</h1>
</header>

<nav>
<p>
<ul>

<li> <a href="addtrain.php">Add train</a>  </li>

<br>

<li> <a href="removeuser.php">Remove User</a>  </li>

<br>

<li> <a href="addstation.php">Add Station</a>  </li>

<br>

</ul>

</p>

</nav>

<section>

<h1>
<?php
session_start();
echo "$_SESSION[uname]"; 
?>
, AND I AM ADMIN </h1>

</section>

<footer>
Copyright © IndianRailway
</footer>

</body>
</html>

