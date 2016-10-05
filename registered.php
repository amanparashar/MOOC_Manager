<?php
$used=$_POST["uid"];
$passk=$_POST["pass"];
$passc=$_POST["cpass"];
$name=$_POST["uname"];
$univer=$_POST["univ"];
$birth=$_POST["dob"];
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
if($passk!=$passc)
	die("Password confirmation failed");
$sql = "INSERT INTO user (user_id,user_pass,username,university,dob)
VALUES ('$used','$passc','$name','$univer','$birth')";
if ($conn->query($sql) === TRUE) {
    echo "New User Registered successfully<br>";
   echo  '<a href="http://localhost/mooc_manager/index.html">Go To Courseware</a>';
} 

else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo  '<a href="http://localhost/mooc_manager/signup.html"><br>Go Back</a>';
}

$conn->close();
?>