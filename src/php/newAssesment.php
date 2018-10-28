<?php
require_once 'helper/topInclude.php';
$page = 'newAssesment';
 ?>
<!DOCTYPE html>
<html>
<head>
<title>New assesment</title>
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
      <h5>Create a new Planning Poker assesment</h5>
      <form action="helper/createAssesment.php" method="post">
      <div class="form-group">
        <label for="Title">Title</label>
        <input type="text" class="form-control" name="assesment_title" placeholder="Enter title">
      </div>
      <div class="form-group">
        <label for="project_id">Projekt ID</label>
        <input type="number" class="form-control" name="project_id" placeholder="optional">
      </div>
      <div class="form-group">
        <label for="participants">Participants</label>
        <select multiple class="form-control" name="participants[]">
          <option value="Lukas">Lukas</option>
          <option value="Michi">Michi</option>
          <option value="Elias">Elias</option>
          <option value="Robert">Robert</option>
        </select>
        <small id="selectHelp" class="form-text text-muted">select more than one participant by holding shift or command</small>
      </div>
        <button type="submit" class="btn btn-primary">Create assesment and add some tasks </button>
    </form>
    </div>
  </div>
</div>
</body>
</html>
