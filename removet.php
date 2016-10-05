<?php
$variable=$_POST["pid"];
$con=mysql_connect("localhost","root","");
if(!$con)
  die("could not connect".mysql_error);
mysql_select_db("courseware",$con);
$result=mysql_query("SELECT * from teacher where pid='$variable'");
$resu=mysql_num_rows($result);
if($resu==0)
   {echo "Incorrect Professor ID:<br>";
    echo  '<br><br><a href="http://localhost/mooc_manager/remove_teacher.php"><br>Go Back</a>';
    echo  '<a href="http://localhost/mooc_manager/menu.php"><br>Go to Admin home</a>';
    echo  '<a href="http://localhost/mooc_manager/index.html"><br>Logout</a>';
   }
   else
   {
    mysql_query("DELETE from teacher where pid='$variable'");
    echo "Delete Successful <br>";
     echo  '<br><br><a href="http://localhost/mooc_manager/remove_teacher.php"><br>Go Back</a>';    
     echo  '<a href="http://localhost/mooc_manager/menu.php"><br>Go to Admin home</a>';
    echo  '<a href="http://localhost/mooc_manager/index.html"><br>Logout</a>';
   }
   ?>
