<?php
require 'db_connect.php';
require 'assesmentSelection.php';
$assesmentId = $_POST['asessment'];
$task = $_POST['task'];
$participants = assesmentParticipants($assesmentId);
$numberOfParticipants = count($participants);
$query=
" SELECT *
  FROM estimated_expense
  WHERE task_id = $task
";
$i = 0;
$result = mysqli_query($link, $query);
while ($row =mysqli_fetch_assoc($result)){
    $i++;


}
if ($numberOfParticipants > $i ){
  echo "false";
} else {
  // durchschnittliche estimation in DB schreiben
  echo "true";

}
?>
