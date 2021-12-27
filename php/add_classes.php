<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Students</title>
  <link rel="stylesheet" href="../css/general.css" />
  <link rel="stylesheet" href="../css/indexstyle.css" />
  <link rel="stylesheet" href="../css/student.css" />

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
            <a class="linked" href="add_students.php">Add Students</a>
          <li>
            <a class="linked" href="add_classes.php">Add Classes</a>
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

  <main>
    <section class="classes-form">
      <form action="" method="post" class="class-entry-form">
        <div class="container">
          <label for="class">Class Name</label>
          <input type="text" name="clnm">

          <label for="class id">Class Id</label>
          <input type="text" name="clid">

          <label for="subject">Subject 1</label>
          <input type="text" name="s1">

          <label for="subject">Subject 2</label>
          <input type="text" name="s2">

          <label for="subject">Subject 3</label>
          <input type="text" name="s3">

          <label for="subject">Subject 4</label>
          <input type="text" name="s4">

          <label for="subject">Subject 5</label>
          <input type="text" name="s5">

          <label for=""></label>
          <input class="submit-btn" type="submit" name="submit" value="Submit">
        </div>
    </section>
  </main>

  </form>
</body>
</html>
<?php 
  include("connect.php");

  if(isset($_POST['submit'])) {
    $clnm=$_POST["clnm"];
    $clid=$_POST["clid"];
    $s1=$_POST["s1"];
    $s2=$_POST["s2"];
    $s3=$_POST["s3"];
    $s4=$_POST["s4"];
    $s5=$_POST["s5"];


    $sql="INSERT INTO `class` (`class_name`, `class_id`,`Subject 1`,`Subject 2`,`Subject 3`,`Subject 4`,`Subject 5`) VALUES ('$clnm', '$clid','$s1','$s2','$s3','$s4','$s5');";

    $query=mysqli_query($conn,$sql);
    if($query) {
      echo "<script type='text/javascript'>alert('Successfully Added')</script>";
    } else {
      echo "<script type='text/javascript'>alert('Error: '.$sql.'<br>'.$conn->error')</script>";
    }
  }
?>