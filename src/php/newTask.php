<?php
require_once 'helper/topInclude.php';
$page = 'newTask';
 ?>
<!DOCTYPE html>
<html>
<head>
<title>New task</title>
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
    <div class="card-body">
      <h5>Add a task to the assesment</h5>
      <?php
      $assesmentId = $_GET['id'];
      ?>
      <!-- form for user input -->
      <form action="helper/createTask.php?id=<?php echo $assesmentId; ?>" method="post">
        <!--  task title -->
        <div class="form-group">
          <label for="Title">Task title</label>
          <input type="text" class="form-control" name="task_title" placeholder="Enter title">
        </div>
        <!--  task description -->
        <div class="form-group">
          <!--  TODO bigger input field-->
          <label for="Title">Task description</label>
          <input type="text" class="form-control" name="task_description" placeholder="Enter description">
        </div>
        <!--  selection next step: add another task or finish-->
        <div class="form-group">
          <label for="Title">Next Step</label>
          <!--  TODO radio buttons -->
        </div>
        <!--  submit button -->
        <button type="submit" class="btn btn-primary">Create task</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>
