<?php 
  include("connect.php");
  session_start();

  if(isset($_SESSION['use'])) {
    header("Location:panel.php"); 
  }

  if(isset($_POST['login'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if($user == "admin" && $pass == "123") {     
      $_SESSION['use']=$user;
      echo '<script type="text/javascript"> window.open("panel.php","_self");</script>';
    }
    else  {
      echo "Invalid Username or Password";        
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Admin Login</title>
  <link rel="stylesheet" href="../css/general.css" />
  <link rel="stylesheet" href="../css/admin.css" />
  <link rel="stylesheet" href="../css/indexstyle.css" />
  <script src=../js.script.js></script>
</head>
<body>
<header class="header">
    <navbar class="navbar">
      <div class="heading">
        <p>Admin Login Panel</p>
      </div>
      <div class="navigation">
        <ul class="link-list">
          <li>
            <a class="logout-btn" href="../index.php">&larr; Back</a>
          </li>
        </ul>
      </div>
    </navbar>  
  </header>

  <form action="" method="post" class="log-form">
    <div class="container">
      <label for="username">Username</label>
      <input type="text" name="user">
      
      <label for="password">Password</label>
      <input type="password" name="pass">

      <button class="log-btn" type="submit" name="login" value="LOGIN">LOGIN</button>

      <br>
      <h2>Username: admin</h2>
      <h2>Password: 123</h2>
    </div>
  </form>
</body>
</html>