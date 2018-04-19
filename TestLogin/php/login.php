<?php

session_start();
echo '<pre>';
var_dump($_POST);
echo '</pre>';

include_once 'db.php';

if (isset($_POST['login'])) {

  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  //Error handlers
  //Check if inputs are empty
  if (empty($email) || empty('password')) {
    header("Location: ../index.php?login=empty");
    exit();
  } else {
    $query = "SELECT * FROM users WHERE user_email='$email'";
    $result = mysqli_query($db, $query);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck < 1) {
      header("Location: ../index.php?login=error");
      exit();
    } else {
      if ($row = mysqli_fetch_assoc($result)) {
        //Dehashing the password
        $hashedPasswordcheck = password_verify($password, $row['user_password']);
        if ($hashedPasswordcheck == false) {
          header("Location: ../index.php?login=error");
          exit();
        } elseif ($hashedPasswordcheck == true) {
          //Log in user here
          $_SESSION['u_id'] = $row['user_id'];
          $_SESSION['u_username'] = $row['user_name'];
          $_SESSION['u_email'] = $row['user_email'];
          header("Location: ../index.php?login=success");
          exit();
        }
      }
    }
  }
} else {
  header("Location: ../index.php?login=error");
  exit();
}
