<?php
if (isset($_POST["add"])) {
    $text = trim($_POST["text"]);

    $imageName = "";

    if ($text == "") {
        echo "<center><p>Please enter some text.</p></center>";
    } else {
        if (!empty($_FILES["image"]["name"])) {
            $filename = $_FILES["image"]["name"];
            $tempname = $_FILES["image"]["tmp_name"];
            $filesize = $_FILES["image"]["size"];
            $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $allowed = ["jpg", "jpeg", "png", "gif", "webp"];

            if (!in_array($extension, $allowed)) {
                echo "<center><p>Only JPG, JPEG, PNG, GIF and WEBP files are allowed.</p></center>";
                exit();
            }

            if ($filesize > 2 * 1024 * 1024) {
                echo "<center><p>Maximum image size is 2 MB.</p></center>";
                exit();
            }

            date_default_timezone_set("Asia/Kolkata");
            $imageName = date("Y_m_d_H_i_s") . "_" . round(microtime(true) * 1000) . "." . $extension;

            if (!move_uploaded_file($tempname, "uploads/" . $imageName)) {
                echo "<center><p>Image upload failed.</p></center>";
                exit();
            }
        }

        $notes = json_decode(file_get_contents("notes.json"), true);

        $notes[] = [
            "id" => round(microtime(true) * 1000),
            "text" => $text,
            "image" => $imageName,
            "date" => date("d-m-Y h:i A")
        ];

        // array_push($notes, [
        //     "id" => round(microtime(true) * 1000),
        //     "text" => $text,
        //     "image" => $imageName,
        //     "date" => date("d-m-Y h:i A")
        // ]);

        file_put_contents("notes.json", json_encode($notes, JSON_PRETTY_PRINT));

        echo "<center><p>Note Added Successfully.</p></center>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Note</title>
</head>

<body>
    <center>
        <h2>Add Note</h2>

        <form method="POST" enctype="multipart/form-data">
            <textarea name="text" rows="6" cols="50" placeholder="Write your note..." required></textarea>
            <br><br>

            <input type="file" name="image" accept="image/*">
            <br><br>

            <button type="submit" name="add">Add Note</button>
        </form>

        <br>
        <p>Press <b>Backspace</b> to return to Home</p>
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