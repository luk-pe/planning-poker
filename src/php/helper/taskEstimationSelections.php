<?php
function estimations($task){
  require 'db_connect.php';
  // require 'userIdentification.php';
  $query="SELECT pp_user_id, estimation FROM estimated_expense WHERE task_id = $task";
  $result = mysqli_query($link, $query);
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
