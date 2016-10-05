<?php
echo
'<html>
<body>';
$dir = "courses/course 1/";
$dh  = opendir($dir);

while (false !== ($filename = readdir($dh))) {
if($filename[0]=='.') continue; 
echo '<video width="320" height="240" controls>
  <source src= "courses/course 1/'.$filename.'" type="video/mp4">
</video>';
}     
echo '</body>
</html>';

?>