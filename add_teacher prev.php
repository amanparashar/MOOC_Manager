<?php
echo '<html>
<body>
	<header>
    <h1>Enter Teacher Details</h1>
  </header>
<form action ="input_data.php" method="POST">
Teacher ID:<br><input type="text" name="pfid"><br>
Professor Name:<br><input type="text" name="professor"><br>
University:<br><input type="text" name="university"><br>
Date of Birth:<br><input type="date" name="stime"><br>
<br><input type ="submit" value="Register" name="cregister">
</form>
<p><br>Note:<br>1. All Fields are Mandatory
<br>2. Teacher ID should be of 6 digits
<br>3. Professor should be 18 year old</p> 
</body>
<br><br><a href="http://localhost/mooc_manager/menu.php"><br>Go to Admin home</a>
<a href="http://localhost/mooc_manager/index.html"><br>Logout</a>
</html>';
?>