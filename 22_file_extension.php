<!-- 3. File Extension Validation -->

<!-- Never trust the uploaded filename. - virus.exe
-->

<!DOCTYPE html>
<html>

<head>
    <title>Extension Validation</title>
</head>

<body>

    <form method="POST" enctype="multipart/form-data">

        <input type="file" name="image">

        <br><br>

        <button>Upload</button>

    </form>

    <hr>

    <?php

    if (isset($_FILES["image"])) {

        $file = $_FILES["image"]["name"];

        $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));

        if ($extension == "jpg" || $extension == "png" || $extension == "jpeg") {
            echo "Valid Image.";
        } else {
            echo "Only JPG PNG JPEG Allowed.";
        }
    }

    ?>

</body>

</html>