<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require '../PHPMailer/src/PHPMailer.php';
  require '../PHPMailer/src/Exception.php';
  require '../PHPMailer/src/SMTP.php';
  include 'con_object.inc.php';

  if(isset($_GET['venue_name']) && isset($_GET['status']) && isset($_GET['user_name']) && isset($_GET['date'])) {

    $uname = $_GET['user_name'];
    $sql = "SELECT * FROM users WHERE username='$uname'";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
      $result_email = $result->fetch_assoc();
      $send_email = $result_email['user_email'];
      echo "Email :".$send_email;

    } else {
      echo "Something Went Wrong";
      //header("Location:admin-page.php");
    }

    $mail = new PHPMailer(true);
    try {
      $mail->SMTPDebug = 0;
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'harrisnawarangee91@gmail.com';
      $mail->Password = 'myname.8108';
      $mail->SMTPSecure = 'tls';
      $mail->Port = 587;

      $mail->setFrom('harrisnawarangee91@gmail.com', 'Venue Booking Admin.');
      $mail->addAddress($send_email);
      $mail->isHTML(true);

      $vname = $_GET['venue_name'];
      $bdate = $_GET['date'];
      $sql = "";
      if ($_GET['status'] == true) {
        $mail->Subject = $_GET['venue_name'].' Booked Successfully';
        $mail->Body = 'Your Booking for '.$_GET['venue_name']." is Acccepted";

        $sql = "UPDATE bookings SET status='true' WHERE username='$uname' AND venue_name='$vname' AND date='$bdate'";

      } else if($_GET['status'] == false) {
        $mail->Subject = $_GET['venue_name'].' Failed to book';
        $mail->Body = 'Your Booking for '.$_GET['venue_name']." is Rejected";

        $sql = "DELETE FROM bookings WHERE username='$uname' AND venue_name='$vname' AND date='$bdate'";
      }

      if($mail->send()) {
        $result = $conn->query($sql);
        header("Location:../admin-page.php");
        exit();
      } else {
        echo "Mail Send UnSuccessfully";
      }

    } catch (Exception $e) {
      echo "Something went wrong :".$mail->ErrorInfo;
    }
  }else {
    header("Location:../admin-page.php");
  }
?>
