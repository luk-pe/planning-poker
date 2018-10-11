<?php
session_start();
require_once 'db_connect.php';
function register(){

}

function registerFormValidation(){
  // email
  // is email adress already in db?
  $query = "SELECT id FROM pp_user WHERE email = $email";
  $result=mysqli_query($link, $query);


  if($email==NULL){
    header("Location: ../register.php?validation=mailNULL");
    exit();
  }
  // contians invalid chars
  elseif ($email != $_POST['email']){
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

$email = htmlspecialchars($_POST['email']);
$username = htmlspecialchars($_POST['username']);
$password1 = htmlspecialchars($POST['password1']);
$password2 = htmlspecialchars($POST['password2']);
registerFormValidation();
?>
