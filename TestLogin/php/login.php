<?php

session_start();
echo '<pre>';
var_dump($_POST);
echo '</pre>';

include_once 'db.php';

if (isset($_POST['login'])) {

  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  //Error handlers
  //Check if inputs are empty
  if (empty($username) || empty('password')) {
    // header("Location: ../index.php?login=empty");
    exit();
  } else {
    $sql = "SELECT * FROM users WHERE user_name='$username'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck < 1) {
      // header("Location: ../index.php?login=error");
      exit();
    } else {
      if ($row = mysqli_fetch_assoc($result)) {
        //Dehashing the password
        $hashedPasswordcheck = password_verify($password, $row['user_password']);
        if ($hashedPasswordcheck == false) {
          // header("Location: ../index.php?login=error");
          exit();
        } elseif ($hashedPasswordcheck == true) {
          //Log in user here
          $_SESSION['u_id'] = $row['user_id'];
          $_SESSION['u_username'] = $row['user_name'];
          $_SESSION['u_email'] = $row['user_email'];
          // header("Location: ../index.php?login=success");
          exit();
        }
      }
    }
  }
} else {
  // header("Location: ../index.php?login=error");
  exit();
}
