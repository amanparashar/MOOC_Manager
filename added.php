<?php
$used=$_POST["stime"];
$passk=$_POST["cname"];
$passc=$_POST["subject"];
$name=$_POST["syllabus"];
//$univer=$_POST["professor"];
//$birth=$_POST["university"];
$pid=$_POST["pid"];
$chal=$_POST["etime"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "courseware";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$check=mysqli_query($conn,"SELECT pid from teacher where pid=$pid");
$count=mysqli_num_rows($check);
if($count==0)
	{echo "Incorrect teacher ID";
    echo '<a href="http://localhost/mooc_manager/add_course.php"><br>Go Back</a>';
}

else{
$result=mysqli_query($conn,"SELECT pname,puniv from teacher where pid=$pid");
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$univer=$row["pname"];
$birth=$row["puniv"];
$sql = "INSERT INTO courses (cname,subject,syllabus,professor,c_univ,start_time,end_time)
VALUES ('$passk','$passc','$name','$univer','$birth','$used','$chal')";


if ($conn->query($sql) == TRUE) {
	$get_cid=mysqli_query($conn,"SELECT cid FROM courses ORDER BY cid DESC LIMIT 1");
	$get=mysqli_fetch_array($get_cid);
	$gett=$get["cid"];
	$name_1=mysqli_query($conn,"INSERT into pcrelation (pid,cid) values ($pid,$gett)");
    echo "New course entered successfully<br>";
   echo  '<a href="http://localhost/mooc_manager/menu.php">Go To Home Page</a>';
} 

else {
    echo "Error: " . $sql . "<br>" . $conn->error;
echo '<a href="http://localhost/mooc_manager/add_course.php"><br>Go Back</a>';
}

}
$conn->close();
?>