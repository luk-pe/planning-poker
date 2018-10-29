<?php
session_start();
// function to create a new assesment
function createAssesment($projektId, $assesmentTitle){
  // db connection
  require 'db_connect.php';
  // SQL statement to insert assesment
  $query = "INSERT INTO assesment (projektid, title)
  VALUES ('{$projektId}', '{$assesmentTitle}')";
  // run SQL statement
  mysqli_query($link, $query);
  // get assesment id (auto increment)
  $asessmentId = mysqli_insert_id($link);
  return $asessmentId;
}
// fuction to add participants to an asessment
function addParticipants($assesment_id, $participants){
  // DB connection
  require 'db_connect.php';
  // userIdentification -> usernameToId()
  require_once 'userIdentification.php';
  // loop through participants array
  $numberOfParticipants = count($participants);
  for ($i = 0; $i < $numberOfParticipants; $i++){
    // get id for every participant
    $userId = usernameToId($participants[$i]);
    // SQL statement
    $query = "INSERT INTO participant (assesment_id, pp_user_id)
    VALUES ('{$assesment_id}','{$userId}')";
    // run SQL statement
    mysqli_query($link, $query);
  }
}
// get data
$assesmentTitle= htmlspecialchars($_POST['assesment_title']);
$projektId = htmlspecialchars($_POST['project_id']);
$participants = $_POST['participants'];
// create assesment and get the new assesment id
$asessmentId = createAssesment($projektId, $assesmentTitle);
// add participants
addParticipants($asessmentId, $participants);
header("Location: ../newTask.php?id={$asessmentId}");



 ?>
