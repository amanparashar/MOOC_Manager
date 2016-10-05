<?php
session_start();
$con = mysql_connect("localhost","root","");
// Make sure we connected succesfully
if(! $con)
{
    die('Connection Failed'.mysql_error());
}

// Select the database to use
mysql_select_db("courseware",$con);
echo "<body style='background-color:seagreen'>";
$party=$_SESSION['useridenti'];
$_SESSION['needid']=$party;
$result = mysql_query("SELECT * FROM relation r natural join courses c WHERE user_id =$party and datediff(now(),c.end_time)<=0 and datediff(now(),c.start_time)>=0");//r.user_id??
$result1 = mysql_query("SELECT * FROM relation r natural join courses c WHERE user_id =$party and datediff(now(),c.end_time)<=0 and datediff(now(),c.start_time)<0");
$result2 = mysql_query("SELECT * FROM relation r natural join courses c WHERE user_id =$party and datediff(now(),c.end_time)>0");

if((mysql_num_rows($result)==0) && (mysql_num_rows($result1)==0) && (mysql_num_rows($result2)==0))
	{
echo "No Courses Currently enrolled<br><br>";		
  }

else{
 
 $count=0;

while($row=mysql_fetch_array($result))
 {
    if(!$count)                                               // To print it once
 	echo '<br><center><span style="color:#F8F8FF;font-size:25">Running Courses:</span></center><br>';  $count++;
    
	echo "<br>cid:".$row["cid"]."<br>cname: ".$row["cname"]."<br>subject: ".$row["subject"]."<br>syllabus: ".$row["syllabus"]."<br>professor: ".$row["professor"]."<br>university: ".$row["c_univ"]."<br>start_time: ".$row["start_time"]."  end_time: ".$row["end_time"];
    
   echo '<form action="video.php" method = "post"><input type="submit" value="Resume" name="Resume" ></form>';
   echo "<hr>";
}
 
  $count=0;

while($row=mysql_fetch_array($result1))
 {
    if(!$count)     
	echo '<br><center><span style="color:#F8F8FF;font-size:25">Watchlist Courses:</span></center><br>'; $count++;


	echo "<br>cid:".$row["cid"]."<br>cname: ".$row["cname"]."<br>subject: ".$row["subject"]."<br>syllabus: ".$row["syllabus"]."<br>professor: ".$row["professor"]."<br>university: ".$row["c_univ"]."<br>start_time: ".$row["start_time"]."  end_time: ".$row["end_time"];
    
   echo '<form ><input type="submit" value="explore" name="explore">
   <form action="video.php"><input type="submit" value="Unenroll" name="Unenroll" ></form>';
   echo "<hr>";
}
  
  $count=0;

while($row=mysql_fetch_array($result2))
 {
      if(!$count) 	
      echo '<br><center><span style="color:#F8F8FF;font-size:25">Archived Courses:</span></center><br>'; $count++;

	echo "<br>cid:".$row["cid"]."<br>cname: ".$row["cname"]."<br>subject: ".$row["subject"]."<br>syllabus: ".$row["syllabus"]."<br>professor: ".$row["professor"]."<br>university: ".$row["c_univ"]."<br>start_time: ".$row["start_time"]."  end_time: ".$row["end_time"];
    
   echo '<form ><input type="submit" value="view history" name="view_history"></form>';
   echo "<hr>"; //<form action="unenroll.php"><input type="submit" value="Unenroll" name="Unenroll" ></form>';
}

echo "<br><br>Enter Course ID you want to unenroll:<br>";
echo '<form action="unenroll.php" method ="POST"><input type="text" name="ccid"><input type="submit" value="Unenroll" name="unenroll" ></form>';
}

 echo  '<br><br><a href="http://localhost/mooc_manager/show.php"><br>Enroll in a new course</a>';
   echo  '<a href="http://localhost/mooc_manager/index.html"><br>Logout</a>';

?>



