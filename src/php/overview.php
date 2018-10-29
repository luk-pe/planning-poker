<?php
require_once 'helper/topInclude.php';
require 'helper/assesmentSelection.php';
require 'helper/taskEstimationSelections.php';
$page = 'overview';

?>
<!DOCTYPE html>
<html>
<head>
<title>Overview</title>
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
      <h4> Finished assesments </h4>
      <!-- TODO filter options-->
      <h6> Filter options <span class="badge badge-success">comming soon!</span></h6>
      <!-- content -->
      <div id="accordion">
      <p><?php

      // select finished assesments for the user
      $assesments = assesmentsForUser($_SESSION['id'],2);
      if($assesments==NULL){
        echo"
        <span class='badge badge-secondary'>No finished assesments existing yet. </span>
         ";
      }
      // create a card for each assesments
      foreach ($assesments as $a) {
        echo("
        <div class='card'>
          <!--  dynamic id -->
          <div class='card-header' id='heading{$a['id']}'>
            <h5 class='mb-0'>
              <div class='row'>
                <div class='col-sm-6'>
              <!-- assesment title-->
              {$a['title']}
                </div>
            <!--  TODO Style in CSS Datei auslagern-->
                <div class='col-sm-6' style='text-align:right'>
                  <!--  dynamic data target -->
                  <a href='#'' data-toggle='collapse' data-target='#collapse{$a['id']}' aria-expanded='true' aria-controls='collapse{$a['id']}' class='badge badge-primary'>Details</a>
                </div>
              </div>
            </h5>
          </div>
          <div id='collapse{$a['id']}' class='collapse' aria-labelledby='heading{$a['id']}' data-parent=''#accordion'>
            <!--  card body contains assesment details-->
            <div class='card-body'>

              <div class='row'>
                <div class='col-sm-8'>
                  <p> <strong> Participants: </strong></p>
                </div>
                <div class='col-sm-4'>
                <!--  TODO Style in CSS Datei auslagern-->
                  <p style='text-align:right'> <strong> Completed:</strong> {$a['completed']} </p>
                </div>
              </div>
          <!-- participants -->
                  ");
                  // select the participants of the assesment
                  $participants = assesmentParticipants($a['id']);
                  // output of the participants
                  foreach ($participants as $p){
                    echo($p);
                    echo("</br>");
                  }
                  echo "   </br>
                <!-- tasks -->
                <p> <strong> Tasks: </strong></p>";
                  // select tasks for assesment
                  $tasks = assesmentTasks($a['id']);
                  // output tasks
                  foreach ($tasks as $t) {
                  echo("

              <!-- row for each task -->
              <div class='row'>
                <div class='col-sm-4'>
                  <p> {$t['title']}</p>
                </div>
                <div class='col-sm-4'>
                  <p> Estimation: {$t['result']} PT </p>
                </div>
                <!--  TODO Style in CSS Datei auslagern-->
                <div class='col-sm-4' style='text-align:right'>
                  <!-- detail button collapses details -->
                  <a  class='badge badge-outline-primary' data-toggle='collapse' href='#collapseExample{$t['id']}' role='button' aria-expanded='false' aria-controls='collapseExample{$t['id']}'>
                    Details
                  </a>
                </div>
              </div>

              <!--  task details -->
              <div class='collapse' id='collapseExample{$t['id']}'>
                <div class='card card-body'>
                  <p>Description: </p>
                  <p>{$t['description']}
                  </p>
                  <p>Estimated expenses: </p>
                  <!-- row for each estimation/each user-->
                  ");

                  $estimations = estimations($t['id']);

                  foreach ($estimations as $e) {
                    echo("<div class='row'>
                      <div class='col-sm-2'>
                        <p> {$e['username']}</p>
                      </div>
                      <div class='col-sm-10'>
                        <p> {$e['estimation']} PT </p>
                      </div>
                    </div>");
                  }
                  echo("
                </div>
                </br>
              </div>

            ");
}
echo("
          </div>
          </div>
        </div>
        ");
        }
       ?></p>


</div>

    </div>
  </div>
</div>
</body>
</html>
