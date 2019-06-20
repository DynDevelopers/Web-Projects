
<?php
  session_start();
  require 'includes/DB_Operations.php';
  if (isset($_SESSION['userid']) && $_SESSION['userid'] != 'admin') {
    header("Location:index.php");
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Page</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/table.css">

    <style media="screen">

      .events {
        margin-top: 12%;
      }
      form {
        margin-bottom: 10%;
      }

    </style>
  </head>
  <body>
    <nav>
      <?php
        echo '<a class="menu" id="menu_icon" onclick="displayMenu()"><img src="icons/menu_icon.png"></a>';
        if (isset($_SESSION['userid']) && $_SESSION['userid'] == 'admin') {
          echo '<ul class="navbar_ul">
                  <li class="navbar_li"><a href="index.php" class="navbar_links"> <img src="icons/home_icon.png" alt="home"> home</a></li>
                  <li class="navbar_li"><a href="manage_users.php" class="navbar_links"> <img src="icons/register_button.png" alt="Register Button"> registered</a></li>
                  <li class="navbar_li"><a href="includes/values/logout.php" class="navbar_links"> <img src="icons/unlock.png" alt="Contact"> logout</a></li>
                  <li class="navbar_li"><a href="#" class="navbar_links"> <img src="icons/about_button.png" alt="About"> about</a></li>
                </ul>';
        } else {
          echo '<ul class="navbar_ul">
                  <li class="navbar_li"><a href="index.php" class="navbar_links"> <img src="icons/home_icon.png" alt="home"> home</a></li>
                  <li class="navbar_li"><a href="#" class="navbar_links"> <img src="icons/about_button.png" alt="About"> about</a></li>
                </ul>';
        }
        ?>

    </nav>

    <?php
      if (isset($_SESSION['userid']) && $_SESSION['userid'] == 'admin') {
        $db = new DB_Operations();
        $response = $db->getAllUnConfirmedVenue();
        $response = json_decode($response, true);

        echo "<div class='events'>";

        for ($i = 0; $i < sizeof($response); $i++) {
          $userid = $response[$i]['userid'];
          $email = $response[$i]['email'];
          $username = $response[$i]['username'];
          $vname = $response[$i]['venue'];
          $bdate = $response[$i]['booking_date'];
          $desc = $response[$i]['description'];
          $status = $response[$i]['status'];
          $slot1 = ($response[$i]['slot1'])?"slot1":" ";
          $slot2 = ($response[$i]['slot2'])?"slot2":" ";
          $slot3 = ($response[$i]['slot3'])?"slot3":" ";
          $ts = $response[$i]['timestamp'];

          $img1 = $response[$i]['img1'];
          $img2 = $response[$i]['img2'];
          $img3 = $response[$i]['img3'];
          $img4 = $response[$i]['img4'];


          echo "<div class='venue_card'>";
              echo "<div><img src='$img1' alt='Image Not Supported' id='$vname'><div style='width: 100%; opacity: 0.7; text-align: center;' > <input type='radio' name='$vname' onclick=\"nextImage('$vname', '$img1')\" checked> <input type='radio' name='$vname' onclick=\"nextImage('$vname', '$img2')\"> <input type='radio' name='$vname' onclick=\"nextImage('$vname', '$img3')\"> <input type='radio' name='$vname' onclick=\"nextImage('$vname', '$img4')\"></div></div>";
              echo "<p><span class='head'>Booked By :</span> $username</p>";
              echo "<p><span class='head'>Venue :</span> $vname</p>";
              echo "<p><span class='head'>Booking Date :</span> $bdate</p>";
              echo "<p><span class='head'>Slots :</span> $slot1 $slot2 $slot3</p>";
              if ($desc) {
                echo "<dl>
                        <dt class='head'>Addition requirements</dt>
                        <dd>$desc</dd>
                      </dl>";
              }

              echo "<p><span class='head'>Booked On :</span> $ts</p>";
              echo "<p><span class='head'>Status :</span> $status</p>";
              $slot1 = ($response[$i]['slot1'])?"slot1":"empty";
              $slot2 = ($response[$i]['slot2'])?"slot2":"empty";
              $slot3 = ($response[$i]['slot3'])?"slot3":"empty";
              echo "<button id='accept' class='ar' onclick=\"decision('accept', '$userid', '$email', '$vname', '$bdate', '$slot1', '$slot2', '$slot3')\" name='accept'>accept</button><button onclick=\"decision('reject', '$userid', '$email', '$vname', '$bdate', '$slot1', '$slot2', '$slot3')\" id='reject' name='reject' class='ar'>reject</button>";
          echo '</div>';

        }
        $db->closeDBObject();
      } else {

        echo "<form id='admin-login' action='includes/values/AdminOperations.php' method='post'>";
        echo "<span><img src='icons/admin-icon.png' text='Hello'> Admin Login</span><br>";
        echo "<label for=''>admin id</label><br>
              <input type='text' name='username' id='uname' required><br>
              <label for='password'>password</label><br>
              <input type='password' name='password' id='password' required><br>
              <button type='submit' name='submit'> submit</button>";
        echo "</form>";
      }
     ?>

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

       function decision(value, userid, email, venue, bdate, slot1, slot2, slot3) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if(this.readyState == 4 && this.status == 200) {
              location.reload();
              alert(this.responseText);
          }
          
        };
        xhttp.open("POST", "includes/values/AdminOperations.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("value="+value+"&userid="+userid+"&email="+email+"&venue="+venue+"&bdate="+bdate+"&slot1="+slot1+"&slot2="+slot2+"&slot3="+slot3);
       }

       function nextImage(id, image) {
         document.getElementById(id).src = image;
       }
     </script>
  </body>
</html>
