<!doctype html>
<html lang="en">

<head>
  <title>Show Book</title>
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
    <div class="card">
        <div class="card-header">
            <?php echo $book['title']; ?> Detail page
        </div>
        <div class="card-body">
            <h4 class="card-title"><?php echo $book['title']; ?></h4>
            <p class="card-text"><?php echo $book['author']; ?></p>
        </div>
        <div class="card-footer text-muted">
        <?php echo $book['publisher']; ?>
        </div>
    </div>
    <br>
    <a name="" id="" class="btn btn-primary" href="/index.php" role="button">Back to Index page</a>
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