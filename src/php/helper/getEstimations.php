<?php
// file to get estimations from db and submit via ajax
require 'db_connect.php';
require 'assesmentSelection.php';
require 'userIdentification.php';
// data via ajax
$assesmentId = $_POST['asessment'];
$task = $_POST['task'];
// select all participants for the assesment
$participants = assesmentParticipants($assesmentId);
$participantsData=array();
foreach ($participants as $p){
  $participantId = usernameToId($p);
  // SQL statement to check the estimations from the participants
  $query =
  " SELECT pp_user_id, estimation, comment
    FROM estimated_expense
    WHERE task_id = $task AND pp_user_id = $participantId;
  ";
  // run SQL Statement
  $result=mysqli_query($link, $query);
  $result = mysqli_fetch_assoc($result);
  // if the participant already estimated the task...
  if ($result!= null){
    $participantsData[]=array(
      'userId'=>$result['pp_user_id'],
      'username'=>$p,
      'estimation'=>$result['estimation'],
      'comment'=>$result['comment']
    );
  }
  // if no estimation was made yet...
  else {
    $participantsData[]=array(
      'userId'=>$participantId,
      'username'=>$p,
      'estimation'=>"",
      'comment'=>""
    );
  }
}
// submit data via ajax
echo (json_encode($participantsData));



 ?>
