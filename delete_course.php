<?php
$con = mysql_connect("localhost","root","");
// Make sure we connected succesfully
if(! $con)
    die('Connection Failed'.mysql_error());
mysql_select_db("courseware",$con);
echo "<body style='background-color:seagreen'>";
$pboy=mysql_query("SELECT * FROM courses");
$aboy=mysql_num_rows($pboy);
if($aboy==0)
	{echo "No courses are available";
    
      
    }

else{   echo '<br><center><span style="color:#F8F8FF;font-size:25">Courses currently available are:</span></center><br>';
        while($row=mysql_fetch_array($pboy))
        {
        	echo '<br><br>';
	    echo "cid:".$row["cid"]."<br>subject name: ".$row["cname"]."<br>subject: ".$row["subject"]."<br>syllabus: ".$row["syllabus"]."<br>professor: ".$row["professor"]."<br>university: ".$row["c_univ"]."<br>start_time: ".$row["start_time"]." <br> end_time: ".$row["end_time"]."<hr>";

        }
   echo "<br><br>Enter Course ID you want to delete:<br>";
   echo '<form action="remove.php" method ="POST"><input type="text" name="cid"><input type="submit" value="delete" name="delete" ></form>';     
    }



echo  '<br><br><a href="http://localhost/mooc_manager/menu.php"><br>Go to Admin home</a>';
echo  '<a href="http://localhost/mooc_manager/index.html"><br>Logout</a>';

?>