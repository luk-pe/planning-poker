<?php
// performed to check if the estimation of a task is finished
require 'db_connect.php';
require 'assesmentSelection.php';
// data from ajax
$assesmentId = $_POST['asessment'];
$task = $_POST['task'];
// select participants from assesment
$participants = assesmentParticipants($assesmentId);
// number of participants
$numberOfParticipants = count($participants);
// select estimations for task
$query=
" SELECT *
  FROM estimated_expense
  WHERE task_id = $task
";
$i = 0;
$result = mysqli_query($link, $query);
while ($row =mysqli_fetch_assoc($result)){
  // number of estiamtions made
    $i++;
}
// if not all participants made their estimation yet
if ($numberOfParticipants > $i ){
  echo "false";
}
// task estimation finished
else {
  echo "true";

}
?>
