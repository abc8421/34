<!-- Display Uploaded File Information -->


<!DOCTYPE html>
<html>

<head>
    <title>File Information</title>
</head>

<body>

    <form method="POST" enctype="multipart/form-data">
        Select File <br>
        <input type="file" name="myfile">
        <br><br>
        <button>Upload</button>

    </form>

    <hr>

    <?php

    if (isset($_FILES["myfile"])) {
        echo "<pre>";
        print_r($_FILES["myfile"]);
        echo "</pre>";
        echo "<hr>";
        echo $_FILES["myfile"]["name"];


        echo "<hr>";
        echo $_FILES["myfile"]["size"];
        echo "<hr>";
    }




    ?>

</body>

</html>