<?php
  require 'db_connect.php';
  require 'assesmentSelection.php';
  $assesmentId = $_POST['asessment'];
  $date = $_POST['date'];
  $query = "UPDATE assesment SET completed = '$date' WHERE id = $assesmentId";
  mysqli_query($link, $query);
  $tasks = assesmentTasks($assesmentId);
  foreach ($tasks as $t) {
    $id = $t['id'];
    $query = " SELECT estimation FROM estimated_expense WHERE task_id = $id";
    $result = mysqli_query($link, $query);
    $i = 0;
    $sum = 0;
    while ($row =mysqli_fetch_assoc($result)){
        $sum = $sum + $row['estimation'];
        $i++;
    }
    $finalEstimation = round($sum/$i);
    $query = "UPDATE task SET result = $finalEstimation WHERE id = $id";
    mysqli_query($link, $query);
  }


 ?>
