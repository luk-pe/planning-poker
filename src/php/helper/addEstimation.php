<?php
require 'db_connect.php';
$task = htmlspecialchars($_POST['task']);
$user = htmlspecialchars($_POST['user']);
$estimation = htmlspecialchars($_POST['estimation']);
$comment = htmlspecialchars($_POST['comment']);
$query = "INSERT INTO estimated_expense (task_id, pp_user_id, estimation, comment)
VALUES ('{$task}', '{$user}', '{$estimation}', '{$comment}')";
mysqli_query($link, $query);
echo "Estimation set!";
?>
