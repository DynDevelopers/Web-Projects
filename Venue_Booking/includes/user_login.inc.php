<?php
  include "con_object.inc.php";
  session_start();

  if(isset($_POST['user_id']) && isset($_POST['user_pass'])) {
    $user_id = $_POST['user_id'];
    $user_pass = $_POST['user_pass'];
    if(empty($user_id) || empty($user_pass)) {
      $_SESSION['login'] == false;
      header("Location:../index.php?login=empty");
    } else {

      if(isset($_GET['type'])) {
        if($_GET['type'] == 'user') {
          $sql = "SELECT * FROM users WHERE user_id=? AND user_pass=?";
          $stmt = mysqli_stmt_init($conn);

          if(!mysqli_stmt_prepare($stmt, $sql)) {
            $_SESSION['login'] == false;
            header("Location:../index.php?login=sqlerror");
          } else {
            mysqli_stmt_bind_param($stmt, "ss", $user_id, $user_pass);

            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            if(!mysqli_num_rows($result) > 0) {
              $_SESSION['login'] == false;
              header("Location:../index.php?login=unsuccessfull");
            } else {
              $row = mysqli_fetch_assoc($result);
              $_SESSION['user_id'] = $row['user_id'];
              $_SESSION['username'] = $row['username'];
              $_SESSION['user_email'] = $row['user_email'];
              $_SESSION['login'] = true;
              $_SESSION['type'] = 'user';
              header("Location:../index.php?login=successfull");
            }
          }
        } else if($_GET['type'] == 'admin') {
          if($user_id == 'admin' && $user_pass == 'admin') {
            $_SESSION['user_id'] = 'admin';
            $_SESSION['username'] = 'Admin';
            $_SESSION['login'] = true;
            $_SESSION['type'] = 'admin';
            header("Location:../admin-page.php");
          } else {
            header("Location:../admin-login.php?login=unsuccessfull");
          }
        }
      }
    }
  } else {
    $_SESSION['login'] == false;
    header("Location:../index.php?login=error");
  }
?>
