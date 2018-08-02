<?php
  session_start();
  if(isset($_SESSION['login']) && $_SESSION['login'] == true) {
    if($_SESSION['type'] != 'admin') {
      header("Location:index.php?login=adminerror");
    }
  } else {
    header("Location:index.php?login=false");
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Add Users</title>
  </head>
  <link rel="stylesheet" type="text/css" href="web_style/nav-style.css">
  <body>
    <header>
      <nav>
        <a href="index.php">Home</a>
        <a href="admin-page.php">Profile</a>
        <?php echo "<p><strong> Welcome </strong> ".$_SESSION['username']."</p>"?>
      </nav>
    </header>

    <?php
      if(isset($_GET['user'])) {
        if($_GET['user'] == 'success') {
          echo "<p id='success' class='showerror'>User Added Successfully</p>";
        } else if($_GET['user'] == 'unsuccess') {
          echo "<p class='showerror'>Unable to add user!</p>";
        }
      }
      if(isset($_GET['error'])) {
        if($_GET['error'] == 'empty') {
          echo '<p class="showerror">Fill all the details!</p>';
        } else if($_GET['error'] == 'invalid') {
          echo '<p class="showerror">Invalid Email Address!</p>';
        }
      }
    ?>
    <form action="includes/add-user.php" method="post">
      <h2>Add User</h2>

      <?php
        if(isset($_GET['uid'])) {
          $uid = $_GET['uid'];
          echo "<p>User Id :</p><input type='text' placeholder='User Id' name='user_id' value='$uid'>";
        } else {
          echo "<p>User Id :</p><input type='text' placeholder='User Id' name='user_id'>";
        }

        if(isset($_GET['uname'])) {
          $uname = $_GET['uname'];
          echo "<p>Username :</p><input type='text' placeholder='Username' name='username' value='$uname'>";
        } else {
          echo "<p>Username :</p><input type='text' placeholder='Username' name='username'>";
        }

        echo "<p>Password :</p><input type='password' placeholder='Password' name='password'>";

        if(isset($_GET['uemail'])) {
          $uemail = $_GET['uemail'];
          echo "<p>Email :</p><input type='text' placeholder='Email' name='email' value='$uemail'>";
        } else {
          echo "<p>Email :</p><input type='text' placeholder='Email' name='email'>";
        }

        if(isset($_GET['udept'])) {
          $udept = $_GET['udept'];
          echo "<p>Department :</p><input type='text' placeholder='Department' name='dept' value='$udept'>";
        } else {
          echo "<p>Department :</p><input type='text' placeholder='Department' name='dept'><br>";
        }
      ?>
      <button type="submit">Submit</button>
    </form>

    <style type="text/css">
      body form h2 {
        text-align: center;
        font-family: sans-serif;
        font-size: 35px;
        font-weight: 300;
        color: #379;
      }
      body form {
          border: 1px solid red;
          margin-left: 25%;
          margin-right: 25%;
          padding: 30px;
          margin-top: 5%;
      }
      form p {
        font-family: cursive;
        font-size: 20px;
      }

      form input {
        margin-left: 30px;
        height: 25px;
        width: 200px;
      }

      form button {
        margin-top: 5%;
        margin-left: 40%;
        width: 100px;
        height: 30px;
        background-color: transparent;
        border: 1px solid #379;
        color: #379;

      }

      form button:hover {
        border-width: medium;
        font-weight: bold;
      }

      #email {
        width: 250px;
      }

      header nav a {
        text-decoration: none;
        color: white;
        padding: 35px;
        font-family: sans-serif;
        font-size: 20px;
      }

      header nav p {
        float: right;
        color: white;
        font-family: sans-serif;
        margin-right: 5%;
        margin-top: 3px;
        font-size: 20px;
      }

      header nav a:hover {
        background-color: #006984;
      }


      #success {
        text-align: center;
        color: green;
      }

      .showerror {
        text-align: center;
        color: red;
      }
    </style>
  </body>
</html>
