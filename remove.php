 <?php
$course_to_delete=$_POST["cid"];
$con=mysql_connect("localhost","root","");

// In case of no database connectivity
if(!$con)
  die("could not connect".mysql_error);

// Picking courses from Database
mysql_select_db("courseware",$con);
$courses=mysql_query("SELECT * from courses where cid=$course_to_delete");
$total_course=mysql_num_rows($courses);

// If there is no corresponding courses.
if($total_courses==0){                           
  echo "Incorrect Course ID:<br>";   }

// If course is present
else{                                          
  mysql_query("DELETE from courses where cid='$variable'");
  echo "delete successful <br>"; }

// Go Back and Menu options
echo  '<br><br><a href="http://localhost/mooc_manager/delete_course.php"><br>Go Back</a>';
echo  '<a href="http://localhost/mooc_manager/menu.php"><br>Go to Admin home</a>';
echo  '<a href="http://localhost/mooc_manager/index.html"><br>Logout</a>';  
?>
