<?php
session_start();
$ch= $_POST["ccid"];
//echo $ch;

$using=$_SESSION['useridenti'];
$con=mysql_connect("localhost","root","");
if(!$con)
die("connection failed".mysql_error());
mysql_select_db("courseware",$con);
$check=mysql_query("SELECT * FROM relation  WHERE (cid=$ch AND user_id=$using)");
$rows=mysql_num_rows($check);
if ($rows==0)
{	echo "delete not possible:incorrect data input";
     echo  '<a href="http://localhost/password_test/check.php"><br>Go Back</a>'; }  
else 
	{ echo "delete successful";
$result=mysql_query("DELETE FROM relation  WHERE (cid=$ch AND user_id=$using)");
   echo  '<a href="http://localhost/password_test/check.php"><br>Go Back</a>'; }
?>