<?php
session_start();
$chi= $_POST["ecid"];
//echo $ch;
$using=$_SESSION['useridenti'];
$con=mysql_connect("localhost","root","");
if(!$con)
	die("conection failed".mysql_error());
mysql_select_db("courseware",$con);
//$result=mysql_query("select * from courses c where c.cid !=(select r.cid from relation r  where r.user_id=$using)");
$result=mysql_query("SELECT * from courses where cid=$chi");
$num=mysql_num_rows($result);
if($num==0)
	{echo "No such course exists";}
else{
$resu=mysql_query("SELECT * from relation where cid=$chi and user_id=$using");
$resu2=mysql_query("SELECT * from courses where cid=$chi and datediff(now(),end_time)<=0 ");
$numm=mysql_num_rows($resu);
$numm2=mysql_num_rows($resu2);
if($numm!=0)
	echo "Already enrolled";
else if($numm==0 && $numm2==0)
    echo "Course Has Ended"	;

else {$res=mysql_query("INSERT INTO relation (user_id,cid) values($using,$chi)");
        echo "Sucessfully enrolled";}
    }

 echo  '<a href="http://localhost/mooc_manager/show.php"><br>Go Back</a>';
    
  ?>
