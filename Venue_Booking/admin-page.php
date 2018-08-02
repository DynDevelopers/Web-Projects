<?php
  include 'includes/con_object.inc.php';
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Admin Page</title>
    <style type="text/css">
      header nav form a {
        text-decoration: none;
        color: white;
        float: left;
        padding: 18px 20px;
        margin-left: 20px;
        font-weight: 200;
        font-size: 20px;
        font-family: sans-serif;
      }

       header nav form a:hover {
        background-color: #006984;
      }

      header nav p {
        color: white;
        float: right;
        font-size: 20px;
        margin-top: 16px;
        margin-right: 50px;
        font-weight: 100;
        font-family: sans-serif;
      }

      table {
        margin-right: 10%;
        margin-left: 15%;
      }

      #rjbtn {
        margin-top: 10px;
      }

      #acbtn {
        border-color: green;
        color: green;
      }
    </style>
  </head>
  <link href="web_style/nav-style.css" rel="stylesheet" type="text/css">
  <link href="web_style/table-style.css" rel="stylesheet" type="text/css">
  <body>
    <header>
      <nav>
        <form>
          <a href="index.php" >Home</a>
          <a href="add-users.php" >Add User</a>
          <a href="includes/logout.php">logout</a>
        </form>
        <?php echo "<p><strong> Welcome </strong> Admin</p>"?>
      </nav>
    </header>

    <?php
    $sql = "SELECT * FROM bookings WHERE status='false';";
    $result = mysqli_query($conn, $sql);
    $st = true;
    $sf = false;

    if (mysqli_num_rows($result) > 0) {
      echo "<table border='1' cellpadding='1' cellspacing='1'>";
      echo "<tr>";
        echo "<th>Venue Name</th>";
        echo "<th>Username</th>";
        echo "<th>Date</th>";
        echo "<th>Start Time</th>";
        echo "<th>End Time</th>";
        echo "<th>Acknowledgement</th>";
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        $vname = $row['venue_name'];
        echo "<td>".$vname."</td>";
        $uname = $row['username'];
        echo "<td>".$uname."</td>";
        $date = $row['date'];
        echo "<td>".$date."</td>";
        echo "<td>".$row['start_time']."</td>";
        echo "<td>".$row['end_time']."</td>";
        echo "<td><a id='accept' href='includes/booking-decision.php?venue_name=$vname&status=$st&user_name=$uname&date=$date'>Accept</a><a id='reject' href='includes/booking-decision.php?venue_name=$vname&status=$sf&user_name=$uname&date=$date'>Reject</a></td>";

        echo "</tr>";
      }
      echo "</table>";
    } else {
      echo "<p>No Bookings Available!</p>";
    }

    ?>
    <script type="text/javascript">
      function accept(a) {
        alert('a');
      }

      function reject(r) {
        alert('r');
      }
    </script>

    <style type="text/css">

      table tr td a {
        text-decoration: none;
        padding: 6px 30px 6px 30px;
        width: 10px;
        font-size: 12px;
        margin-top: 20px;
      }


      #reject {
        border: 2px solid red;
        margin-left: 20px;
        color: red;
      }

      #accept {
        border: 2px solid green;
        color: green;
      }

      table tr td a:hover {
        border-width: medium;
        font-weight: bolder;
      }

    </style>
  </body>
</html>
