<!-- 3. Multiple Checkboxes -->

<!DOCTYPE html>
<html>

<head>
    <title>Multiple Checkbox</title>
</head>

<body>

    <h2>Select Skills</h2>

    <form method="POST">

        <input type="checkbox" name="skills[]" value="PHP">PHP

        <br>

        <input type="checkbox" name="skills[]" value="Java">Java

        <br>

        <input type="checkbox" name="skills[]" value="Python">Python

        <br>

        <input type="checkbox" name="skills[]" value="JavaScript">JavaScript

        <br><br>

        <button>Save</button>

    </form>

    <hr>

    <?php

    if (isset($_POST["skills"])) {

        $skills = $_POST["skills"];

        echo "<h3>Selected Skills</h3>";

        foreach ($skills as $skill) {

            echo $skill;

            echo "<br>";
        }
    } else {

        echo "No Skill Selected.";
    }

    ?>

</body>

</html>