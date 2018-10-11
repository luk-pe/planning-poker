<?php
session_start();
function userIdentification (){
  global $user;
  if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $user = idToUSername($id);
    if ($user == NULL){
        header("Location: login.php");
    }
  } else {
    header("Location: login.php");
  }
}


function idToUsername($id){
  require 'db_connect.php';
  $query="SELECT username FROM pp_user WHERE id = {$id}";
  $result=mysqli_query($link, $query);
  $r = mysqli_fetch_assoc($result);
  $username = $r['username'];

  return $username;
}
function usernameToId($username){
  require 'db_connect.php';
  $query="SELECT id FROM pp_user WHERE username = '{$username}'";
  $result=mysqli_query($link, $query);
  $r = mysqli_fetch_assoc($result);
  $id = $r['id'];

  return $id;
}

?>
