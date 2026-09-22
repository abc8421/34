<?php
$conn = mysqli_connect('localhost', 'root', '');
if (!$conn)
    die('DB connection failed');

mysqli_query($conn, 'CREATE DATABASE IF NOT EXISTS hotel_db');
$conn = mysqli_connect('localhost', 'root', '', 'hotel_db');
if (!$conn)
    die('DB connection failed');

mysqli_query($conn, "CREATE TABLE IF NOT EXISTS hotel_rooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_number INT UNIQUE,
    room_type VARCHAR(255),
    floor_number INT,
    bed_count INT,
    nightly_rate INT,
    room_status VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

if (isset($_POST['insert'])) {
    $roomNumber = $_POST['room_number'];
    $roomType = $_POST['room_type'];
    $floorNumber = $_POST['floor_number'];
    $bedCount = $_POST['bed_count'];
    $nightlyRate = $_POST['nightly_rate'];
    $roomStatus = $_POST['room_status'];

    if (empty($roomType) || $nightlyRate <= 0) {
        echo 'Please enter valid room details.<br>';
    } else {
        $sql = "INSERT INTO hotel_rooms
                (room_number, room_type, floor_number, bed_count, nightly_rate, room_status)
                VALUES ($roomNumber, '$roomType', $floorNumber, $bedCount, $nightlyRate, '$roomStatus')";

        if (mysqli_query($conn, $sql))
            echo 'Room inserted successfully.<br>';
        else
            echo 'Room number already exists.<br>';
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $newStatus = $_POST['new_status'];

    $check = mysqli_query($conn, "SELECT * FROM hotel_rooms WHERE id = $id");
    if (mysqli_num_rows($check) == 0) {
        echo 'Room ID does not exist.<br>';
    } else {
        mysqli_query($conn, "UPDATE hotel_rooms SET room_status = '$newStatus' WHERE id = $id");
        $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM hotel_rooms WHERE id = $id"));
        echo 'Updated room:<br>';
        echo $row['id'] . ' | ' . $row['room_number'] . ' | ' . $row['room_type'] . ' | ' . $row['room_status'] . '<br>';
    }
}
?>

<h3>Insert Hotel Room</h3>
<form method="post">
    Room Number: <input type="number" name="room_number"><br>
    Room Type: <input type="text" name="room_type"><br>
    Floor Number: <input type="number" name="floor_number"><br>
    Bed Count: <input type="number" name="bed_count"><br>
    Nightly Rate: <input type="number" name="nightly_rate"><br>
    Room Status:
    <select name="room_status">
        <option>Available</option>
        <option>Occupied</option>
        <option>Maintenance</option>
    </select><br>
    <input type="submit" name="insert" value="Insert Room">
</form>

<h3>Update Room Status</h3>
<form method="post">
    Room ID: <input type="number" name="id"><br>
    New Status:
    <select name="new_status">
        <option>Available</option>
        <option>Occupied</option>
        <option>Maintenance</option>
    </select><br>
    <input type="submit" name="update" value="Update Status">
</form>