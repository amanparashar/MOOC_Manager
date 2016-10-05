<?php
$con = mysql_connect("localhost","root","");
// Make sure we connected succesfully
if(! $con)
    die('Connection Failed'.mysql_error());
mysql_select_db("courseware",$con);
echo "<body style='background-color:seagreen'>";
$pboy=mysql_query("SELECT * FROM teacher");
$aboy=mysql_num_rows($pboy);
if($aboy==0)
	{echo "No Teacher Registered"; }

else{   echo '<br><center><span style="color:#F8F8FF;font-size:25">Registered Teachers Are:</span></center><br>';
        while($row=mysql_fetch_array($pboy))
        {
        	echo '<br><br>';
	    echo "Professor ID:".$row["pid"]."<br>Professor Name: ".$row["pname"]."<br>University: ".$row["puniv"]."<br>Date of Birth: ".$row["pdob"]."<hr>";

        }
   echo "<br><br>Enter Professor ID you want to delete:<br>";
   echo '<form action="removet.php" method ="POST"><input type="text" name="pid"><input type="submit" value="delete" name="delete" ></form>';     
    }

echo  '<br><br><a href="http://localhost/mooc_manager/menu.php"><br>Go to Admin home</a>';
echo  '<a href="http://localhost/mooc_manager/index.html"><br>Logout</a>';

?>