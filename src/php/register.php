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
      <h5 class="card-title"> Register or <a href=login.php> Login </a> to join a Planning Poker Meeting</h5>
      <p class="card-text">Please give us some data to identify you</p>
    <!-- Register Form -->
    <form>
        <!-- -->
        <div class="form-group">
          <label for="Email">Email address</label>
          <input type="email" class="form-control" id="email" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <!-- Username -->
        <div class="form-group">
          <label for="Username">Username</label>
          <input type="text" class="form-control" id="username" placeholder="Choose a username">
        </div>
        <!-- Password -->
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="password1" placeholder="Password"> </br>
          <input type="password" class="form-control" id="password2" placeholder="Repeat password">
        </div>
        <!-- Register Button -->
        <button type="submit" class="btn btn-primary">Register</button>
      </form>

    </div>
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
