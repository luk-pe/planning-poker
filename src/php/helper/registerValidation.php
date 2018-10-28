<?php
session_start();
require_once 'db_connect.php';
// function to register a new user
function register($registerFormValidation, $email, $username, $password1, $link){
  if($registerFormValidation){
    // insert user data into db
    // shouldn't contain any invalid chars after validation is ok...but just to be really sure #paranoia ;)
    $email = htmlspecialchars($email);
    $username = htmlspecialchars($username);
    $password1 = htmlspecialchars($password1);

    // Insert user data into DB
    $query = "INSERT INTO pp_user (email, username, password)
              VALUES ('{$email}', '{$username}', '{$password1}')";
    // actual insert performed here
    if(mysqli_query($link, $query)){
      // if insert was successfully login user...
      require_once 'userIdentification.php';
      $id=usernameToId($username);
      $_SESSION['id']=$id;
      //...and redirect to overview page
      header("Location: ../overview.php");
      exit();
    }else{
      header("Location: https://giphy.com/gifs/1RkDDoIVs3ntm/fullscreen");
      exit();
    };
  }
}
// function to validate the registration form
function registerFormValidation($email, $username, $password1, $password2, $link){
  $registerValidation = array(
    'emailValidation' => false,
    'usernameValidation' => false,
    'passwordValidation' => false
  );
  // email
  // is email adress already in db?
  $query = "SELECT id FROM pp_user WHERE email ='".htmlspecialchars($email)."'";
  $result1=mysqli_query($link, $query);
  // no email adress submitted
  if($email==NULL){
    header("Location: ../register.php?validation=mailNULL");
    exit();
  }
  // contians invalid chars
  elseif ($email != htmlspecialchars($email)){
    header("Location: ../register.php?validation=mailInvalidChars");
    exit();
  }
  // existing user with same email adress
  elseif (mysqli_fetch_assoc($result1)!=NULL) {
    header("Location: ../register.php?validation=mailExists");
    exit();
  }
  // invalid email adress
  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../register.php?validation=mailInvalid");
    exit();
  }
  // submitted email adress ok
  else{
    $registerValidation['emailValidation']=true;
  }

  // username
  // is username already in db?
  $query = "SELECT id FROM pp_user WHERE username ='".htmlspecialchars($username)."'";
  $result2=mysqli_query($link, $query);
  // no username submitted
  if($username==NULL){
    header("Location: ../register.php?validation=usernameNULL");
    exit();
  }
  // contians invalid chars
  elseif ($username != htmlspecialchars($username)){
    header("Location: ../register.php?validation=usernameInvalidChars");
    exit();
  }// existing user with same email adress
  elseif (mysqli_fetch_assoc($result2)!=NULL) {
    header("Location: ../register.php?validation=usernameExists");
    exit();
  }
  // submitted username ok
  else{
    $registerValidation['usernameValidation']=true;
  }

  // passwort
  // no pw1 submitted
  if($password1==NULL){
    header("Location: ../register.php?validation=pw1NULL");
    exit();
  }
  // no pw2 submitted
  if($password2==NULL){
    header("Location: ../register.php?validation=pw2NULL");
    exit();
  }
  // pw1 contians invalid chars
  elseif ($password1 != htmlspecialchars($password1)){
    header("Location: ../register.php?validation=pw1InvalidChars");
    exit();
  }
  // pw2 contians invalid chars
  elseif ($password2 != htmlspecialchars($password2)){
    header("Location: ../register.php?validation=pw2InvalidChars");
    exit();
  }
  // pw1 != pw2
  elseif ($password1 != $password2) {
    header("Location: ../register.php?validation=pwNotIdentical");
    exit();
  }// submitted password ok
  else{
    $registerValidation['passwordValidation']=true;
  }
  if($registerValidation['emailValidation'] && $registerValidation['usernameValidation'] && $registerValidation['passwordValidation']){
    return true;
  }
}
// get data
$email = $_POST['email'];
$username = $_POST['username'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$registerFormValidation=registerFormValidation($email, $username, $password1, $password2, $link);
register($registerFormValidation, $email, $username, $password1, $link);
?>
