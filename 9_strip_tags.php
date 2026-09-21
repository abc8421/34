<!-- Practical 5 - strip_tags() Example -->

<!-- Example input : <b>Hello</b> <i>World</i> -->
<!-- Example input : <h1>Welcome</h1> This is my <b>first</b> comment. -->




<!-- 7. strip_tags() // This function removes HTML and PHP tags from a string.

Example input : <b>Hello</b> <i>World</i> -->

<!DOCTYPE html>
<html>

<head>
    <title>strip_tags()</title>
</head>

<body>

    <h2>Comment Box</h2>

    <form method="POST">

        Comment

        <br>

        <textarea name="comment"></textarea>

        <br><br>

        <button type="submit">
            Post Comment
        </button>

    </form>

    <hr>

    <?php

    if (isset($_POST["comment"])) {

        $comment = strip_tags($_POST["comment"]);

        echo "<h3>Filtered Comment</h3>";

        echo $comment;
    }

    ?>

</body>

</html>