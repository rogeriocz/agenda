<?php
session_start();
$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'agenda'
) or die(mysqli_error($mysqli));
?>