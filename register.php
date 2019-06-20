<?php $resp = isset($_GET['res'])?json_decode($_GET['res']):'none' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/navbar.css">
    <!-- <link rel="stylesheet" href="css/error_design.css"> -->
    <link rel="stylesheet" href="css/message_box.css">
    <style media="screen">

      body  {
        background-size: cover;
        font-family: sans-serif;
      }

      .register {
        border: 2px solid black;
        position: absolute;
        width: 85%;
        background-color: rgba(230, 230, 230, 0.2);
        box-shadow: -5px -5px 15px grey;
        font-family: sans-serif;
        margin: 20% 0 10% 6%;
      }

      body div form input {
        padding: 2%;
        margin-bottom: 16px;
        margin-left: 10%;
      }

      body div form label {
        margin-left: 5%;
      }

      body div form button {
        width: 30%;
        padding: 5px;
        margin: 0 0 5% 35%;
        border-radius: 15px;
        color: white;
        border: 1px solid white;
        background: linear-gradient(-90deg, #d1f3ff, #05bee8, #05bee8, #d1f3ff);
        background-size: 350px;
        animation: animate 5s linear infinite alternate;
      }

      body div form div.header {
        border: none;
        font-size: 36px;
        margin: 5% 0 10% -10%;
        text-align: center;
        font-family: sans-serif;
        font-weight: bold;
        color: #49cce6;
        text-shadow: 4px 4px 2px #0288b8;
        letter-spacing: 3px;
      }

      #gotosigin {
        margin-bottom: 10%;
        border: none;
        font-family: sans-serif;

      }
      a {
        text-decoration: none;
      }

      .writeableinput {
        width: 75%;
        border-style: ridge;
      }

      form div label {
        color: white;
        text-shadow: 2px 2px 2px black;

      }
      ul li a:hover {
        color: white;
      }

      @keyframes animate {
        0% {
          background-position: 0%;
        }

        100% {
          background-position: 200%;
        }
      }

      @media only screen and (min-width: 650px) {
        form body {
          height: 100%;
        }

        .register {
          width: 40%;
          margin-left: 30%;
          margin-top: 8%

        }

        .writeableinput {
          font-size: 16px;
        }

        body div form input {
          border: 1px solid black;
        }

        body div form button {
          width: 20%;
          padding: 1.5% 0 1.5% 0;
          margin-left: 40%;
          font-size: 16px;
        }
      }
    </style>
    <title>User Register</title>
  </head>
  <body>

    <nav>
      <a class="menu" id="menu_icon" onclick="displayMenu()"><img src='icons/menu_icon.png'></a>
      <ul class="navbar_ul">
        <li class="navbar_li"> <a href="index.php" class="navbar_links"> <img src="icons/home_icon.png" alt="Home"> Home</a></li>
        <li class="navbar_li"><a href="#" class="navbar_links"> <img src="icons/about_button.png" alt="About"> about</a></li>
      </ul>
    </nav>

    <div class="register">
      <p class="error_message"></p>
      <form class="auth-content" action="includes/values/UserRegister.php" method="post">
        <div class="header"> <img src="icons/register_icon.png" alt="Register Icon"> Register</div>
        <input type="text" name="fname" placeholder="First Name" style="margin-top: 2%;" class="writeableinput" required><br>
        <input type="text" name="lname" placeholder="Last Name" class="writeableinput" required><br>


        <label for="gender">Gender</label> <br>
        <input type="radio" name="gender" value="male" checked required> male <br>
        <input type="radio" name="gender" value="female" required> female <br>
        <input type="radio" name="gender" value="other" required> other <br>


        <label for="dept">Department :</label>
        <select class="dept" name="dept" required>
          <option value="IT">IT</option>
          <option value="BIO">BIO</option>
          <option value="ETRX">ETRX</option>
          <option value="COMS">COMS</option>
        </select><br> <br>

        <input type="password" name="pass" placeholder="Password" class="writeableinput" required> <br>
        <input type="email" name="email" id="myemail" placeholder="Email" class="writeableinput" required><br>

        <button type="submit" name="button" onclick="checkMail()">Sign Up</button> <br>

        <div id='gotosigin'>
          <label for="login">Already Registered?</label> <a href="index.php" id="login"> click here</a>
        </div>
      </form>
      </div>

    <div class="message-box">
      <p class="message-text"></p>
    </div>

    <script type="text/javascript">
      var res = '<?php echo $resp; unset($_GET['res'])?>';
      if (res != 'none') {
        var emsg = document.getElementsByClassName("message-text")[0].innerHTML = res;
        document.getElementsByClassName('message-box')[0].className = "show-message-box";
        setTimeout(function () {document.getElementsByClassName('show-message-box')[0].className = "message-box";}, 5000);
        setTimeout(function () {window.location.assign ("http://localhost:8080/MiniProject/register.php");}, 5000);
      }

      var menu = document.getElementsByClassName("navbar_ul")[0];
      function displayMenu(){
        if (menu.className == "navbar_ul")
            menu.className = "show";
        else {
          menu.className = "navbar_ul";
        }
      }

      function setMessage(msg) {
        var emsg = document.getElementsByClassName("message-text")[0];
        emsg.innerHTML = msg;
        document.getElementsByClassName('message-box')[0].className = "show-message-box";
        setTimeout(function () {document.getElementsByClassName('show-message-box')[0].className = "message-box";}, 5000);
      }

      function checkMail() {
        var email = document.getElementById('myemail');

        var atpos = x.indexOf("@");
        var dotpos = x.lastIndexOf(".");
        if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
            alert("Not a valid e-mail address");
            return false;
        }
      }
    </script>
  </body>
</html>
