<?php
$conn = mysqli_connect('localhost', 'root', '');
if (!$conn)
    die('DB connection failed');

mysqli_query($conn, 'CREATE DATABASE IF NOT EXISTS book_search_db');
$conn = mysqli_connect('localhost', 'root', '', 'book_search_db');
if (!$conn)
    die('DB connection failed');

mysqli_query($conn, "CREATE TABLE IF NOT EXISTS book_search_records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    book_title VARCHAR(255),
    author_name VARCHAR(255),
    publisher_name VARCHAR(255),
    publication_year INT,
    available_copies INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

if (isset($_POST['insert'])) {
    $title = $_POST['book_title'];
    $author = $_POST['author_name'];
    $publisher = $_POST['publisher_name'];
    $year = $_POST['publication_year'];
    $copies = $_POST['available_copies'];

    if (
        empty($title) || empty($author) || empty($publisher) ||
        $year <= 0 || $copies <= 0
    ) {
        echo 'Please enter valid book details.<br>';
    } else {
        mysqli_query($conn, "INSERT INTO book_search_records
            (book_title, author_name, publisher_name, publication_year, available_copies)
            VALUES ('$title', '$author', '$publisher', $year, $copies)");
        echo 'Book inserted successfully.<br>';
    }
}

if (isset($_POST['search'])) {
    $search = $_POST['search_title'];
    $result = mysqli_query($conn, "SELECT * FROM book_search_records WHERE book_title = '$search'");

    if (mysqli_num_rows($result) == 0) {
        echo 'No book found.<br>';
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['id'] . ' | ' . $row['book_title'] . ' | ' .
                $row['author_name'] . ' | ' . $row['publisher_name'] . ' | ' .
                $row['publication_year'] . ' | ' . $row['available_copies'] . ' | ' .
                $row['created_at'] . '<br>';
        }
    }
}

$showAllBooks = !isset($_POST['search']);
?>

<h3>Insert Book</h3>
<form method="post">
    Book Title: <input type="text" name="book_title"><br>
    Author Name: <input type="text" name="author_name"><br>
    Publisher Name: <input type="text" name="publisher_name"><br>
    Publication Year: <input type="number" name="publication_year"><br>
    Available Copies: <input type="number" name="available_copies"><br>
    <input type="submit" name="insert" value="Insert Book">
</form>

<h3>Search Book by Exact Title</h3>
<form method="post">
    Book Title: <input type="text" name="search_title"><br>
    <input type="submit" name="search" value="Search">
</form>

<h3>All Books</h3>
<?php
if ($showAllBooks) {
    $result = mysqli_query($conn, 'SELECT * FROM book_search_records');
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['id'] . ' | ' . $row['book_title'] . ' | ' .
            $row['author_name'] . ' | ' . $row['publisher_name'] . ' | ' .
            $row['publication_year'] . ' | ' . $row['available_copies'] . ' | ' .
            $row['created_at'] . '<br>';
    }
}
?>