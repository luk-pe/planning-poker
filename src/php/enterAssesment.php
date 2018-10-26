<?php
require_once 'helper/topInclude.php';
require 'helper/assesmentSelection.php';
$page = 'enterAssesment';
 ?>
<!DOCTYPE html>
<html>
<head>
<title>Enter assesment</title>
<!-- bootstrap framework integration-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body><br/>
  <div class="container">
    <!-- bootstrap card-->
  <div class="card">
    <?php require 'structure/header.php' ?>
    <div class="card-body">
      <h4> Open assesments </h4></br>

      <p class='mb-0'>
        <!--  row for each open assesment -->
        <?php
        $assesments = assesmentsForUser($_SESSION['id'], 1);
        if($assesments==NULL){
          echo"
          <span class='badge badge-secondary'>No open assesments available. </span>
           ";
        }else{
        foreach ($assesments as $a) {
          echo("
          <div class='row'>
            <div class='col-sm-6'>
              <!-- assesment title-->
            <h6>  {$a['title']} </h6>
            </div>
            <!--  TODO Style in CSS Datei auslagern-->
            <div class='col-sm-6' style='text-align:right'>
              <!-- start planning poker assesment -->
              <a href='#' class='badge badge-success'>Start</a>
              <a  class='badge badge-primary' data-toggle='collapse' href='#collapseExample{$a['id']}' role='button' aria-expanded='false' aria-controls='collapseExample{$a['id']}'>
                Details
              </a>
            </div>
          </div></br>
          <!-- assesment details -->
          <div class='collapse' id='collapseExample{$a['id']}'>
            <div class='card card-body'>
            <div class='row'>
            <div class='col-sm-6'>
            <h6>Invited participants:</h6>
            ");
            $participants=assesmentParticipants($a['id']);
            foreach ($participants as $p) {
              echo "{$p} </br>";
            }
            echo "</div>
            <div class='col-sm-6'>
            <h6>Tasks:</h6>
            ";
            // select and echo tasks for assesment
            $tasks = assesmentTasks($a['id']);
            foreach ($tasks as $t) {
              echo "{$t['title']} </br>";
            }
            echo("
            </div>
            </div>
            </div></br>
            </div>
          ");
        }
      }
         ?>

      </p>

    </div>
  </div>
</div>
</body>
</html>
