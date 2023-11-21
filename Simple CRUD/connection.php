<?php
// Create connection to MySQL database
$connection = mysqli_connect("localhost","root","root","book_new");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>