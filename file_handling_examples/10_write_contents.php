<!-- 3. file_put_contents() 

file_put_contents() is a shortcut function.

Instead of

$file=fopen(...);
fwrite(...);
fclose(...);

simply write:

file_put_contents("filename.txt", "data");
-->

<?php

$feedback = "Interesting PHP Course!";

file_put_contents("feedback.txt", $feedback);

echo "Feedback Saved.";

?>