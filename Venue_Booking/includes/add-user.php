<?php

  include "con_object.inc.php";

  if(isset($_POST['user_id']) &&
      isset($_POST['username']) &&
        isset($_POST['password']) &&
          isset($_POST['email']) &&
            isset($_POST['dept'])) {

            $uid = $_POST['user_id'];
            $uname = $_POST['username'];
            $upass = $_POST['password'];
            $uemail = $_POST['email'];
            $udept = $_POST['dept'];

            if(empty($uid)) {
              header("Location:../add-users.php?uname=$uname&uemail=$uemail&error=empty");
              exit();
            }

            if(empty($uname)) {
              header("Location:../add-users.php?uid=$uid&uemail=$uemail&error=empty");
              exit();
            }

            if(empty($uemail)) {
              header("Location:../add-users.php?uname=$uname&uid=$uid&error=empty");
              exit();
            } else if(!filter_var($uemail, FILTER_VALIDATE_EMAIL)) {
              header("Location:../add-users.php?email=invalid&uid=$uid&uname=$uname&error=invalid");
              exit();
            }

            if(empty($upass)) {
              header("Location:../add-users.php?uname=$uname&uid=$uid&uemail=$uemail&error=empty");
              exit();
            }

            $sql = "SELECT * FROM users WHERE user_id=$uid";

            $result = mysqli_query($conn, $sql);

            if($result->num_rows > 0) {
              header("Location:../add-users.php?uname=$uname&uemail=$uemail");
              exit();
            } else {
              $sql = "INSERT INTO users VALUES(?, ?, ?, ?, ?)";

              $stmt = mysqli_stmt_init($conn);

              mysqli_stmt_prepare($stmt, $sql);

              mysqli_stmt_bind_param($stmt, "sssss", $uid, $uname, $uemail, $upass, $udept);

              mysqli_stmt_execute($stmt);

              if(!mysqli_stmt_get_result($stmt)) {
                header("Location:../add-users.php?user=success");
              } else {
                header("Location:../add-users.php?user=unsuccess");
              }
            }
          } else {
            header("Location:../add-users.php?input=empty");
          }
?>
