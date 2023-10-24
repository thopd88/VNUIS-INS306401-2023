<!doctype html>
<html lang="en">

<head>
  <title>Create new Book</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <?php
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

    // SQL query to fetch data from database based on book_id
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


    ?>
    <div class="row justify-content-center align-items-center g-2">
        <div class="col-lg-10 pt-30">
            <form action="" method="post">
                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text"
                    class="form-control" name="title" id="title" value="<?php echo($book['title']);?>" aria-describedby="helpId" placeholder="">
                  <small id="helpId" class="form-text text-muted">Book title</small>
                </div>
                <div class="mb-3">
                  <label for="author" class="form-label">Author</label>
                  <input type="text"
                    class="form-control" name="author" id="author"  value="<?php echo($book['author']);?>" aria-describedby="helpId" placeholder="">
                  <small id="helpId" class="form-text text-muted">Book author</small>
                </div>
                <!-- Year -->
                <div class="mb-3">
                    <label for="year" class="form-label">Year</label>
                    <input type="text"
                        class="form-control" name="year" id="year"  value="<?php echo($book['year']);?>" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Book year</small>
                </div>
                <!-- Publisher -->
                <div class="mb-3">
                    <label for="publisher" class="form-label">Publisher</label>
                    <input type="text"
                        class="form-control" name="publisher" id="publisher"  value="<?php echo($book['publisher']);?>" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Book publisher</small>
                </div>
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>