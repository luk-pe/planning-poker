<?php
session_start();

function createTask($taskTitle, $taskDescription, $assesmentId){
  // DB connection
  require_once 'db_connect.php';
  // SQL statement
  $query = "INSERT INTO task (title, description, assesment_id)
  VALUES ('{$taskTitle}', '{$taskDescription}', {$assesmentId})";
  // run SQL statement
  mysqli_query($link, $query);
}
// get data
$taskTitle = htmlspecialchars($_POST['task_title']);
$taskDescription = htmlspecialchars($_POST['task_description']);
$assesmentId = htmlspecialchars($_GET['id']);
// function call
createTask($taskTitle, $taskDescription, $assesmentId);
// TODO value from radio buttons -> next page
?>
