<!-- 
fgetc()

Theory
fgetc() reads one character at a time.
Useful when processing files character by character. -->

<?php

$file = fopen("student.txt", "r");

echo fgetc($file);
echo fgetc($file);
echo fgetc($file);
echo fgetc($file);

// while (!feof($file)) {
//     echo fgetc($file);
// }

fclose($file);

?>