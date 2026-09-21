<!-- 2. Writing Data using fwrite() 



Theory

fwrite() writes data into an opened file.
If the file is opened using:

-->


<?php

$file = fopen("students1.txt", "w");

fwrite($file, "Person 1\n");
fwrite($file, "Person 2\n");
fwrite($file, "Person 3\n");
fwrite($file, "Person 4\n");

fclose($file);

echo "Student List Saved.";

?>