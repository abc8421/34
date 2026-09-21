<!-- 
| Note   |  id == $id ? | What happens         |
| ------ | ------------ | -------------------- |
| Note 1 | No           | Added to  $newNotes  |
| Note 2 | Yes          |   Skipped            |
| Note 3 | No           | Added to  $newNotes  |
-->
<?php

// Delete note
if (isset($_GET["delete"])) {

    $id = $_GET["delete"];

    // Read notes from JSON file
    $notes = json_decode(file_get_contents("notes.json"), true);

    $newNotes = [];

    // Check every note
    foreach ($notes as $note) {

        // If this is the note we want to delete
        if ($note["id"] == $id) {

            // Delete its image also
            if ($note["image"] != "") {
                unlink("uploads/" . $note["image"]);
            }

        } else {

            // Keep other notes
            $newNotes[] = $note;
        }
    }

    // Save remaining notes
    file_put_contents("notes.json", json_encode($newNotes, JSON_PRETTY_PRINT));

    // Go back to delete page
    header("Location: delete.php");
    exit();
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Delete Notes</title>
</head>

<body>

    <center>

        <h2>My Notes</h2>

        <p>Press <b>Backspace</b> to return to Home</p>

        <hr>


        <?php

        // Read notes from JSON file
        $notes = json_decode(file_get_contents("notes.json"), true);


        // If there are no notes
        if (empty($notes)) {

            echo "<p>No notes available.</p>";

        } else {

            // Start table
            echo "<table border='3' cellpadding='10' cellspacing='10'>";

            $count = 0;


            // Display every note
            foreach ($notes as $note) {

                // Start a new row after every 3 notes
                if ($count % 3 == 0) {
                    echo "<tr>";
                }


                // Start note box
                echo "<td align='center' valign='top' width='250'>";


                // Display note text
                echo "<p>" . nl2br($note["text"]) . "</p>";


                // Display image if available
                if ($note["image"] != "") {

                    echo "<img src='uploads/" . $note["image"] . "' width='220' height='160'>";

                    echo "<br><br>";
                }


                // Display date
                echo "<small>" . $note["date"] . "</small>";

                echo "<br><br>";


                // Delete link
                echo "<a href='delete.php?delete=" . $note["id"] . "'>Delete</a>";


                // Close note box
                echo "</td>";


                $count++;


                // Close row after every 3 notes
                if ($count % 3 == 0) {
                    echo "</tr>";
                }
            }


            // Close the last row
            if ($count % 3 != 0) {
                echo "</tr>";
            }


            // Close table
            echo "</table>";
        }

        ?>

    </center>


    <script>
    document.addEventListener("keydown", function(event) {

        if (event.key === "Backspace") {

            event.preventDefault();

            window.location.href = "index.php";
        }

    });
    </script>

</body>

</html>