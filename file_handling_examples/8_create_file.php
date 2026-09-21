<!-- Create a File -->


<?php

$file = fopen("notes.txt", "w");

if ($file) {
    echo "File Created Successfully.";
    fclose($file);
} else {
    echo "Unable to Create File.";
}

?>