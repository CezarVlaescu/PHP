<?php

$con = mysqli_connect("localhost", "root", "");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$query = "CREATE DATABASE test"; 
if (mysqli_query($con, $query)) {
  echo "Database created successfully!";
} else {
  echo "Error creating database: " . mysqli_error($con);
}

mysqli_close($con);
?>
