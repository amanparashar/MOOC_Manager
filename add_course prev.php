<?php
echo '<html>
<body>
	<header>
    <h1>Enter Course Details</h1>
  </header>
<form action ="added.php" method="POST">
CourseName:<br><input type="text" name="cname"><br>
Subject:<br><input type="text" name="subject"><br>
Syllabus:<br><input type="text" name="syllabus"><br>
Professor ID:<br><input type="text" name="pid"><br>
Start Time:<br><input type="date" name="stime"><br>
End Time:<br><input type="date" name="etime"><br>
<br><input type ="submit" value="Register" name="cregister">
</form>
<p><br>Note:<br>1.All Fields are Mandatory
<br>2.The Course should not end before Today 
<br>3. End Date of Course should be after Start Date
</p>
<br><a href="http://localhost/mooc_manager/menu.php"><br>Go to Admin home</a>
<a href="http://localhost/mooc_manager/index.html"><br>Logout</a>
</body>
</html>';

?>

