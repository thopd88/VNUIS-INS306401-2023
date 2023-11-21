<?php
// Create connection to MySQL database
include_once("connection.php");
// Get the id from URL
$book_id = $_GET['book_id'];
// Delete data from table
$result = mysqli_query($connection, "DELETE FROM books WHERE id=$book_id");
// Show message
echo "Book deleted successfully. <a href='index.php'>View Books</a>";
// close connection
mysqli_close($connection);