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
    <div class="row justify-content-center align-items-center g-2">
        <div class="col-lg-10 pt-30">
            <form action="" method="post">
                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text"
                    class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="">
                  <small id="helpId" class="form-text text-muted">Book title</small>
                </div>
                <div class="mb-3">
                  <label for="author" class="form-label">Author</label>
                  <input type="text"
                    class="form-control" name="author" id="author" aria-describedby="helpId" placeholder="">
                  <small id="helpId" class="form-text text-muted">Book author</small>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <input type="text"
                        class="form-control" name="category" id="category" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Book category</small>
                </div>
                <!-- Year -->
                <div class="mb-3">
                    <label for="year" class="form-label">Year</label>
                    <input type="text"
                        class="form-control" name="year" id="year" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Book year</small>
                </div>
                <!-- Publisher -->
                <div class="mb-3">
                    <label for="publisher" class="form-label">Publisher</label>
                    <input type="text"
                        class="form-control" name="publisher" id="publisher" aria-describedby="helpId" placeholder="">
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