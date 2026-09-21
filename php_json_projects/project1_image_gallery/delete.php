<?php
if (isset($_GET["delete"])) {
    $image = $_GET["delete"];
    $file = "uploads/" . $image;

    if (file_exists($file)) {
        unlink($file);
    }

    header("Location: delete.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Delete Image</title>
</head>

<body>
    <center>
        <h2>Delete Image</h2>
        <p>Press <b>Backspace</b> to return to Home</p>
        <hr>

        <?php
        $images = scandir("uploads/");
        echo "<table border='3' cellpadding='10' cellspacing='10'>";

        $count = 0;

        foreach ($images as $image) {
            if ($image == "." || $image == "..") {
                continue;
            }

            $extension = strtolower(pathinfo($image, PATHINFO_EXTENSION));

            if ($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "gif" || $extension == "webp") {
                if ($count % 3 == 0) {
                    echo "<tr>";
                }

                echo "<td align='center'>";
                echo "<img src='uploads/" . htmlspecialchars($image) . " 'width='180' height='150'>";
                echo "<br><br>";
                echo "<b>" . htmlspecialchars($image) . "</b>";
                echo "<br><br>";
                echo "<a href='delete.php?delete=" . urlencode($image) . "'>Delete</a>";
                echo "</td>";

                $count++;

                if ($count % 3 == 0) {
                    echo "</tr>";
                }
            }
        }

        if ($count % 3 != 0) {
            echo "</tr>";
        }

        echo "</table>";
        ?>
    </center>

    <script>
        document.addEventListener("keydown", function (event) {
            if (event.key === "Backspace") {
                event.preventDefault();
                window.location.href = "index.php";
            }
        });
    </script>
</body>

</html>