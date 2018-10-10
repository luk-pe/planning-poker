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

// TODO idToUSer auslagern
function idToUsername($id){
  require 'db_connect.php';
  $query="SELECT username FROM pp_user WHERE id = {$id}";
  $result=mysqli_query($link, $query);
  $r = mysqli_fetch_assoc($result);
  $username = $r['username'];

  return $username;
}


?>
