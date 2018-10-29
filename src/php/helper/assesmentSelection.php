<?php
session_start();
// function to select the assesments for a user
function assesmentsForUser($user, $completed){
  // DB connection
  require 'db_connect.php';
    // $completed == 0 -> all assesments for user
    if ($completed==0){
      // SQL statement
      $query="SELECT * FROM assesment AS a INNER JOIN participant AS p ON a.id = p.assesment_id WHERE p.pp_user_id = $user";
    }
    // $completed == 1 -> only open assesments for user
    elseif ($completed==1) {
      // SQL statement
      $query="SELECT * FROM assesment AS a INNER JOIN participant AS p ON a.id = p.assesment_id WHERE p.pp_user_id = $user AND a.completed IS NULL";
    }
    // $completed == 2 -> only finished assesments for user
    elseif ($completed==2) {
      // SQL statement
      $query="SELECT * FROM assesment AS a INNER JOIN participant AS p ON a.id = p.assesment_id WHERE p.pp_user_id = $user AND a.completed IS NOT NULL";
    }
    // run SQL statement
    $result=mysqli_query($link, $query);
    // extract data into array with assesments (+ information) for user
    $assesmentsForUser=array();
    while ($row =mysqli_fetch_assoc($result)){
      $assesmentsForUser[]=array(
        'id'=>$row['id'],
        'title'=>$row['title'],
        'completed'=>$row['completed']
      );
    }
    // return array with assesment information
    return $assesmentsForUser;
}

// function to select the participants for an assesment
function assesmentParticipants($assesment){
    // DB connection
    require 'db_connect.php';
    // SQL statement
    $query="SELECT u.username FROM pp_user as u INNER JOIN participant AS p ON u.id = p.pp_user_id WHERE p.assesment_id = $assesment";
    // run SQL statement
    $result=mysqli_query($link, $query);
    // extract data into arry with participants for assesment
    $participants=array();
    while ($row =mysqli_fetch_assoc($result)){
      $participants[]=$row['username'];
    }
    // return arry with participants for assesment
    return $participants;
}

// function to select the tasks for an assesment
function assesmentTasks($assesment){
    // DB connection
    require 'db_connect.php';
    // SQL statement
    $query="SELECT t.id, t.title, t.description, t.result FROM  assesment AS a INNER JOIN task AS t ON a.id = t.assesment_id WHERE a.id = $assesment";
    // run SQL statement
    $result=mysqli_query($link, $query);
    // extract data into array with tasks (+ information) for assesment
    $assesmentTasks = array();
    while ($row =mysqli_fetch_assoc($result)){
      $assesmentTasks[]=array(
        'id'=>$row['id'],
        'title'=>$row['title'],
        'description'=>$row['description'],
        'result'=>$row['result']
      );
    }
    // return arry with tasks for assesment
    return $assesmentTasks;
}

 ?>
