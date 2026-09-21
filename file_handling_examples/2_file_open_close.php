<!-- 
Theory

fopen() opens a file and returns a file pointer (resource).
Without opening the file, PHP cannot perform any file operations. 

-->


<?php

$file = fopen("student.txt", "r");

echo "Reading Started";

echo "<br><br>";

fclose($file);

echo "File Closed Successfully.";
