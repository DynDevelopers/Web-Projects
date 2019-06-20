<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/navbar.css">
    <title></title>
    <style media="screen">
      table {
        border: 1px solid gray;
        border-collapse: collapse;
        margin-top: 30%;
        margin-left: 5%;
        margin-right: 5%;
        background: linear-gradient(to top left, #ffffff -13%, #000000 81%);
        opacity: 0.8;
      }

      table tr td {
        border-bottom: 2px solid white;
      }

      table tr td p {
        color: white;
        font-family: sans-serif;
        margin-left: 2%;
        font-size: 1.05em;
      }

      @media only screen and (min-width: 600px) {
        table {
          margin-left: 25%;
          margin-top: 10%;
          width: 50%;
        }
      }
    </style>
  </head>
  <body>
    <nav>
      <?php
        session_start();
        if (isset($_SESSION['userid']) && $_SESSION['userid'] == 'admin') {
          echo '<a class="menu" id="menu_icon" onclick="displayMenu()"><img src="icons/menu_icon.png"></a>';
          echo "<ul class='navbar_ul'>";
          echo '<li class="navbar_li"> <a href="index.php" class="navbar_links"> <img src="icons/home_icon.png" alt="Home"> Home</a></li>';
          echo "<li class='navbar_li'><a href='admin_page.php' class='navbar_links'><img src='icons/profile.png'> profile</a></li>";
          echo "<li class='navbar_li'><a href='includes/values/logout.php' class='navbar_links'><img src='icons/unlock.png'> logout</a></li>";
          echo "<img src='icons/user-icon.png' alt='user icon' style='float: right; margin-right: 6%;'><li class='navbar_li' id='welcome' style='float: right; font-family: sans-serif; font-weight: bold;'><span> Hello, ".ucwords(strtolower($_SESSION['userid']))." </span></li>";
          echo '<li class="navbar_li"><a href="#" class="navbar_links"> <img src="icons/about_button.png" alt="About"> about</a></li>';
          echo "<ul>";
        } else {
          header("Location:index.php");
          die();
        }
      ?>
    </nav>
    <?php
      require "includes/DB_Operations.php";

      $db = new DB_Operations();
      $users = $db->getAllUsers();

      $users = json_decode($users, true);

      echo "<table>";
      if (sizeof($users) != 0) {
        for ($i = 0; $i < sizeof($users); $i++) {
          echo "<tr>";
          echo "<td><p><strong>Username :</strong>".$users[$i]['username']."</p>";
          echo "<p><strong>User Id :</strong>".$users[$i]['userid']."</p>";
          echo "<p><strong>Department :</strong>".$users[$i]['dept']."</p>";
          echo "<p><strong>Email :</strong>".$users[$i]['email']."</p></td>";
          $userid = $users[$i]['userid'];
          echo "<td><a href='includes/values/remove.php?user=$userid'><img src='icons/remove.png'></a></td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td><p>0 users registered.</p></tr></td>";
      }
      
      echo "</table>";
    ?>
    <script type="text/javascript">
      var menu = document.getElementsByClassName("navbar_ul")[0];
      function displayMenu(){
        if (menu.className == "navbar_ul")
            menu.className = "show";
        else {
          menu.className = "navbar_ul";
        }
      }

    </script>
  </body>
</html>
