<?php
session_start();
// Grab User submitted information
$uid = $_POST["uname"];
$pass = $_POST["pass"];

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
$result = mysql_query("SELECT * FROM user WHERE user_id = $uid");
$resu=mysql_num_rows($result);
if($resu==0)
	{echo "user id is wrong";
     echo  '<a href="http://localhost/mooc_manager/index.html"><br>Go back</a>';
    }
else
	{$_SESSION['useridenti']=$uid;
while($row=mysql_fetch_array($result))
{if($row["user_id"]==$uid && $row["user_pass"]==$pass)
     {echo '<center><span style="color:#000000;font-size:25">Welcome!</center></span><br>';;
      echo '<center><span style="color:#000000;font-size:20">Click on your choice:</center></span>';
       echo  '<a href="http://localhost/mooc_manager/check.php"><br><center><span style="color:#F8F8FF;font-size:20">Go to my Courseware</center></span></a>';
       echo  '<a href="http://localhost/mooc_manager/show.php"><br><br><center><span style="color:#F8F8FF;font-size:20">Enroll in a new course</center></span></a>';
       echo  '<a href="http://localhost/mooc_manager/index.html"><br><br><center><span style="color:#F8F8FF;font-size:20">Logout</center></span></a>';
      }   
else
    echo"Sorry, your password is not valid, Please try again.";
}
}
?>