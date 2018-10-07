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
      <h5 class="card-title"> Login or <a href="register.html"> register </a> to join a Planning Poker Meeting</h5>
      <p class="card-text">Login with your username and password</p>
      <?php if (isset($_GET['authentification'])){
        if ($_GET['authentification']== 'fail'){
        echo "<span class='badge badge-danger'> Wrong login data! </span>";
        echo "</br></br>";
      }}?>
      <!-- Login form -->
      <form action="helper/loginValidation.php" method="post">
        <!-- Username -->
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Username" name="username">
        </div>
      </br>
      <!-- Password -->
        <div class="input-group">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Login</button>
          </div>
        </div>
        </form>
        <!-- Password Forgotten -->
        <a href="https://giphy.com/gifs/dosequisgifstotheworld-no-facepalm-smh-ADr35Z4TvATIc/fullscreen" class="badge badge-secondary">Password forgotten?</a>
        </div>
        <div class="card-footer">
          <form>
          <!-- Login or Register -->
          <div class="btn-group" role="group" aria-label="Basic example">
            <!-- Login -->
            <input type="button" class="btn btn-outline-secondary active" value="Login"/>
            <!-- Register -->
            <input type="button" class="btn btn-outline-secondary" value="Register"onclick="window.location.href='register.html'"/>

          </div>
          </form>
        </div>
  </div>
</div>
</body>
</html>
