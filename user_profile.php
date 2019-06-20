<?php
  require 'includes/DB_Operations.php';

  $uname = $_SESSION['firstname']." ".$_SESSION['lastname'];
  $uid = $_SESSION['userid'];
  echo "<ul class='navbar_ul'>
          <li class='navbar_li'><a href='index.php' class='navbar_links'>Home</a></li>
          <li class='navbar_li'><a href='includes/values/logout.php' class='navbar_links'>logout</a></li>
          <li class='navbar_li' id='welcome'><span>Hello, $uname</span></li>
        </ul>";

  $db = new DB_Operations();
  $response = $db->getVenueByUserId($uid);

  //DISPLAY ALL VENUE BOOKED BY THE USER.
?>
