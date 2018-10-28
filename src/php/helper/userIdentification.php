<?php
session_start();

// function to identificate user
function userIdentification (){
  global $user;
  // if id is set in session variable
  if(isset($_SESSION['id'])){
    // get ID from Session
    $id = $_SESSION['id'];
    // get username from id
    $user = idToUSername($id);
    // if no username for this id
    if ($user == NULL){
      // redirect to login page
      header("Location: login.php");
    }
  }
  // else id is not set
  else {
    // redirect to login page
    header("Location: login.php");
  }
}

// function to get the username if only the user id is given
function idToUsername($id){
  // DB connection
  require_once 'db_connect.php';
  // SQL statement
  $query="SELECT username FROM pp_user WHERE id = {$id}";
  // run SQL statement
  $result=mysqli_query($link, $query);
  // extract data
  $r = mysqli_fetch_assoc($result);
  $username = $r['username'];
  // return username
  return $username;
}
// function to get the user id if only the username is given
function usernameToId($username){
  // DB connection
  require_once 'db_connect.php';
  // SQL statement
  $query="SELECT id FROM pp_user WHERE username = '{$username}'";
  // run SQL statement
  $result=mysqli_query($link, $query);
  // extract data
  $r = mysqli_fetch_assoc($result);
  $id = $r['id'];
  // return id
  return $id;
}

?>
