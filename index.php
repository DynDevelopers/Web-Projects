<?php
  session_start();
  require 'includes/DB_Operations.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/lrdesign.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/design.css">
    <link rel="stylesheet" href="css/message_box.css">
    <style>
      body {
        
      }
    </style>
    <!-- <link href="https://fonts.googleapis.com/css?family=Francois+One" rel="stylesheet"> -->
  </head>
  <body>
    <nav>
      <?php
        echo '<a class="menu" id="menu_icon" onclick="displayMenu()"><img src="icons/menu_icon.png"></a>';
        if (isset($_SESSION['error']) && $_SESSION['error'] == false) {
          $uname = $_SESSION['firstname']." ".$_SESSION['lastname'];
          echo "<ul class='navbar_ul'>";
            if ($_SESSION['userid'] == 'admin')
              echo "<li class='navbar_li'><a href='admin_page.php' class='navbar_links'><img src='icons/profile.png'> profile</a></li>";
            else
              echo "<li class='navbar_li'><a href='#' class='navbar_links'><img src='icons/profile.png'> profile</a></li>";
            echo "<li class='navbar_li'><a href='includes/values/logout.php' class='navbar_links'><img src='icons/unlock.png'> logout</a></li>";
            echo "<img src='icons/user-icon.png' alt='user icon' style='float: right; margin-right: 6%;'><li class='navbar_li' id='welcome' style='float: right; font-family: sans-serif; font-weight: bold;'><span> Hello, ".ucwords(strtolower($uname))." </span></li>";
          echo "</ul>";
        } else {
          echo '<ul class="navbar_ul">
                  <li class="navbar_li" onclick="displayModal()"><a href="#" class="navbar_links"> <img src="icons/login_button.png" alt="User Login"> login</a></li>
                  <li class="navbar_li"><a href="register.php" class="navbar_links"> <img src="icons/register_button.png" alt="Register Button"> register</a></li>
                  <li class="navbar_li"><a href="admin_page.php" class="navbar_links"> <img src="icons/admin_button.png" alt="Admin"> admin login</a></li>
                  <li class="navbar_li"><a href="#" class="navbar_links"> <img src="icons/about_button.png" alt="About"> about</a></li>
                </ul>';
        }
      ?>

    </nav>

    <div class="start">
      <p id="start_header">Vidyalankar</p>
      <p id="break">Venue Booking System</p>
      <a href="book.php" id="book_venue">Book Venue</a>
    </div>

    <div class="auth-modal" id="modal">
      <img src="icons/close.png" alt="CLOSE" onclick="closeModal()" style="position:fixed; right:5%; top: 2%;">
      <form action="includes/values/UserLogin.php" class="auth-content" method="post">
        <img src='icons/user_login.png'>
        <div class="content-header"><label><b>User Login</b></label></div>
        <div class="auth-info">
          <label for="email">User Id</label><br>
          <input type="text" name="email" id="email" placeholder="Email" required><br>
          <label for="password">Password</label><br>
          <input type="password" name="password" id="pass" placeholder="Password" required><br>
          <button type="submit" name="button" class='loginbtn' onclick="userlogin()">login</button><br>
          <a href="register.php" style="color: white; font-weight: bold;">create an account</a><br>
          <a href="#">forgot password?</a><br>
          <button type="button" class='cancelbtn' onclick="document.getElementsByClassName('auth-modal')[0].style.display = 'none';">Cancel</button>
        </div>
      </form>
    </div>

    <div class="events">
       <!-- DISPLAY ALL EVENTS 1. event name 2. venue name 3. date and time 4. booked by 5. inside tag (event posters images)-->
       <?php
        $db = new DB_Operations();

        $response = json_decode($db->getAllBookedVenues(), TRUE);
        for ($i = 0; $i < sizeof($response); $i++) {
          echo '<div class="venue_card">';
            $uid = $response[$i]['userid'];
            $uname = ucwords($response[$i]['username']);
            $vname = $response[$i]['venue'];
            $bdate = $response[$i]['booking_date'];
            $desc = $response[$i]['description'];
            $status = $response[$i]['status'];
            $slot1 = ($response[$i]['slot1'])?"slot1":"";
            $slot2 = ($response[$i]['slot2'])?"slot2":"";
            $slot3 = ($response[$i]['slot3'])?"slot3":"";

            $img1 = $response[$i]['img1'];
            $img2 = $response[$i]['img2'];
            $img3 = $response[$i]['img3'];
            $img4 = $response[$i]['img4'];

            echo "<div><img src='$img1' alt='Image Not Supported' id='$vname.$i'><div style='width: 100%; opacity: 0.7; text-align: center;' > <input type='radio' name='$vname.$i' onclick=\"nextImage('$vname.$i', '$img1')\" checked> <input type='radio' name='$vname.$i' onclick=\"nextImage('$vname.$i', '$img2')\"> <input type='radio' name='$vname.$i' onclick=\"nextImage('$vname.$i', '$img3')\"> <input type='radio' name='$vname.$i' onclick=\"nextImage('$vname.$i', '$img4')\"></div></div>";
            echo "<p><span class='head'>Venue :</span> $vname</p>";
            echo "<p><span class='head'>Booked By :</span> $uname</p>";
            echo "<p><span class='head'>Booked Date :</span> $bdate</p>";
            echo "<p><span class='head'>Slots : </span>$slot1 $slot2 $slot3</p>"; 
            if ($desc) {
              echo "<dl>
                <dt class='head'>Addition requirements</dt>
                <dd>$desc</dd>
              </dl>";
            }
            echo "<p><span class='head'>status : </span> $status</p>";
          echo '</div>';
        }
       ?>
    </div>

    <div class="message-box">
      <p class="message-text">Message Box</p>
    </div>

    <script type="text/javascript">
      var menu = document.getElementsByClassName("navbar_ul")[0];
      var loginModal = document.getElementsByClassName('auth-modal')[0];
      var modal = document.getElementById("modal");

      function closeModal() {
        modal.style.display = "none";
      }

      function displayModal() {
        loginModal.style.display = "block";
        menu.className = "navbar_ul";
      }

      function displayMenu(){
        if (menu.className == "navbar_ul")
            menu.className = "show";
        else {
          menu.className = "navbar_ul";
        }
      }

      function nextImage(id, image) {
        document.getElementById(id).src = image;
      }
    </script>


    <?php
      if (isset($_SESSION['error']) && $_SESSION['error'] == true) {
        $msg = $_SESSION['message'];
        echo "<script>document.getElementsByClassName('message-text')[0].innerHTML = '$msg'</script>";
        echo "<script>document.getElementsByClassName('message-box')[0].className = 'show-message-box'</script>";
        echo "<script>setTimeout(function () {document.getElementsByClassName('show-message-box')[0].className = 'message-box'}, 5000)</script>";
        session_unset();
      }

      if (isset($_SESSION['error']) && $_SESSION['error'] == false && $_SESSION['message'] != " ") {
        $msg = $_SESSION['message'];
        echo "<script>document.getElementsByClassName('message-text')[0].innerHTML = '$msg'</script>";
        echo "<script>document.getElementsByClassName('message-box')[0].className = 'show-message-box'</script>";
        echo "<script>setTimeout(function () {document.getElementsByClassName('show-message-box')[0].className = 'message-box'}, 5000)</script>";
        $_SESSION['message'] = " ";
      }
    ?>
  </body>
</html>
