<!-- 
fread()

Theory
fread() reads a specified number of bytes from a file.
It is often used when reading an entire file at once. 

H = 1 byte
e = 1 byte
l = 1 byte
l = 1 byte
o = 1 byte 

-->

<?php
print_r(filesize("student.txt"));

echo "<hr>";


$file = fopen("student.txt", "r");
$content = fread($file, filesize("student.txt"));
// $content = fread($file, 10); // 10 characters will be read from the file

echo $content;

fclose($file);

?>