<?php
session_start();
//TODO Open or Completed
function assesmentsForUser($user, $completed){
  require 'db_connect.php';
    // $completed == 0 -> all assesments for user
    if ($completed==0){
      $query="SELECT * FROM assesment AS a INNER JOIN participant AS p ON a.id = p.assesment_id WHERE p.pp_user_id = $user";
    }
    // $completed == 1 -> only open assesments for user
    elseif ($completed==1) {
      $query="SELECT * FROM assesment AS a INNER JOIN participant AS p ON a.id = p.assesment_id WHERE p.pp_user_id = $user AND a.completed IS NULL";
    }
    // $completed == 2 -> only finished assesments for user
    elseif ($completed==2) {
      $query="SELECT * FROM assesment AS a INNER JOIN participant AS p ON a.id = p.assesment_id WHERE p.pp_user_id = $user AND a.completed IS NOT NULL";
    }
    $result=mysqli_query($link, $query);
    $assesmentsForUser=array();
    while ($row =mysqli_fetch_assoc($result)){
       // echo($row['id']);
       // echo($row['title']);
       // echo($i);
      $assesmentsForUser[]=array(
        'id'=>$row['id'],
        'title'=>$row['title'],
        'completed'=>$row['completed']
      );
    }
    return $assesmentsForUser;
}
function assesmentParticipants($assesment){
    require 'db_connect.php';
    $query="SELECT u.username FROM pp_user as u INNER JOIN participant AS p ON u.id = p.pp_user_id WHERE p.assesment_id = $assesment";
    $result=mysqli_query($link, $query);
    $participants=array();
    while ($row =mysqli_fetch_assoc($result)){
      $participants[]=$row['username'];
    }
    return $participants;
}

function assesmentTasks($assesment){
    require 'db_connect.php';
    $query="SELECT t.id, t.title, t.description, t.result FROM  assesment AS a INNER JOIN task AS t ON a.id = t.assesment_id WHERE a.id = $assesment";
    $result=mysqli_query($link, $query);
    $assesmentTasks = array();
    while ($row =mysqli_fetch_assoc($result)){
      $assesmentTasks[]=array(
        'id'=>$row['id'],
        'title'=>$row['title'],
        'description'=>$row['description'],
        'result'=>$row['result']
      );
    }
    return $assesmentTasks;
}

 ?>
