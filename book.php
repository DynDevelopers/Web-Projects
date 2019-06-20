<?php
  session_start();
  $session_value = (isset($_SESSION['error']))?$_SESSION['error']:"notset";
  $data_inserted = (isset($_GET['res']))?json_decode($_GET['res'], true)['message']:" ";
  require 'includes/DB_Operations.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Book Venue</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/calendar.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/lrdesign.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/message_box.css">
    
    <style>
      .venue-div {
        margin: 28% 5% 10% 5%;
        font-family: sans-serif;
      }

      .venue-div .venue_card button {
        font-family: sans-serif;
        text-decoration: none;
        border-radius: 26px;
        padding: 1% 4% 1% 4%;
        border: 0px;
        color: white;
        font-weight: bold;
        background: linear-gradient(to top right, #ffffcc 0%, #0099cc 100%);
        margin-left: 5%;
      }

      .content {
        height: 90%;
        margin-top: 5%;
        font-weight: lighter;
      }

      .content .infoBook button {
        font-weight: bold;
        padding: 5% 20% 5% 10%;
        border-radius: 20px;
        color: white;
        background: linear-gradient(to top right, #000066 0%, #00ffcc 100%);

      }

      .venue-div .venue_card img {
        width: 100%;
        padding-left: 0;
      }
      
      @media only screen and (min-width: 600px) {
        .venue-div {
          margin: 10% 26% 10% 26%;
        }

        .venue-div .venue_card button {
          border-radius: 26px;
          padding: 1% 3% 1% 3%;
          font-size: 16px;
        }
        .venue-div .venue_card img {
          width: 100%;
          padding-left: 0;
          height:5%;
        }
      }

    </style>
  </head>
  <body>
    <nav>
      <?php
        echo '<a class="menu" id="menu_icon" onclick="displayMenu()"><img src="icons/menu_icon.png"></a>';
        if (isset($_SESSION['error']) && $_SESSION['error'] == false) {
          $uname = $_SESSION['firstname']." ".$_SESSION['lastname'];
          echo "<ul class='navbar_ul'>
                  <li class='navbar_li'><a href='index.php' class='navbar_links'><img src='icons/home_icon.png' alt='icon not supported'> home</a></li>
                  <li class='navbar_li'><a href='includes/values/logout.php' class='navbar_links'><img src='icons/unlock.png'> logout</a></li>
                  <img src='icons/user-icon.png' alt='user icon' style='float: right; margin-right: 6%;'><li class='navbar_li' id='welcome' style='float: right; font-family: sans-serif; font-weight: bold;'><span> Hello, ".ucwords($uname)."</span></li>
                </ul>";
        } else {
          echo '<ul class="navbar_ul">
                  <li class="navbar_li"><a href="index.php" class="navbar_links"><img src="icons/home_icon.png" alt="icon not supported"> home</a></li>
                  <li class="navbar_li" onclick="displayModal()"><a href="#" class="navbar_links"> <img src="icons/login_button.png" alt="User Login"> login</a></li>
                  <li class="navbar_li"><a href="register.php" class="navbar_links"> <img src="icons/register_button.png" alt="Register Button"> register</a></li>
                  <li class="navbar_li"><a href="admin_page.php" class="navbar_links"> <img src="icons/admin_button.png" alt="Admin"> admin login</a></li>
                  <li class="navbar_li"><a href="#" class="navbar_links"> <img src="icons/about_button.png" alt="About"> about</a></li>
                </ul>';
        }
       ?>
    </nav>
    <div class="venue-div">
      <!--design for venue book-->
      <?php
        $db = new DB_Operations();
        $response = $db->getVenue();
        $response = json_decode($response, true);

        for ($i = 0; $i < sizeof($response); $i++) {
          echo '<div class="venue_card">';

            $vname = $response[$i]['vname'];
            $capacity = $response[$i]['capacity'];
            $desc = $response[$i]['desc'];
            $img1 = $response[$i]['img1'];
            $img2 = $response[$i]['img2'];
            $img3 = $response[$i]['img3'];
            $img4 = $response[$i]['img4'];

            echo "<div><img src='$img1' alt='Image Not Supported' id='$vname'><div style='width: 100%; opacity: 0.7; text-align: center;' > <input type='radio' name='$vname' onclick=\"nextImage('$vname', '$img1')\" checked> <input type='radio' name='$vname' onclick=\"nextImage('$vname', '$img2')\"> <input type='radio' name='$vname' onclick=\"nextImage('$vname', '$img3')\"> <input type='radio' name='$vname' onclick=\"nextImage('$vname', '$img4')\"></div></div>";
            echo "<p><span class='head'>Venue :</span> $vname</p>";
            echo "<p><span class='head'>Capacity :</span> $capacity</p>";
            echo "<dl>
                    <dt class='head'>Description</dt>
                    <dd>$desc</dd>
                  </dl>";
            echo "<button onclick=\"displayBookingModal('$vname')\">apply</button>";
          echo '</div>';
        }
      ?>

      <script type="text/javascript">
        function openBookingModal(vname) {
          var name = vname;
          document.getElementById('uid').innerHTML = "Hello World";
        }
      </script>
    </div>

    <div class="auth-modal" id="modalbook">
      <img src='icons/close.png' alt='CLOSE' onclick='closeModalBook()' style='position:fixed; right:5%; top: 10%;'>
      <form action="includes/values/InsertBookings.php" method="post" class="auth-content content">
        <h2>Venue Booking</h2>
        <div class="auth-info infoBook">
        <label for="uid">User Id</label><br>
          <?php
          if (isset($_SESSION['userid'])) {
            $uid = $_SESSION['userid'];
            echo "<input type='text' name='uid' class='uid' value='$uid' disabled><br>";
          }
          else {
            echo "<input type='text' name='uid' class='uid' value='none' disabled><br>";
          }

          ?>

          <label for="vname">Venue</label><br>
          <input type="text" name="vname" id="vname" class="inputs" required><br>
          
          <label for="year">Select month for booking</label><br>
          <select name="year" id="year">
            <?php
              $current_year = (int) date("Y");

              for ($i = 0; $i < 10; $i++) {
                echo "<option value='$current_year'>$current_year</options>" ;
                $current_year++;
              }
            ?>
          </select> <br>

          <label for="month">Select year for booking</label><br>
          <select name="month" id="month">
            <option value="January">January</option>
            <option value="February">February</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
          </select> <br>
   
          <label for="stime" onclick="showDateModal()" >Select Slot</label><br>
          <p id="summarySlot"></p>
          <input type="hidden" name="selected_slots" id="selectedSlot">

          <label for="etime">Additional Requirements</label><br>
          <textarea type="" name="desc" placeholder="Leave empty if not required." style="width: 100%; font-size: 16px;"></textarea></br></br>

          <button type="submit" name="submit">Done</button>
        </div>
      </form>

    </div>
    
    <div class="container-bg">
        <div class="container">
            <span class="title">Choose Slots(slot1: 10:00am to 12:00 pm slot2: 12:15 pm to 2:30pm slot3: 2:30pm to5:30pm)</span>
            <button onclick="hideDateModal()">done</button>
            <table class="calendar">
              
                <tr class="header">
                    <td class="days" style="background-color: #ff5a44; color:white;">Sun</td>
                    <td class="days" style="background-color: #ff5a44; color:white;">Mon</td>
                    <td class="days" style="background-color: #ff5a44; color:white;">Tue</td>
                    <td class="days" style="background-color: #ff5a44; color:white;">Wed</td>
                    <td class="days" style="background-color: #ff5a44; color:white;">Thurs</td>
                    <td class="days" style="background-color: #ff5a44; color:white;">Fri</td>
                    <td class="days" style="background-color: #ff5a44; color:white;">Sat</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="auth-modal" id="modal">
      <img src="icons/close.png" alt="CLOSE" onclick="closeModal()" style="position:fixed; right:5%; top: 2%;">
      <form action="includes/values/UserLogin.php" class="auth-content" method="post">
        <img src='icons/user_login.png' >
        <div class="content-header"><label><b>User Login</b></label></div>
        <div class="auth-info">
          <label for="userid">User Id</label><br>
          <input type="text" name="email" id="email" placeholder="Email" required><br>
          <label for="password">Password</label><br>
          <input type="password" name="password" id="pass" placeholder="Password" required><br>
          <button type="submit" name="button" class='loginbtn'>login</button><br>
          <a href="register.php" style="color: #67cfff;">create an account</a><br>
          <a href="#">forgot password?</a><br>
          <button type="button" class='cancelbtn' onclick="document.getElementsByClassName('auth-modal')[0].style.display = 'none';">Cancel</button>
        </div>
      </form>
    </div>

    <div class="message-box">
      <p class="message-text"></p>
    </div>
    <script src="javascript/calendar.js"></script>
    <script type="text/javascript">

      var err_msg = '<?php echo $data_inserted;?>';
      if (err_msg != " ") {
        setError(err_msg);
      }

      var menu = document.getElementsByClassName("navbar_ul")[0];
      var loginModal = document.getElementsByClassName('auth-modal')[1];
      var modal = document.getElementById("modal");

      var bookModal = document.getElementById('modalbook');
      var modalbook = document.getElementById("modalbook");

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

      function displayBookingModal(vname) {
        var error = '<?php echo $session_value; ?>';
        if (error == 'notset') {
          setError('You must Login first');
        } else {
          bookModal.style.display = "block";
          menu.className = "navbar_ul";
          document.getElementById('vname').value = vname;
          document.getElementById('vname').disabled = true;
        }
      }

      function nextImage(id, image) {
        document.getElementById(id).src = image;
      }

      function closeModalBook() {
        modalbook.style.display = "none";
      }

      function setError(msg) {
        var emsg = document.getElementsByClassName("message-text")[0];
        emsg.innerHTML = msg;
        document.getElementsByClassName('message-box')[0].className = "show-message-box";
        setTimeout(function () {document.getElementsByClassName('show-message-box')[0].className = "message-box";}, 5000);
      }
    </script>
  </body>
</html>
