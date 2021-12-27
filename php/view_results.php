<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>View Results</title>
  <link rel="stylesheet" href="../css/general.css" />
  <link rel="stylesheet" href="../css/indexstyle.css" />
  <link rel="stylesheet" href="../css/student.css" />
  <link rel="stylesheet" href="../css/report.css" />
  <link rel="stylesheet" href="../css/admin.css" />

</head>
<body>
<header class="header">
    <navbar class="navbar">
      <div class="heading">
        <p>Results</p>
      </div>
      <div class="navigation">
        <ul class="link-list">
          <li>
            <a class="logout-btn" href="../index.php">Back</a>
          </li>
        </ul>
      </div>
    </navbar>  
  </header>

  <main>
    <section class="view-result-form">
      <form action="" method="post">
        <div class="container">
          <label for="sname">Student Name</label>
          <input type="text" name="sname">

          <label for="sroll">Roll Number</label>
          <input type="text" name="sroll">

          <label for=""></label>
          <input class="submit-btn" type="submit" name="submit" value="Submit"> 
        </div>
      </form>
    </section>

    <?php 
  $pdo = require("connect.php");

  if(isset($_POST['submit'])) {
    $n=$_POST['sname'];
    $r=$_POST['sroll'];

    $sql="SELECT * FROM `result` WHERE `name`='$n' and `roll`='$r'";

    $result=mysqli_query($conn,$sql);
    if($result) {
      while($row=mysqli_fetch_array($result)) {
        $n = $row['name']."<br>";
        $r = $row['roll']."<br>";
        $c = $row['class_name']."<br>";
        $s1 = $row['S1']."<br>";
        $m1 = $row['M1']."<br>";
        $s2 = $row['S2']."<br>";
        $m2 = $row['M2']."<br>";
        $s3 = $row['S3']."<br>";
        $m3 = $row['M3']."<br>";
        $s4 = $row['S4']."<br>";
        $m4 = $row['M4']."<br>";
        $s5 = $row['S5']."<br>";
        $m5 = $row['M5']."<br>";
      }
    }
    else {
      echo "Error: ".$sql."<br>".$conn->error;
    }
?>

    <section class="view-results">
      <table class="report-card">
        <tr class="row">
          <th>Student Name</th>
          <td><?php echo $n;?></td>
        </tr>
        <tr class="row">
          <th>Roll Number</th>
          <td><?php echo $r;?></td>
        </tr>
        <tr class="row">
          <th>Class</th>
          <td><?php echo $c;?></td>
        </tr>
        <tr class="row">
          <th>Subject</th>
          <th>Marks</th>
        </tr>
        <tr class="row">
          <td><?php echo $s1; ?></td>
          <td><?php echo $m1; ?></td>
        </tr>
        <tr class="row">
          <td><?php echo $s2; ?></td>
          <td><?php echo $m2; ?></td>
        </tr>
        <tr class="row">
          <td><?php echo $s3; ?></td>
          <td><?php echo $m3; ?></td>
        </tr>
        <tr class="row">
          <td><?php echo $s4; ?></td>
          <td><?php echo $m4; ?></td>
        </tr>
        <tr class="row">
          <td><?php echo $s5; ?></td>
          <td><?php echo $m5; ?></td>
        </tr>
        <tr class="row">
          <td>Total Marks</td>
          <td>
            <?php
              $total=(int)$m1+(int)$m2+(int)$m3+(int)$m4+(int)$m5;
              echo $total."/"."500";
            ?>
          </td>
        </tr>
        <tr class="row">
          <td>Percentage</td>
          <td>
            <?php
              $per=(float)(($total/500)*100);
              echo $per."%";
            ?>
          </td>
        </tr>
        <tr>
          <td colspan="2" style="text-align: center;">
            <button class="print-btn" type="print" onClick="window.print()">Print</button>
          </td>
        </tr>
      </table>
      <?php  } ?>
    </section>
  </main>
</body>
</html>