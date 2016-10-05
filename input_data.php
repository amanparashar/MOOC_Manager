<?php
$used=$_POST["pfid"];
$passk=$_POST["professor"];
$passc=$_POST["university"];
$name=$_POST["stime"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "courseware";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Could not Connect: " . $conn->connect_error);
   } 
//if(!$conn)
 // die("could not connect".mysql_error);
//mysql_select_db("courseware",$conn);

$sql = "INSERT INTO teacher (pid, pname, puniv, pdob) VALUES ('$used', '$passk', '$passc','$name')";
if ($conn->query($sql) == TRUE) {
   
    echo "New Teacher Registered<br>";

    echo  '<br><br><a href="http://localhost/mooc_manager/menu.php"><br>Go to Admin Home Page</a>';
    echo  '<a href="http://localhost/mooc_manager/index.html"><br>Logout</a>';
} 
 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
echo '<a href="http://localhost/mooc_manager/add_teacher.php"><br>Go Bach</a>';
}

$conn->close();

?>

