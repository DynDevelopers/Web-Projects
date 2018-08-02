<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Home Page</title>
    <style type="text/css">
      .username {
        float: right;
        font-size: 20px;
        margin-right: 50px;
        color: white;
      }

      header nav .wrapper a  {
        font-family: sans-serif;
        float: left;
        padding: 18px 20px;
        text-decoration: none;
        color: white;
        font-weight: 200;
        font-size: 20px;
        margin-left: 30px;
      }

      header nav p {
        margin-top: 16px;
        font-family: sans-serif;
        font-weight: 100;
      }

      .wrapper {
        height: 100%;
      }

      header nav form {
        width: 100%;
        line-height: 100%;
      }
    </style>

  </head>

  <link rel="stylesheet" type="text/css" href="web_style/homepage_style.css">
  <link rel="stylesheet" type="text/css" href="web_style/nav-style.css">

  <body>
    <header>
      <nav class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <?php
          if(isset($_SESSION['login']) && $_SESSION['login'] == true) {
            echo '<div class="wrapper">';
            echo "<p class='username'><strong> Welcome </strong>".$_SESSION['username']."</p>";
            if($_SESSION['type'] == 'admin') {
              echo '<a href="admin-page.php" class="logged_in_b">Profile</a>';
            } else {
              echo '<a href="user-profile.php" class="logged_in_b">Profile</a>';
            }

            echo '<a href="includes/logout.php" class="logged_in_a">logout</a>
          </div>';
          } else {
            echo '<form action="includes/user_login.inc.php?type=user" method="post">
              <input name="user_id" placeholder="User Id" id="user_id">
              <input type="password" name="user_pass" placeholder="Password">
              <button value="submit" type="submit">Submit</button>
              <a href="admin-login.php">Admin Login</a>
            </form>';
          }
        ?>
      </nav>
    </header>
    <main>
      <?php
        if(isset($_GET['login'])) {
          if($_GET['login'] == 'empty') {
            echo "<p class='error_msg'>Some fields are missing</p>";
          } else if($_GET['login'] == 'sqlerror') {
            echo "<p class='error_msg'>Something went wrong</p>";
          } else if($_GET['login'] == 'unsuccessfull') {
            echo '<p class="error_msg">Incorrect Username or password!</p>';
          } else if($_GET['login'] == 'successfull') {
            echo '<p class="error_msg">Login Successfull!</p>';
            header("Location:user-profile.php");
          } else if($_GET['login'] == 'error') {
            echo '<p class="error_msg">Not Set!</p>';
          } else if($_GET['login'] == 'false') {
            echo '<p class="error_msg">You must login first!</p>';
          } else if($_GET['login'] == 'adminerror') {
            echo '<p class="error_msg">You must do admin login to Add users !</p>';
          }
        }

        if (isset($_GET['venue_name'])) {
          if($_GET['venue_name'] == 'notset') {
            echo '<p class="error_msg">Venue Name Not Set!</p>';
          }
        }

        if(isset($_GET['book'])) {
          if($_GET['book'] == 'successfull') {
            echo '<p class="error_msg">'.$_GET['booked_venue_name'].' Booked Successfully</p>';
          } else if($_GET['book'] == 'alreadybooked') {
            echo '<p class="error_msg">'.$_GET['venue_name'].' is already booked!</p>';
          }
        }
      ?>
      <div>
        <form action="book-venue-page.php" method="post" id="venue_form">
          <section>
            <div id="d201">
              <dl>
                <dt>Venue</dt>
                <dd>D201</dd>
                <dt>Availability</dt>
                <dd>2 Mikes&comma; 3 Speakers</dd>
                <dt>Capacity</dt>
                <dd>50 &minus; 60</dd>
                <button class="check" onClick="setValues('D201')">Apply</button>
                <a href="booked-venues.php?vn=D201" target="venue_details" class="check">check</a>
              </dl>
            </div>

            <div id="d203">
              <dl>
                <dt>Venue</dt>
                <dd>D203</dd>
                <dt>Availability</dt>
                <dd>1 Mikes&comma; 3 Speakers</dd>
                <dt>Capacity</dt>
                <dd>45 &minus; 50</dd>
                <button class="check" onClick="setValues('D203')">Apply</button>
                <a href="booked-venues.php?vn=D203" target="venue_details" class="check">check</a>
              </dl>
            </div>

            <div id="m502">

              <dl>
                <dt>Venue</dt>
                <dd>M502</dd>
                <dt>Availability</dt>
                <dd>2 Mikes&comma; 5 Speakers</dd>
                <dt>Capacity</dt>
                <dd>70 &minus; 90</dd>
                <button class="check" onClick="setValues('M502')">Apply</button>
                <a href="booked-venues.php?vn=M502" target="venue_details" class="check">check</a>
              </dl>

            </div>

            <div id="m102">

              <dl>
                <dt>Venue</dt>
                <dd>M102</dd>
                <dt>Availability</dt>
                <dd>2 Mikes&comma; 5 Speakers</dd>
                <dt>Capacity</dt>
                <dd>55 &minus; 60</dd>
                <button class="check" onClick="setValues('M102')">Apply</button>
                <a href="booked-venues.php?vn=M102" target="venue_details" class="check">check</a>
              </dl>
            </div>

            <div id="auditorium">
              <dl>
                <dt>Venue</dt>
                <dd>Auditiorium</dd>
                <dt>Availability</dt>
                <dd>2 Mikes&comma; 5 Speakers</dd>
                <dt>Capacity</dt>
                <dd>190 &minus; 200</dd>
                <button class="check" onClick="setValues('Auditorium')">Apply</button>
                <a href="booked-venues.php?vn=Auditorium" target="venue_details" class="check">check</a>
              </dl>

            </div>
          </section>
          <input type="text" name="venue_name" id="venue_name" hidden>
        </form>
      </div>
    </main>

    <script type="text/javascript">
      function setValues(x) {
        document.getElementById("venue_name").value = x;
        alert(document.getElementById("venue_name").value);
      }
    </script>

    <section id="short_links">
      <p id="links_header">Venue List</p>
      <ul>
        <li><a href="#d201" class="links">D201</a></br></li>
        <li><a href="#d203" class="links">D203</a></br></li>
        <li><a href="#m502" class="links">M502</a></br></li>
        <li><a href="#m102" class="links">M102</a></br></li>
        <li><a href="#auditorium" class="links">Auditiorium</a></br></li>
      </ul>
    </section>
    <p class="iframe_title">Check Venue Details</p>
    <iframe src="https://localhost:8080/Venue_Booking/booked-venues.php" id="venue_details" sandbox="allow-scripts">
      <p>Your browser does not supports iframe</p>
    </iframe>
    <style media="screen">
      .iframe_title {
        position: fixed;
        top: 0;
        right: 0;
        margin-top: 60px;
        font-size: 20px;
        font-family: sans-serif;
        background-color: #efefef;
        padding: 9px 60px 9px 58px;
      }
    </style>
  </body>
</html>
