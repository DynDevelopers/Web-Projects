<?php
  include 'includes/con_object.inc.php';
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>User Profile</title>
    <style type="text/css">

      main section {
        margin-top: 150px;
      }

      header nav ul {
        height: 100%;
        margin-top: -2px;
      }

      ul li {
        list-style-type: none;
      }

      header nav ul li a {
        color: white;
        text-decoration: none;
        float: left;
        font-size: 20px;
        font-weight: 200;
        font-family: sans-serif;
        padding: 19px 20px;
        margin-left: 30px;
        transition-duration: 0.5s;
      }

      header nav a:hover {
        transition-duration: 0.5s;
        background-color: #006984;
      }

      header nav p {
        margin-top: 16px;
        float: right;
        font-size: 20px;
        margin-right: 50px;
        color: white;
        font-family: sans-serif;
        font-weight: 100;
      }

      section p {
        font-size: 20px;
        text-align: center;
        font-weight: 200;
        font-family: sans-serif;
        background-color: red;
        color: white;
        line-height: 50px;
      }

      @media only screen and (max-width: 600px) {
        header nav a {
          font-size: 15px;
          float: left;
          margin-left: 5px;
        }

        header nav strong p {
          font-size: 20px;
        }
      }


    </style>
  </head>
  <link href="web_style/nav-style.css" rel="stylesheet" type="text/css">
  <link href="web_style/table-style.css" rel="stylesheet" type="text/css">
  <body>
    <?php if(!isset($_SESSION['login']) && $_SESSION['login'] == false) {header("Location:index.php");}?>
    <header>
      <nav>
        <ul>
          <li><a href="index.php">Home</a>
              <a href="includes/logout.php">logout</a>
          <?php echo '<p><strong> Welcome </strong>  '.$_SESSION['username'].'</p></li>';?>
        </ul>

      </nav>
    </header>
    <main>
      <section>
        <?php
          $sql = "SELECT * FROM bookings WHERE user_id=? AND status=?";
          $stmt = mysqli_stmt_init($conn);
          $st = 'false';
          if(!mysqli_stmt_prepare($stmt, $sql)) {
            echo "<p>SQL Error!</p>";
          } else {
            $userid = $_SESSION['user_id'];
            mysqli_stmt_bind_param($stmt, "ss", $userid, $st);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if(!mysqli_num_rows($result) > 0) {
              echo "<p>You have no bookings yet!<p>";
            } else {
              echo "<table border='1' cellpadding='1' cellspacing='1'>";
              echo "<tr>";
                echo "<th>Venue Name</th>";
                echo "<th>Date</th>";
                echo "<th>Start Time</th>";
                echo "<th>End Time</th>";
                echo "<th>Cancel Request</th>";
              echo "</tr>";
              while($row = mysqli_fetch_assoc($result)) {

                echo "<tr>";
                echo "<td>".$row['venue_name']."</td>";
                echo "<td>".$row['date']."</td>";
                echo "<td>".$row['start_time']."</td>";
                echo "<td>".$row['end_time']."</td>";
                echo "<td><button>Request Cancel</button></td>";
                echo "</tr>";
              }
              echo "</table>";
            }
          }
        ?>
      </section>
    </main>
  </body>
</html>
