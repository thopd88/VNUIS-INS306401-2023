Show author name base on author_id save in books table
--
```
$author = mysqli_query($connection, "SELECT * FROM authors WHERE id=".$row['author_id']);
$author_name = mysqli_fetch_array($author)['name'];
echo "<td>".$author_name."</td>";
```

Modify database to link books to authors
--
```
-- book_new.authors definition

CREATE TABLE `authors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
```

```
-- book_new.books definition

CREATE TABLE `books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `year` int DEFAULT NULL,
  `publisher` varchar(100) DEFAULT NULL,
  `author_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `books_FK` (`author_id`),
  CONSTRAINT `books_FK` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
```

Steps to create database
--
- Create a database named bookproject
- Create a table named books inside bookproject
- Create columns in table books: id, title, year, author, publisher and set the id to primary key of the table

index.php Listing all books
--
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

show.php Show a single book
--
```
<?php
// Create connection if $_GET['book_id'] is set
if (isset($_GET['book_id'])){
    // Create connection to MySQL database via connection.php
    include_once("connection.php");
    // Get the book_id from the URL parameter: ?book_id=2
    $book_id = $_GET['book_id'];
    // Fetch data from database based on book_id
    $sql = "SELECT * FROM books WHERE id=$book_id";
    // Execute query and get result object
    $result = mysqli_query($connection, $sql);
    // Check if the result is empty then show the error message and exit the script
    if (mysqli_num_rows($result) == 0) {
        echo "Error: No book found.";
        exit;
    }
    // Fetch record from result object and return as an associative array
    $book = mysqli_fetch_assoc($result);
    // close connection
    mysqli_close($connection);
}
else {
    // Show error and exit the script
    echo "Error: No book_id specified.";
    exit;
}
?>
```

create.php Show a form and create new book
--
```
<?php
// Create connection to MySQL database via connection.php
include_once("connection.php");
// Check if the form is submitted
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $year = $_POST['year'];
    $publisher = $_POST['publisher'];
    // Insert data into table
    $result = mysqli_query($connection, "INSERT INTO books(title,author,category,year,publisher) VALUES('$title','$author','$category','$year','$publisher')");
    // Show message when user added
    echo "Book added successfully. <a href='index.php'>View Books</a>";
}
?>
```

edit.php Edit a record based on book id
--
```
// Create connection to MySQL database via connection.php
include_once("connection.php");
// Get the id from URL
$book_id = $_GET['book_id'];

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    $publisher = $_POST['publisher'];
    // Update data into table
    $result = mysqli_query($connection, "UPDATE books SET title='$title',author='$author',year='$year',publisher='$publisher' WHERE id=$book_id");
    // Show message
    echo "Book updated successfully. <a href='index.php'>View Books</a>";
}
```

delete.php Delete a record from table based on id
--
```
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
```