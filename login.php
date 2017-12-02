<?php
include_once('database.php');

session_start();

if (empty($_POST['username']) || empty($_POST['password'])) {
  $error = "Username or Password is invalid";
} else {

  $username = $_POST['username'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT ID, password FROM users WHERE username=?");

  $stmt->bind_param('s', $username);

  $hashed_input_passowrd = password_hash($password, PASSWORD_BCRYPT);

  $stmt->execute();

  $stmt->bind_result($ID, $db_password);

  $stmt->fetch();


  if(!$db_password) {
    echo '<meta http-equiv="refresh" content="0; url=login_page.php?error=1" />';
    die();
  }

  //check the hash
  if(password_verify($password, $db_password)) {
    $_SESSION['user_id'] = $ID;
    echo '<meta http-equiv="refresh" content="0; url=list.php" />';
  } else {
    echo '<meta http-equiv="refresh" content="0; url=login_page.php?error=1" />';
  }

  $stmt->close();
}
/*
  $rows = mysql_num_rows($query);
  if ($rows == 1) {
  $_SESSION['login_user']=$username; // Initializing Session
  header("location: profile.php"); // Redirecting To Other Page
  } else {
  $error = "Username or Password is invalid";
  }
  mysql_close($connection); // Closing Connection
  }*/
?>