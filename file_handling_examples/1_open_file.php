<?php

$file = fopen("student.txt", "r");

if ($file) {
    echo "File Opened Successfully.";
    fclose($file);
} else {
    echo "Unable to Open File.";
}




?>

<!-- 
| Function  | Reads                     | Your `student.txt` Result                      |
| --------- | ------------------------- | ---------------------------------------------- |
|  feof()   | Until end of file         | Displays every line using a loop               |
|  fgets()  | One line per call         | Displays only the requested line(s)            |
|  fgetc()  | One character per call    | Displays the whole file character by character |
|  fread()  | Specified number of bytes | Displays the whole file in a single read       | 

-->