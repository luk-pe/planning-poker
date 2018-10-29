<?php
  require 'db_connect.php';
  $assesmentId = $_POST['asessment'];
  $date = $_POST['date'];
  $query = "UPDATE assesment SET completed = '$date' WHERE id = $assesmentId";
  mysqli_query($link, $query);
 ?>
