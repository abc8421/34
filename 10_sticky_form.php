<!-- Practical 6 - Sticky Form -->
<!-- 
The entered value remains in the textbox after submission.
Users do not need to type the data again. 

-->

<!-- 8. Sticky Forms (Form Repopulation)

Theory
A Sticky Form remembers the values entered by the user after the form is submitted. -->


<!DOCTYPE html>
<html>

<head>
    <title>Sticky Form</title>
</head>

<body>

    <h2>Sticky Form Example</h2>

    <form method="POST">

        Name

        <br>

        <input type="text" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>">

        <br><br>

        <button type="submit">
            Submit
        </button>

    </form>

    <hr>

    <?php

    if (isset($_POST["name"])) {

        echo "Hello " . $_POST["name"];
    }

    ?>

</body>

</html>