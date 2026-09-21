<!-- Practical 3 - trim() Example -->
<!-- 5. trim() // Users sometimes enter unnecessary spaces before or after the actual value.

Example : "    Rahul     "
- trim() removes spaces from the beginning and end of a string. -->



<!DOCTYPE html>
<html>

<head>
    <title>trim() Example</title>
</head>

<body>

    <h2>trim() Function</h2>

    <form method="POST">

        Name

        <br>

        <input type="text" name="name">

        <br><br>

        <button type="submit">
            Submit
        </button>

    </form>

    <hr>

    <?php

    if (isset($_POST["name"])) {

        $name = trim($_POST["name"]);

        echo "Name after trim(): " . $name;
    }

    ?>

</body>

</html>