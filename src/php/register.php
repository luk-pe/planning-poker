<!DOCTYPE html>
<html>
<head>
<title>Register</title>
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
    <h3 class="card-header">Welcome!</h3>
    <div class="card-body">
      <h5 class="card-title"> Register or <a href=login.php> login </a> to join a Planning Poker Meeting</h5>
      <p class="card-text">Please give us some data to identify you</p>
    <!-- Register Form -->
    <form action="helper/registerValidation.php" method="post">
        <!-- -->
        <div class="form-group">
          <label for="Email">Email address</label>
          <?php
          if (isset($_GET['validation'])){
            echo "</br>";
            switch ($_GET['validation']) {
              case 'mailNULL':
                  echo "<span class='badge badge-danger'> Please give us your email adress! </span>";
                  echo "</br></br>";
                  break;
              case 'mailInvalidChars':
                  echo "<span class='badge badge-danger'> Email adress contains invalid characters! </span>";
                  echo "</br></br>";
                  break;
              case 'mailExists':
                  echo "<span class='badge badge-danger'> User with this email adress already exists! </span>";
                  echo "</br></br>";
                  break;
              case 'mailInvalid':
                  echo "<span class='badge badge-danger'> Invalid email adress! </span>";
                  echo "</br></br>";
                  break;
            }
          }?>
          <input type="email" class="form-control" name="email" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <!-- Username -->
        <div class="form-group">
          <label for="Username">Username</label>
          <?php
          if (isset($_GET['validation'])){
            echo "</br>";
            switch ($_GET['validation']) {
              case 'usernameNULL':
                  echo "<span class='badge badge-danger'> Please choose a username! </span>";
                  echo "</br></br>";
                  break;
              case 'usernameInvalidChars':
                  echo "<span class='badge badge-danger'> Username contains invalid characters! </span>";
                  echo "</br></br>";
                  break;
              case 'usernameExists':
                  echo "<span class='badge badge-danger'> User with this username already exists! </span>";
                  echo "</br></br>";
                  break;
            }
          }?>
          <input type="text" class="form-control" name="username" placeholder="Choose a username">
        </div>
        <!-- Password -->
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <?php
          if (isset($_GET['validation'])){
            echo "</br>";
            switch ($_GET['validation']) {
              case 'pw1NULL':
                  echo "<span class='badge badge-danger'> Please choose a password! </span>";
                  echo "</br></br>";
                  break;
              case 'pw1InvalidChars':
                  echo "<span class='badge badge-danger'> Password contains invalid characters! </span>";
                  echo "</br></br>";
                  break;
            }
          }?>
          <input type="password" class="form-control" name="password1" placeholder="Password"> </br>
          <?php
          if (isset($_GET['validation'])){
            switch ($_GET['validation']) {
              case 'pw2NULL':
                  echo "<span class='badge badge-danger'> Please repeat the password! </span>";
                  echo "</br></br>";
                  break;
              case 'pw2InvalidChars':
                  echo "<span class='badge badge-danger'> Password contains invalid characters! </span>";
                  echo "</br></br>";
                  break;
              case 'pwNotIdentical':
                  echo "<span class='badge badge-danger'> Passwords are not identical! </span>";
                  echo "</br></br>";
                  break;
            }
          }?>
          <input type="password" class="form-control" name="password2" placeholder="Repeat password">
        </div>
        <!-- Register Button -->
        <button type="submit" class="btn btn-primary">Register</button>
      </form>

    </div>
    <!-- TODO footer for login and register in sperate file -->
    <div class="card-footer">
      <form>
      <!-- Login or Register -->
      <div class="btn-group" role="group" aria-label="Basic example">
        <!-- Login -->
        <input type="button" class="btn btn-outline-secondary" value="Login" onclick="window.location.href='login.php'"/>
        <!-- Register -->
        <input type="button" class="btn btn-outline-secondary active" value="Register" onclick="window.location.href='register.php'"/>

      </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
