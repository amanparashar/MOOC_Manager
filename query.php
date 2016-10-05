<?php
$query=$_POST["querry"];
$con=mysql_connect("localhost","root","");
if(!$con)
  die("could not connect".mysql_error);
mysql_select_db("courseware",$con);
$result=mysql_query($query);
$resu=mysql_num_rows($result);


   if($resu!=0)
	{
       while($row=mysql_fetch_array($result))
        {
           for($i=0;$i<count($row)/2;$i++)
            {   echo $row[$i]; echo '<br>'; }
            
            echo '<br><br>';
        }
      }

    else {
      	echo "No Rows Selected";
      }  

  echo '<a href="http://localhost/mooc_manager/menu.php"><br>Go Back</a>';    
?>