<?php
$admin=$_POST["aname"];
$pass=$_POST["pass"];
// Connect to the database
$con = mysql_connect("localhost","root","");
// Make sure we connected succesfully
if(! $con)
{
    die('Connection Failed'.mysql_error());
}

// Select the database to use
mysql_select_db("courseware",$con);
echo "<body style='background-color:seagreen'>";
$result = mysql_query("SELECT * from admin where admin_id='$admin'");
$resu=mysql_num_rows($result);
if($resu==0)
	{echo "Admin id wrong";
    echo '<a href="http://localhost/mooc_manager/admin_login.html"><br>Go back</a>';}
else
	{while($row=mysql_fetch_array($result))
{if($row["admin_id"]==$admin && $row["admin_pass"]==$pass)
     {        echo '<br><center><span style="color:#F8F8FF;font-size:25">Hello Admin!</span></center><br>';
echo '<a href="http://localhost/mooc_manager/menu.php"><br><center><span style="color:#F8F8FF;font-size:20">Admin Home Page</center></span></a>';
 }   
else
    { echo"Sorry, your password is not valid, Please try again.";
      echo '<a href="http://localhost/mooc_manager/admin_login.html"><br>Go back</a>'; }
}
}

?>