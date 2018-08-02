<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <style media="screen">
      p {
        font-family: sans-serif;
        font-weight: bold;
        color: black;
        background-color: #efefef;
        margin-top: 0;
        padding: 10px;
        font-size: 20px;
      }

      dl {
        margin-top: 50px;
      }

      dt {
        font-family: sans-serif;
        margin-bottom: 10px;
      }

      dd {
        font-family: sans-serif;
        font-weight: lighter;
      }
    </style>
    <title></title>
  </head>
  <body>
    <?php
      include "includes/con_object.inc.php";
      if(isset($_GET['vn'])) {
        $v_name = mysqli_real_escape_string($conn, $_GET['vn']);


        $sql = "SELECT * FROM bookings WHERE venue_name="."'".$v_name."';";
        $result = $conn->query($sql);

        if($result->num_rows > 0) {
          echo "<dl>";
            echo "<p>".$v_name."</p>";
            while ($row = $result->fetch_assoc()) {
              echo "<dt>Username: ".$row['username']."</dt>";
              echo "<dd> Start: ".$row['start_time']."</dd>";
              echo "<dd>Ends: ".$row['end_time']."</dd>";
              echo "<dd>Date: ".$row['date']."</dd>";
              echo "<dd>Status: ".$row['status']."</dd>";
              echo "<br><br>";
            }
          echo "</dl>";
        } else {
          echo "<p>".$v_name." is not booked by any one</p>";
        }
      } else {
        header("Location:index.php?");
      }
    ?>
  </body>
</html>
