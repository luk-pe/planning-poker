<?php
session_start();
// function to authentificate user
function authentification ($username, $password){
  // DB connection
  require_once 'db_connect.php';
  // SQL query get user with given combinaion of username and password
  $query = "SELECT id FROM pp_user AS u WHERE u.username = '{$username}' AND u.password = '{$password}'";
  // run SQL query
  $result=mysqli_query($link, $query);
  // extract result
  $r = mysqli_fetch_assoc($result);
    // if input data is correct -> id != NULL
    if ($r['id'] != NULL){
      // save id in session
      $_SESSION["id"]=$r['id'];
      // redirect to overview page
      header("Location: ../overview.php");
      exit();
    }
    // if username and password are incorrect
    else {
      // back to login page with error
      header("Location: ../login.php?authentification=fail");
    }
}
  // get data 
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);
  authentification($username, $password);


 ?>
