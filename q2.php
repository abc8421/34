<?php
$conn = mysqli_connect('localhost', 'root', '');
if (!$conn)
    die('DB connection failed');

mysqli_query($conn, 'CREATE DATABASE IF NOT EXISTS cinema_db');
$conn = mysqli_connect('localhost', 'root', '', 'cinema_db');
if (!$conn)
    die('DB connection failed');

mysqli_query($conn, "CREATE TABLE IF NOT EXISTS reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(255),
    customer_email VARCHAR(255),
    movie_title VARCHAR(255),
    show_date VARCHAR(255),
    show_time VARCHAR(255),
    number_of_seats INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

if (isset($_POST['insert'])) {
    $name = $_POST['customer_name'];
    $email = $_POST['customer_email'];
    $movie = $_POST['movie_title'];
    $date = $_POST['show_date'];
    $time = $_POST['show_time'];
    $seats = $_POST['number_of_seats'];

    if (
        empty($name) || empty($email) || empty($movie) || empty($date) ||
        empty($time) || $seats <= 0
    ) {
        echo 'Please enter valid reservation details.<br>';
    } else {
        mysqli_query($conn, "INSERT INTO reservations
            (customer_name, customer_email, movie_title, show_date, show_time, number_of_seats)
            VALUES ('$name', '$email', '$movie', '$date', '$time', $seats)");
        echo 'Reservation inserted successfully.<br>';
    }
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    mysqli_query($conn, "DELETE FROM reservations WHERE id = $id");
    echo 'Reservation deleted if the ID existed.<br>';
}
?>

<h3>Make Reservation</h3>
<form method="post">
    Customer Name: <input type="text" name="customer_name"><br>
    Customer Email: <input type="email" name="customer_email"><br>
    Movie Title: <input type="text" name="movie_title"><br>
    Show Date: <input type="text" name="show_date"><br>
    Show Time: <input type="text" name="show_time"><br>
    Number of Seats: <input type="number" name="number_of_seats"><br>
    <input type="submit" name="insert" value="Reserve">
</form>

<h3>Delete Reservation</h3>
<form method="post">
    Reservation ID: <input type="number" name="id"><br>
    <input type="submit" name="delete" value="Delete">
</form>

<h3>All Reservations</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Movie</th>
        <th>Date</th>
        <th>Time</th>
        <th>Seats</th>
        <th>Created At</th>
    </tr>
    <?php
    $result = mysqli_query($conn, 'SELECT * FROM reservations');
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['customer_name'] . '</td>';
        echo '<td>' . $row['customer_email'] . '</td>';
        echo '<td>' . $row['movie_title'] . '</td>';
        echo '<td>' . $row['show_date'] . '</td>';
        echo '<td>' . $row['show_time'] . '</td>';
        echo '<td>' . $row['number_of_seats'] . '</td>';
        echo '<td>' . $row['created_at'] . '</td>';
        echo '</tr>';
    }
    ?>
</table>