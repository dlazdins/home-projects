<?php
session_start();
echo '<pre>';
var_dump($_POST);
echo '</pre>';

include_once 'db.php';

if (isset($_POST['signup'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  //Error handlers
  //Check for empty fields
  if (empty($username) || empty($email) || empty($password)) {
    // header("Location: ..signup.php?signup=empty");
    exit();
  } else {
      //Check if input character are valid
      if (!preg_match("/^[a-zA-Z]*$/", $username)) {

      } else {
          //Check if email is valid
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // header("Location: ..signup.php?signup=email");
            exit();
          } else {
              $sql = "SELECT * FROM users WHERE user_name='$username'";
              $result = mysql_query($conn, $sql);
              $resultCheck = mysqli_num_rows($result);

              if ($resultCheck > 0) {
                // header("Location: ../signup.php?signup=usertaken");
                exit();
              } else {
                //Hashing the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                //Insert the user into the database
                $sql = "INSERT INTO users (user_name, user_email, user_password) VALUES ('$username', '$email', '$hashedPassword');";
                mysql_query($conn, $sql);
                // header("Location: ../signup.php?signup=success");
                exit();
              }
          }
      }
  }


} else {
    // header("Location: ../signup.php");
    exit();
}
