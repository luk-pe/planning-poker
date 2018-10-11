<?php
session_start();
require_once 'db_connect.php';
function register(){

}

function registerFormValidation($email, $username, $password1, $password2, $link){
  // email
  // is email adress already in db?
  $query = "SELECT id FROM pp_user WHERE email =".htmlspecialchars($email);
  $result=mysqli_query($link, $query);

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
  elseif (mysqli_fetch_assoc($result)!=NULL) {
    header("Location: ../register.php?validation=mailExists");
    exit();
  }
  // invalid email adress
  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../register.php?validation=mailInvalid");
    exit();
  }




  // username
  // enthält ungültige Zeichen
  // schon vorhanden

  // passwort
  // pw1 enthält ungültige Zeichen
  // pw2 enthält ungültige Zeichen
  // pw1 != pw2


  // return true wenn alles passt
}

$email = $_POST['email'];
$username = $_POST['username'];
$password1 = $POST['password1'];
$password2 = htmlspecialchars($POST['password2']);
registerFormValidation($email, $username, $password1, $password2, $link);
?>
