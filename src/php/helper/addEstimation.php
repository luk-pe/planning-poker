<?php
// file to write a estiamtion to the DB
// DB connection
require 'db_connect.php';
// input from ajax
$task = htmlspecialchars($_POST['task']);
$user = htmlspecialchars($_POST['user']);
$estimation = htmlspecialchars($_POST['estimation']);
$comment = htmlspecialchars($_POST['comment']);
// SQL statement
$query = "INSERT INTO estimated_expense (task_id, pp_user_id, estimation, comment)
VALUES ('{$task}', '{$user}', '{$estimation}', '{$comment}')";
// run sql statement
mysqli_query($link, $query);
echo "Estimation set!";
?>
