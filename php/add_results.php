<?php 
  include("connect.php");

  if(isset($_POST['submit'])) {
    $sname=$_POST['sname'];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Results</title>
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
    <section class="result-form">
      <form action="" method="post" class="result-entry-form">
        <div class="container">
          <label for="Student Name">Student Name</label>
          <select name="sname">
            <option selected="selected">Student Name</option>
            <?php
              $stmt=$conn->prepare("SELECT `name` FROM `student`");
              $stmt->execute();
              $result=$stmt->get_result();
              while($row=$result->fetch_assoc()) {
                foreach($row as $val) {
                  echo "<option value='$val'>$val</option>";
                }
              }
            ?>
          </select>
          <label for=""></label>
          <input class="submit-btn" type="submit" value="Submit" name="submit">
        </div>
      </form>

      <form action="" method="post" class="result-entry-form">
      <?php
        if(isset($_POST['submit'])) {
      ?>
        <div class="container">
          <label for="sname">Student Name</label>

          <?php 
            $sql="SELECT `name` FROM `student` WHERE `student`.`name`='$sname'";
            $result=mysqli_query($conn,$sql);

            while($row=$result->fetch_assoc()) {
              $n = $row['name'];
          ?>
          <input type="text" name="sname" value="<?php echo $n; ?>" readonly>
          <?php  } ?>

          <label for="roll">Roll Number</label>
          <?php
            $sql="SELECT `roll` FROM `student` WHERE `student`.`name`='$sname'";
            $result=mysqli_query($conn,$sql);
        
            while($row=$result->fetch_assoc()) {
          ?>
        
          <input type="text" name="sroll" value=<?php echo $row['roll']; } ?> readonly>

          <label for="class">Class</label>
          <?php 
            $sql="SELECT `class_name` FROM `student` WHERE `student`.`name`='$sname'";
            $result=mysqli_query($conn,$sql);
        
            while($row=$result->fetch_assoc()) {
              $c=$row['class_name'];
          ?>
        
          <input type="text" name="clanm" value=<?php echo $c; } ?> readonly>
        </div>

      <div class="marks-table">
          <label for="subject">Subject 1</label>
          <?php
            $sql="SELECT `Subject 1` FROM `class` WHERE `class`.`class_name`='$c'";
            $result=mysqli_query($conn,$sql);

            // echo "ERROR: ".$sql."<br>".$conn->error;
        
            while($row=$result->fetch_assoc()) {
              $s1=$row['Subject 1'];
          ?>
        
          <input type="text" name="s1" value=<?php echo $s1; } ?> readonly>
          <label for="marks">Marks</label>
          <input type="text" name="m1">

          <label for="subject">Subject 2</label>
          <?php
            $sql="SELECT `Subject 2` FROM `class` WHERE `class`.`class_name`='$c'";
            $result=mysqli_query($conn,$sql);

            // echo "ERROR: ".$sql."<br>".$conn->error;
        
            while($row=$result->fetch_assoc()) {
              $s2=$row['Subject 2'];
          ?>
        
          <input type="text" name="s2" value=<?php echo $s2; } ?> readonly>
          <label for="marks">Marks</label>
          <input type="text" name="m2">

          <label for="subject">Subject 3</label>
          <?php
            $sql="SELECT `Subject 3` FROM `class` WHERE `class`.`class_name`='$c'";
            $result=mysqli_query($conn,$sql);

            // echo "ERROR: ".$sql."<br>".$conn->error;
        
            while($row=$result->fetch_assoc()) {
              $s3=$row['Subject 3'];
          ?>
        
          <input type="text" name="s3" value=<?php echo $s3; } ?> readonly>
          <label for="marks">Marks</label>
          <input type="text" name="m3">

          <label for="subject">Subject 4</label>
          <?php
            $sql="SELECT `Subject 4` FROM `class` WHERE `class`.`class_name`='$c'";
            $result=mysqli_query($conn,$sql);

            // echo "ERROR: ".$sql."<br>".$conn->error;
        
            while($row=$result->fetch_assoc()) {
              $s4=$row['Subject 4'];
          ?>
        
          <input type="text" name="s4" value=<?php echo $s4; } ?> readonly>
          <label for="marks">Marks</label>
          <input type="text" name="m4">

          <label for="subject">Subject 5</label>
          <?php
            $sql="SELECT `Subject 5` FROM `class` WHERE `class`.`class_name`='$c'";
            $result=mysqli_query($conn,$sql);

            // echo "ERROR: ".$sql."<br>".$conn->error;
        
            while($row=$result->fetch_assoc()) {
              $s5=$row['Subject 5'];
          ?>
        
          <input type="text" name="s5" value=<?php echo $s5; } ?> readonly>
          <label for="marks">Marks</label>
          <input type="text" name="m5">

          <label for=""></label>
          <input class="submit-btn" type='submit' name='sub' value='Submit'>
        </form>
      </div>

    <?php } ?>
    </section>
  </main>
  <?php
      if(isset($_POST['sub'])) {
        $sname=$_POST['sname'];
        $sroll=$_POST['sroll'];
        $clanm=$_POST['clanm'];
        $s1=$_POST['s1'];
        $m1=$_POST['m1'];
        $s2=$_POST['s2'];
        $m2=$_POST['m2'];
        $s3=$_POST['s3'];
        $m3=$_POST['m3'];
        $s4=$_POST['s4'];
        $m4=$_POST['m4'];
        $s5=$_POST['s5'];
        $m5=$_POST['m5'];

        $sql="INSERT INTO `result` (`name`, `roll`, `class_name`, `S1`, `M1`, `S2`, `M2`, `S3`, `M3`, `S4`, `M4`, `S5`, `M5`) VALUES ('$sname','$sroll','$clanm','$s1','$m1','$s2','$m2','$s3','$m3','$s4','$m4','$s5','$m5');";
      
        $query=mysqli_query($conn,$sql) or die(mysqli_error($conn));
        echo $query;
        if($query) {
          echo "<script type='text/javascript'>alert('Successfully added')</script>";
        } else {
          echo "<script type='text/javascript'>alert('Error: '.$sql.'<br>'.$conn->error')</script>";
        }
      }
      ?>
  </form>
</body>
</html>