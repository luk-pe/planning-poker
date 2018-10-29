<?php
  // file to set the completion date and to analyse (average) the results of the estimations
  require 'db_connect.php';
  require 'assesmentSelection.php';
  // data from ajax
  $assesmentId = $_POST['asessment'];
  $date = $_POST['date'];
  // sql statement to set completion date
  $query = "UPDATE assesment SET completed = '$date' WHERE id = $assesmentId";
  // perform sql statement
  mysqli_query($link, $query);
  // select all tasks for assesment
  $tasks = assesmentTasks($assesmentId);
  foreach ($tasks as $t) {
    // select estimations for each task
    $id = $t['id'];
    $query = " SELECT estimation FROM estimated_expense WHERE task_id = $id";
    $result = mysqli_query($link, $query);
    $i = 0;
    $sum = 0;
    while ($row =mysqli_fetch_assoc($result)){
        $sum = $sum + $row['estimation'];
        $i++;
    }
    // get average estimation
    $finalEstimation = round($sum/$i);
    // sql statement to save average estiamtion as result
    $query = "UPDATE task SET result = $finalEstimation WHERE id = $id";
    mysqli_query($link, $query);
  }


 ?>
