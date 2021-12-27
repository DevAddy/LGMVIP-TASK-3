<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Student Result Management System</title>
    <link rel="stylesheet" href="css/general.css" />
    <link rel="stylesheet" href="css/indexstyle.css" />
    <link rel="stylesheet" href="css/student.css" />
    <link rel="stylesheet" href="css/homestyle.css">
  </head>
  <body>
    <header class="header">
      <navbar class="navbar">
        <div class="heading">
          <p>Student Result Management System</p>
        </div>
        <div class="navigation">
          <ul class="link-list">
            <li>
              <a class="linked" href="php/adminLogin.php">Admin Login</a>
            </li>
            <li>
              <a class="linked" href="php/view_results.php">Check Results</a>
            </li>
          </ul>
        </div>
      </navbar>
    </header>

    <main>
      <h1 class="head">List of Students</h1>
      <?php 
        include "php/connect.php";

        $sql="SELECT * FROM `student` WHERE 1";
        $result=mysqli_query($conn,$sql);

      ?>
      <section class="data">
        <div class="data-container">
          <table class="data-table">
            <tr class="row">
              <th>Name</th>
              <th>Roll Number</th>
              <th>Date of Birth</th>
              <th>Class Name</th>
            </tr>
              <?php 
                if($result->num_rows>0) {
                  while($row=$result->fetch_assoc()) {
                    $n=$row['name'];
                    $r=$row['roll'];
                    $d=$row['dob'];
                    $c=$row['class_name'];
              ?>
              <?php
              echo "<tr><td>".$n;"</td>";
              echo "<td>".$r;"</td>";
              echo "<td>".$d;"</td>";
              echo "<td>".$c;"</td></tr>";
              ?>
              <?php }
                }
              ?>
          </table>
        </div>
      </section>
    </main>
  </body>
</html>
