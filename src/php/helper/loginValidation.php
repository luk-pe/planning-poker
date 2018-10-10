<?php
session_start();
function authentification ($username, $password){
  require 'db_connect.php';
  $query = "SELECT id FROM pp_user AS u WHERE u.username = '{$username}' AND u.password = '{$password}'";
  $result=mysqli_query($link, $query);
  $r = mysqli_fetch_assoc($result);
    if ($r['id'] != NULL){
      $_SESSION["id"]=$r['id'];
      header("Location: ../overview.php");
      exit();
    } else {
      header("Location: ../login.php?authentification=fail");
    }
}
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);
  authentification($username, $password);


 ?>
