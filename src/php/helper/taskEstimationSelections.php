<?php
// function to select all the estiamtions for a task
function estimations($task){
  require 'db_connect.php';
  // SQL statement
  $query="SELECT pp_user_id, estimation FROM estimated_expense WHERE task_id = $task";
  // run SQL statement
  $result = mysqli_query($link, $query);
  // create array that contains the estimations for each user
  $estimations=array();
  while ($row =mysqli_fetch_assoc($result)){
    $estimations[]=array(
      'user_id'=>$row['pp_user_id'],
      'estimation'=>$row['estimation'],
      "username"=>idToUSername($row['pp_user_id'])
    );
  }
  return $estimations;
}

 ?>
