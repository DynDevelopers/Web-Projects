<?php
  session_start();
  include "con_object.inc.php";

  if(isset($_SESSION['login']) && $_SESSION['login'] == true) {

    if(isset($_POST['username']) &&
        isset($_POST['venue_name']) &&
          isset($_POST['start_time_h']) &&
            isset($_POST['start_time_m']) &&
              isset($_POST['end_time_h']) &&
                isset($_POST['end_time_m']) &&
                  isset($_POST['day']) &&
                    isset($_POST['month']) &&
                      isset($_POST['year'])) {

                        if (empty($_POST['username']) || empty($_POST['venue_name']) || empty($_POST['start_time_h']) || empty($_POST['start_time_m']) ||empty($_POST['end_time_h']) || empty($_POST['end_time_m']) || empty($_POST['day']) || empty($_POST['month']) || empty($_POST['year'])) {
                          //header("Location:../book-venue-page.php?book=empty");
                          echo "Some fields ar missing!";
                        } else {

                          $username = $_POST['username'];
                          $venue_name = $_POST['venue_name'];
                          $user_id = $_SESSION['user_id'];

                          $shrs = $_POST['start_time_h'];
                          $smin = $_POST['start_time_m'];
                          $spm = 'pm';
                          $start_time = "$shrs:$smin $spm";
                          $ist = strtotime($start_time);

                          $inputst = date("h:i a", $ist);
                          echo $inputst."</br>";
                          echo "<script type='text/javascript'>alert('$inputst');</script>";
                          $ehrs = $_POST['end_time_h'];
                          $emin = $_POST['end_time_m'];
                          $spm = 'pm';
                          $end_time = "$ehrs:$emin $spm";

                          $iet = strtotime($end_time);

                          $inputet = date("h:i a", $iet);
                          echo $inputet."</br>";
                          echo "<script type='text/javascript'>alert('$inputet');</script>";

                          $day = $_POST['day'];
                          $month = $_POST['month'];
                          $year = $_POST['year'];
                          $date = "$year-$month-$day";
                          $inputdate = date("y-m-d", strtotime($date));
                          echo "<script type='text/javascript'>alert('$inputdate');</script>";

                          $checksql = "SELECT * FROM bookings WHERE venue_name=? AND date=? AND start_time <= ? AND end_time >= ?";

                          $stmt = mysqli_stmt_init($conn);

                          if(!mysqli_stmt_prepare($stmt, $checksql)) {
                            header("Location:../index.php?login=sqlerror");
                          } else {
                            $st = 'true';
                            mysqli_stmt_bind_param($stmt, "ssss", $venue_name, $inputdate, $inputst, $inputst);

                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);

                            if($result->num_rows > 0) {
                              header("Location:../index.php?book=alreadybooked&venue_name=$venue_name");
                            } else {

                              $insertsql = "INSERT INTO bookings VALUES(?, ?, ?, ?, ?, ?, ?)";

                              if(!mysqli_stmt_prepare($stmt, $insertsql)) {
                                header("Location:../index.php?login=sqlerror");
                              } else {
                                $st = 'false';
                                mysqli_stmt_bind_param($stmt, "sssssss", $user_id, $username, $venue_name, $inputst, $inputet, $inputdate, $st);

                                mysqli_stmt_execute($stmt);

                                if(!mysqli_stmt_get_result($stmt)) {
                                  header("Location:../index.php?book=successfull&booked_venue_name=$venue_name");
                                } else {
                                  echo "Failed to Inserted Data!";
                                }
                              }
                            }
                          }
                        }
                      } else {
                        header("Location:../book-venue-page.php?book=notset");
                      }
  } else {
    header("Location: ../index.php?login=false");
  }
?>
