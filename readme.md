-- Steps to create database
- Create a database named bookproject
- Create a table named books inside bookproject
- Create columns in table books: id, title, year, author, publisher and set the id to primary key of the table

-- index.php Listing all books
```
<?php
// Include connection.php file
include_once("connection.php");
// Fetch all data from database
$result = mysqli_query($connection, "SELECT * FROM books");
while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td><a href='/show.php?book_id=".$row['id']."'>".$row['title']."</a></td>";
    echo "<td>".$row['author']."</td>";
    echo "</tr>";
}
?>
```