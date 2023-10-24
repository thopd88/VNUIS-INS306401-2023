<?php
// Create connection to MySQL database
$connection = mysqli_connect("localhost","root","root","bookproject");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>