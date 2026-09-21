<!-- 
fgets()

Theory
fgets() reads one complete line from a file.
After reading a line, the file pointer automatically moves to the next line. 
-->



<?php

$file = fopen("student.txt", "r");

echo fgets($file);
echo "<br>";
echo fgets($file);
echo "<br>";
echo fgets($file);
echo "<br>";
echo fgets($file);
echo "<br>";


fclose($file);
?>