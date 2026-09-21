<!-- 7. Hidden Fields -->


<!DOCTYPE html>
<html>

<head>
    <title>Hidden Field</title>
</head>

<body>

    <form method="POST">
        <!-- Cross-Site Request Forgery (CSRF) -->
        <input type="hidden" name="product_id" value="1001">

        <button>Buy Product</button>

    </form>

    <hr>

    <?php

    if (isset($_POST["product_id"])) {

        $productId = $_POST["product_id"];

        echo "Buying Product ID : " . $productId;
    }

    ?>

</body>

</html>