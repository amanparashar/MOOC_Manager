<?php
echo "<body style='background-color:seagreen'>";
 echo '<br><center><span style="color:#F8F8FF;font-size:25">What do you want to do?</span></center><br>'; 
echo '<a href="http://localhost/mooc_manager/add_course.php"> <br><center><span style="color:#F8F8FF;font-size:20">Add Courses</span></center></a><br>';
echo '<a href="http://localhost/mooc_manager/delete_course.php"><br><center><span style="color:#F8F8FF;font-size:20">View/Delete Course</span></center></a><br>';
echo '<a href="http://localhost/mooc_manager/add_teacher.php"><br><center><span style="color:#F8F8FF;font-size:20">Add Teacher</span></center></a><br>';
echo '<a href="http://localhost/mooc_manager/remove_teacher.php"><br><center><span style="color:#F8F8FF;font-size:20">Remove Teacher</span></center></a><br>';
echo '<a href="http://localhost/mooc_manager/index.html"><br><center><span style="color:#F8F8FF;font-size:20">Logout</span></center></a><br>';
echo '<center><span style="color:#D2B48C;font-size:20"><br><form action = "query.php" method = "POST"><input type="text" name="querry"><input type ="submit" value ="Submit Query" name ="submit"></form></span></center>';
 ?>   