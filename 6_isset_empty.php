<!-- 2. isset() // isset($variable)

isset() checks whether a variable exists and is not NULL.

It returns:
true → Variable exists.
false → Variable does not exist or is NULL.

3. empty() // empty() checks whether a variable has an empty value.

It returns true for:

""
0
"0"
NULL
false
Empty array [] -->

<!DOCTYPE html>
<html>

<head>
    <title>isset() and empty()</title>
</head>

<body>

    <h2>Registration Form</h2>

    <form method="POST">
        Name <br>
        <input type="text" name="name">
        <br><br>

        <button type="submit">Register</button>
    </form>

    <hr>

    <?php

    // Step 1: Check if the form was submitted
    if (isset($_POST["name"])) {

        echo "<b>isset():</b> Form was submitted.<br><br>";

        $name = $_POST["name"];

        // Step 2: Check if the textbox is empty
        if (empty($name)) {
            echo "<b>empty():</b> Name is required.";
        } else {
            echo "Welcome " . $name;
        }
    } else {

        echo "The form has not been submitted yet.";
    }

    ?>

</body>

</html>