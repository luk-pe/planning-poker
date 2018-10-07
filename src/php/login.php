<!DOCTYPE html>
<html>
<head>
<title>Login</title>
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
      <h5 class="card-title"> Login or <a href="register.php"> Register </a> to join a Planning Poker Meeting</h5>
      <p class="card-text">Login with your Username and Password</p>
      <!-- Login form -->
      <form>
        <!-- Username -->
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">@</span>
          </div>
          <input type="text" class="form-control" placeholder="Username" aria-label="Username">
        </div>
      </br>
      <!-- Password -->
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Password" aria-label="Password">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Login</button>
          </div>
        </div>
        </form>
        <!-- Password Forgotten -->
        <small id="passwordForgotten" class="form-text text-muted"> <a href="https://giphy.com/gifs/dosequisgifstotheworld-no-facepalm-smh-ADr35Z4TvATIc/fullscreen">Password forgotten?</a></small>
        </div>
        <div class="card-footer">
          <form>
          <!-- Login or Register -->
          <div class="btn-group" role="group" aria-label="Basic example">
            <!-- Login -->
            <input type="button" class="btn btn-outline-secondary active" value="Login"/>
            <!-- Register -->
            <input type="button" class="btn btn-outline-secondary" value="Register"onclick="window.location.href='register.php'"/>

          </div>
          </form>

        </div>
  </div>
</div>
</body>
</html>
