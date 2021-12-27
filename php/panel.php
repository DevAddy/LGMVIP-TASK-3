<?php 
  session_start();
  if(!isset($_SESSION['use']))  {
      header("Location:Login.php");  
  }
  $_SESSION['use'];
  echo "<script type='text/javascript'>console.log('Login Success');</script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Admin Panel</title>
  <link rel="stylesheet" href="../css/general.css" />
  <link rel="stylesheet" href="../css/indexstyle.css" />
</head>
<body>
  <header class="header">
    <navbar class="navbar">
      <div class="heading">
        <p>Admin Panel</p>
      </div>
      <div class="navigation">
        <ul class="link-list">
          <li>
            <a class="linked" href="add_classes.php">Add Classes</a>
          </li>
          <li>
            <a class="linked" href="add_students.php">Add Students</a>
          </li>
          <li>
            <a class="linked" href="add_results.php">Add Results</a>
          </li>
          <li>
            <a class="logout-btn" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </navbar>  
  </header>
</body>
</html>