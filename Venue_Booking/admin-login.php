<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Admin Login</title>
    
  </head>
  <link href="web_style/admin-login-style.css" type="text/css" rel="stylesheet">
  <link href="web_style/nav-style.css" type="text/css" rel="stylesheet">
  <body>
    <header>
      <nav>
        <?php
          if(isset($_SESSION['login']) && $_SESSION['login'] == true) {
            if($_SESSION['type'] == 'user') {
              header("Location:index.php");
            } else if($_SESSION['type'] == 'admin') {
              header("Location:admin-page.php");
            }
          } else {
            echo '<a href="index.php">Home</a>';
          }
        ?>
      </nav>
    </header><br><br><br>

    <main>
      <div>
        <h1>Admin Login</h1>
        <?php
          if(isset($_GET['login'])) {
            if($_GET['login'] == 'unsuccessfull') {
              echo "<p>Incorrect username or password!</p>";
            }
          }
        ?>
        <form action="includes/user_login.inc.php?type=admin" method="post">
          <input type="text" placeholder="Admin Id" name="user_id"></br>
          <input type="password" placeholder="Password" name="user_pass"></br>
          <button type="submit" name="submit">Submit</button>
        </form>
      </div>
    </main>
  </body>
</html>
