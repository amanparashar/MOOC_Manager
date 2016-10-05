<?php
session_start();
$info=$_SESSION['useridenti'];
$con = mysql_connect("localhost","root","");
// Make sure we connected succesfully
if(! $con)
    die('Connection Failed'.mysql_error());
mysql_select_db("courseware",$con);
echo "<body style='background-color:seagreen'>";
$pboy=mysql_query("SELECT user_id FROM relation where user_id=$info ");
$aboy=mysql_num_rows($pboy);
if($aboy==0)
	{$display=mysql_query("SELECT * from courses");
    echo '<br><center><span style="color:#F8F8FF;font-size:25">Courses available are:</span></center><br>';
    while($row=mysql_fetch_array($display))
    	{echo '<br><br>';
  echo "<br>cid:".$row["cid"]."<br>subject name: ".$row["cname"]."<br>subject: ".$row["subject"]."<br>syllabus: ".$row["syllabus"]."<br>professor: ".$row["professor"]."<br>university: ".$row["c_univ"]."<br>start_time: ".$row["start_time"]."  <br>end_time: ".$row["end_time"]."<hr>";

        };
    echo "<br><br>Enter Course ID you want to enroll in:<br>";
   echo '<form action="enroll_new.php" method ="POST"><input type="text" name="ecid"><input type="submit" value="enroll" name="enroll" ></form>';   
    }

else{
$result=mysql_query("SELECT * from courses c where c.cid not in(select r.cid from relation r  where r.user_id=$info)");
$rows=mysql_num_rows($result);
        if($rows==0)
        echo "All courses already enrolled in";

        else{
        echo '<br><center><span style="color:#F8F8FF;font-size:25">Courses available are:</span></center><br>';
        while($row=mysql_fetch_array($result))
        {
        	echo '<br><br>';
	    echo "cid:".$row["cid"]."<br>subject name: ".$row["cname"]."<br>subject: ".$row["subject"]."<br>syllabus: ".$row["syllabus"]."<br>professor: ".$row["professor"]."<br>university: ".$row["c_univ"]."<br>start_time: ".$row["start_time"]."  <br>end_time: ".$row["end_time"]."<hr>";

        }
           }
       

   echo "<br><br>Enter Course ID you want to enroll in:<br>";
   echo '<form action="enroll_new.php" method ="POST"><input type="text" name="ecid"><input type="submit" value="enroll" name="enroll" ></form>';     
    }



echo  '<br><br><a href="http://localhost/mooc_manager/check.php"><br>Go to my Courseware</a>';
echo  '<a href="http://localhost/mooc_manager/index.html"><br>Logout</a>';

?>