<?php
  $DB_HOST = 'localhost';
  $DB_USER = 'root';
  $DB_PASS = '123456';
  $DB_NAME = 'collegedb';

  $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

  if(!$conn) {
    die("Connection Failed :".mysqli_connect_error());
  }
?>
