<?php
// function to select all users
function userSelection(){
  // db connection
require 'db_connect.php';
// sql statement
$query = "SELECT username FROM pp_user";
// performed here
$result=mysqli_query($link, $query);
// data extrcated
$users=array();
while ($row= mysqli_fetch_assoc($result)){
  $users[]=array(
    'username'=>$row['username']
  );
}
return $users;
}

 ?>
