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
    <div class="card-header">
      <h3 >Planning Poker</h3>
      <div class="row">
        <!-- navigation -->
      <div class="col-sm-11">
        <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link active" href="#">Overview</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="enterAssesment.php">Enter assesment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="newAssesment.php">New assesment </a>
          </li>
        </ul>
      </div>
      <!-- user -->
      <div class="col-sm-1">
        <div class="dropdown">
          <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo($_SESSION["id"]); ?>
          </button>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Show details</a>
            <a class="dropdown-item" href="#">Log out</a>
          </div>
        </div>
      </div>
      </div>
    </div>
    <div class="card-body">
      <h4> Finished assesments </h4>
      <!-- TODO -->
      <h6> Filter options</h6>
  <!-- content -->
  <div id="accordion">
  <!-- card for each assignment -->
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <div class="row">
          <div class="col-sm-6">
        Assignement title
      </div>
      <!--  TODO Style in CSS Datei auslagern-->
        <div class="col-sm-6" style="text-align:right">
        <a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="badge badge-primary">Details</a>
      </div>
    </div>
      </h5>
    </div>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <!--  card body contains assignment details-->
      <div class="card-body">

        <div class="row">
          <div class="col-sm-8">
        <p> <strong> Participants: </strong></p>
      </div>
      <div class="col-sm-4">
        <!--  TODO Style in CSS Datei auslagern-->
        <p style="text-align:right"> <strong> Completed:</strong> 01.01.1970 </p>
      </div>
    </div>
    <!-- participants -->
            <p> Participant One </p>
            <p> Participant Two </p>
            <p> ... </p>

        <!-- tasks -->
        <p> <strong> Tasks: </strong></p>
        <!-- row for each rask -->
        <div class="row">
          <div class="col-sm-4">
            <p> Title Task 1</p>
          </div>
          <div class="col-sm-4">
            <p> Estimation: 4 PT </p>
          </div>
          <!--  TODO Style in CSS Datei auslagern-->
          <div class="col-sm-4" style="text-align:right">
            <!-- detail button collapses details -->
            <a  class="badge badge-outline-primary" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
              Details
            </a>
          </div>
        </div>
        <!--  task details -->
        <div class="collapse" id="collapseExample1">
          <div class="card card-body">
            <p>Description: </p>
            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
            </p>
            <p>Estimated expenses: </p>
            <div class="row">
              <div class="col-sm-2">
                <p> User 1</p>
              </div>
              <div class="col-sm-10">
                <p> 4 PT </p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-2">
                <p> User 2</p>
              </div>
              <div class="col-sm-10">
                <p> 4 PT </p>
              </div>
            </div>
          </div>
          </br>
        </div>

        <div class="row">
          <div class="col-sm-4">
            <p> Title Task 2</p>
          </div>
          <div class="col-sm-4">
            <p> Estimation: 16 PT </p>
          </div>
          <!--  TODO Style in CSS Datei auslagern-->
          <div class="col-sm-4" style="text-align:right">
            <!-- detail button collapses details -->
            <a  class="badge badge-outline-primary" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
              Details
            </a>
          </div>
        </div>
        <!--  task details -->
        <div class="collapse" id="collapseExample2">
          <div class="card card-body">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
          </div>
          </br>
        </div>

      </div>
    </div>
  </div>
</div>

    </div>
  </div>
</div>
</body>
</html>
