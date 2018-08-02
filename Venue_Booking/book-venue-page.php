  <?php
  session_start();
  if(!isset($_SESSION['login']) && $_SESSION['login'] == false) {
    header("Location:index.php?login=false");
    exit();
  }

  if (!isset($_POST['venue_name'])) {
    header("Location:index.php?venue_name=notset");
    exit();
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Venue Booking</title>
  </head>

  <link rel="stylesheet" type="text/css" href="web_style/nav-style.css">
  <link rel="stylesheet" type="text/css" href="web_style/book-venue-page-style.css">

  <body>
    <header>
      <nav>
        <a href="index.php">Home</a>
        <a href="user-profile.php">Profile</a>
        <a href="includes/logout.php">logout</a>
        <?php echo "<p><strong> Welcome </strong> ".$_SESSION['username']."</p>" ?>
      </nav>
    </header>

    <section>
      <article>
        <h2>Venue Booking</h2>
        <form action="includes/insert-booking-values.php" method="post">
          <?php
            echo "<p>Username : <h3 id='uname'>".$_SESSION['username']."</h3>";
            echo "<p>Venue : <h3 id='vname'>".$_POST['venue_name']."</h3>";
          ?>
          <p>Start Time :</p><input type="time" name="start_time_h" min="1" max="12" placeholder="hrs" class="values first"> :
          <input type="time" name="start_time_m" min="00" max="59" placeholder="min" class="values">
          <p>End Time :</p><input type="time" name="end_time_h" min="1" max="12" placeholder="hrs" class="values first"> :
          <input type="time" name="end_time_m" min="1" max="59" placeholder="hrs" class="values">
          <p>Date :</p><input type="date" min="1" max="31" name="day" class="values first" placeholder="Day"> /
          <input type="month" min="1" max="12" name="month" class="values" placeholder="Month"> /
          <input type="year" min="2017" max="2050" name="year" class="values" placeholder="Year"><br>
          <button name="submit" onClick="setValues()">Submit</button>
          <input name="username" id="username" hidden>
          <input name="venue_name" id="venue_name" hidden>
        </form>
      </article>

      <script type="text/javascript">
        function setValues() {
          document.getElementById("username").value = document.getElementById("uname").innerHTML;
          document.getElementById("venue_name").value = document.getElementById("vname").innerHTML;

          alert(document.getElementById("username").value);
          alert(document.getElementById("venue_name").value);

        }
      </script>
    </section>
  </body>
</html>
