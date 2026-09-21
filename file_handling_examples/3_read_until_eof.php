<!-- 
feof() - eof denotes - End Of File

Theory
feof() checks whether the End Of File has been reached.
It is commonly used with loops to read an entire file. -->

<?php

$file = fopen("student.txt", "r");

while (!feof($file)) {
    echo fgets($file);

    echo "<br>";
}

fclose($file);