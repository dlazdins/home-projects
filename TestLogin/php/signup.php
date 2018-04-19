<?php
session_start();
echo '<pre>';
var_dump($_POST);
echo '</pre>';
// die();
include_once 'db.php';

if (isset($_POST['signup'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  //Error handlers
  //Check for empty fields
  if (empty($username) || empty($email) || empty($password)) {
    header("Location: ../index.php?signup=empty");
    exit();
  } else {
      //Check if input character are valid
      if (!preg_match("/^[a-zA-Z \s]*$/", $username)) {
        header("Location: ../signup.php?signup=invalid");
        exit();
      } else {
          //Check if email is valid
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../signup.php?signup=email");
            exit();
          } else {
              $query = "SELECT * FROM users WHERE user_name='$username'";
              $result = mysqli_query($db, $query);
              $resultCheck = mysqli_num_rows($result);

              if ($resultCheck > 0) {
                header("Location: ../signup.php?signup=usertaken");
                exit();
              } else {
                //Hashing the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                //Insert the user into the database
                $query = "INSERT INTO users (user_name, user_email, user_password) VALUES ('$username', '$email', '$hashedPassword');";
                mysqli_query($db, $query);
                header("Location: ../signup.php?signup=success");
                exit();
              }
          }
      }
  }
} else {
    header("Location: ../signup.php");
    exit();
}
