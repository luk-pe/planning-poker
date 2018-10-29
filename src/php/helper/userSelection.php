<?php
function userSelection(){
require 'db_connect.php';
$query = "SELECT username FROM pp_user";
$result=mysqli_query($link, $query);
$users=array();
while ($row= mysqli_fetch_assoc($result)){
  $users[]=array(
    'username'=>$row['username']
  );
}
return $users;
}

 ?>
 
