<?php
require_once 'helper/topInclude.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Planning Poker</title>
<!-- bootstrap framework integration-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="../js/planningPokerScript.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body><br/>
  <div class="container">
    <!-- bootstrap card-->
  <div class="card">
    <div class="card-body">
      <h4>Planning Poker</h4>
      <!--  get data -->
      <?php
      $assesmentId = $_GET['assesmentid'];
      require_once 'helper/assesmentSelection.php';
      $assesmentTitle = assesmentIdToTitle($assesmentId);
      $userId = $_SESSION['id'];
      $currentTask = $_GET['task'];
      $tasks = assesmentTasks($assesmentId);
      $numberOfTasks = count($tasks);
      $i=1;
      foreach ($tasks as $t) {
        if ($i==$currentTask){
          $taskTitle=$t['title'];
          $taskDescription = $t['description'];
          $taskId = $t['id'];
        }
        $i++;
      }
      ?>
      <h5><?php echo $assesmentTitle;  ?><h5>
        <h6> <?php echo $taskTitle; echo " (Task ".$currentTask."/".$numberOfTasks;  echo ")";?></h6>
        <p><?php echo $taskDescription; ?><p>
          <div class="row">
            <div class='col-sm-6'>
              <form>
                <!--  hidden data -->
                <input type="hidden" value="<?php echo $assesmentId?>" id="assesmentId">
                <input type="hidden" value="<?php echo $taskId?>" id="taskId">
                <input type="hidden" value="<?php echo $userId?>" id="userId">
                <input type="hidden" value="<?php echo $currentTask?>" id="currentTask">
                <input type="hidden" value="<?php echo $numberOfTasks?>" id="numberOfTasks">
                <input type="hidden" value="<?php echo date('Y-m-d');?>" id="date">
                <div class="form-group">
                  <label for="Title">Your estimation:</label>
                  <input type="number" min="1" max="32" class="form-control" name="estimation" id="estimation">
                </div>
                <div class="form-group">
                <label for="Title">Comment:</label>
                <input type="text" class="form-control" name="comment" id="comment">
                </div>
              </form>
              <button style='visibility:visible' id="button" onclick="submitEstimation()" class="btn btn-primary">Submit estimation</button>
              <p style='visibility:hidden' id="estimatedMessage" class='badge badge-success'> Thank you for your estimation! Please wait for the other participants to estimate the task.</p>
            </div>
          <div class='col-sm-6'>
            <p> Other estimations: <p>
            <p id="estimations"> Name - Estimation PT - comment </p>
          </div>
        </div>
    </div>
  </div>
</div>
</body>
</html>
