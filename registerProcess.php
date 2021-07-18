<?php
require 'library/connection.php';
require('config/config.php');
$con = new Database();
session_start();
//check if form is submitted
if (isset($_POST['submit'])) {
  $username = mysqli_real_escape_string($con->link, $_POST['username']); //remove any harmfull inputs like html tags and others
  $email = mysqli_real_escape_string($con->link, $_POST['email']); //remove any harmfull inputs like html tags and others
  $password = mysqli_real_escape_string($con->link, $_POST['password']); //remove any harmfull inputs like html tags and others
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  $role = "user";
  //validate
  if (!isset($username) || $username == '' || !isset($password) || $password == '' || !isset($email) || $email == '') {
    $error = "Please fill in your Data";
    $_SESSION['error'] = $error;
    header("location:register.php");
    exit();
  } else {
    $sql = "SELECT * FROM users where email='$email'";
    $result = mysqli_query($con->link, $sql);
    $row = mysqli_fetch_array($result);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows >= 1) {
      $error = "this email is exist Please Login or use another email";
      $_SESSION['error'] = $error;
      header("location:register.php");
      exit();
    } else {
      $query = "INSERT INTO users (username,password,email,role)
                VALUES ('$username', '$hashed_password', '$email', '$role')";
     $_SESSION["name"]=$username;
     $_SESSION["email"]=$email;
     $_SESSION["role"]=$role;
     $_SESSION["seccess"]="Welcome !";
    $insert_row = $con->insert($query);
    }
  }
}
