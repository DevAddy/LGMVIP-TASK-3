<?php 
  include("connect.php");

  if(isset($_POST['submit'])) {
    $name=$_POST["sname"];
    $roll=$_POST["sroll"];
    $dob=$_POST["sdob"];
    $cl=$_POST["class"];

    $sql="INSERT INTO `student` (`name`,`roll`,`dob`,`class_name`) VALUES ('$name',$roll,'$dob','$cl')";

    $query=mysqli_query($conn,$sql);
    if($query) {
      echo "<script type='text/javascript'>alert('Successfully Added')</script>";
    } else {
      echo "<script type='text/javascript'>alert('Error: '.$sql.'<br>'.$conn->error')</script>";
    }
  }

  $stmt=$conn->prepare("SELECT `class_name` FROM `class`");
  $stmt->execute();
  $result=$stmt->get_result();
  
?>
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

  <main>
    <section class="student-form">
      <form action="" method="post" class="student-entry-form">
        <div class="container">
          <label for="Name">Student Name</label>
          <input type="text" name="sname">

          <label for="Roll Number">Roll Number</label>
          <input type="text" name="sroll">

          <label for="class">Class Name</label>
          <select name="class">
            <option selected="selected">Choose Class</option>
            <?php
              while ($row=$result->fetch_assoc()) {
                echo $row['class_name'];
                foreach($row as $val) {
                  echo "<option value='$val'>$val</option>";
                }
              }
            ?>
          </select>

          <label for="date">Date</label>
          <input type="date" name="sdob">

          <label for="submit"></label>
          <input class="submit-btn" type="submit" name="submit" value="Submit">
        </div>
      </form>
    </section>
  </main>
</body>
</html>