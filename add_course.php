<?php
echo '
<!DOCTYPE html>
<html>
<head>
	<title>Course Registration</title>
		<meta charset="utf-8">
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700" rel="stylesheet" type="text/css">
		<!--//webfonts-->
</head>
<body>
	 <!-----start-main---->
	 <div class="main">
		<div class="login-form">
			<h1>Enter Teacher Details</h1>
					<div class="head">
						<img src="images/user.png" alt=""/>
					</div>

				 <form action ="added.php" method="POST">
<br><input type="text" name="cname" value= "CourseName">
<br><input type="text" name="subject" value= "Subject">
<br><input type="text" name="syllabus" value= "Syllabus">
<br><input type="text" name="pid" value= "Professor ID">
Start Time :<input type="date" name="stime"><br><br>
End Time :<input type="date" name="etime"><br><br>
						
						<div class="submit">
							<input type="submit" onclick="myFunction()" value="REGISTER" >
					</div>	
					<p>Note:<br>
1. All Fields are Mandatory
<br>2. Teacher ID should be of 6 digits
<br>3. Professor should be 18 year old<br></p>
					<p><a href="http://localhost/mooc_manager/menu.php"><br>Go to Admin home</a>
<a href="http://localhost/mooc_manager/index.html"><br>Logout</a></p>
				</form>
			</div>
			<!--//End-login-form-->
			 <!-----start-copyright---->
				<!-----//end-copyright---->
		</div>
			 <!-----//end-main---->
		 		
</body>
</html>';
?>
