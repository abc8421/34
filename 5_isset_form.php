<!DOCTYPE html>
<html>

<head>
    <title>isset() Example</title>
</head>

<body>

    <h2>isset() Example</h2>

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

if(isset($_POST["name"]))
{
    echo "Hello ".$_POST["name"];
}
else
{
    echo "Form is not submitted yet.";
}

?>

</body>

</html>