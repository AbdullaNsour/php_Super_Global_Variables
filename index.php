<?php
include "./includes/head.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css" rel="stylesheet">
  <link href="./includes/style.css" rel="stylesheet">
  <title>Document</title>
</head>

<body>


  <h1 class="text-center mt-5 ">Hello,There!</h1>
  <p class="text-center mt-2 fs-2 text-muted">Automatic identity verification which enable you to verify you identity</p>

  <div class="main-content">
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <h2 class="mb-5 text-white">Stats Card</h2>
        <div class="header-body">
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Number of Emplyees</h5>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  <span class="text-success mr-2">
                    <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'admin');
                    $query = "SELECT id FROM adminuser ORDER BY id";
                    $query_run = mysqli_query($conn, $query);
                    $row = mysqli_num_rows($query_run);
                    echo '<h2>' . " Number of Employee " . " - " . $row . '</h3>';
                    ?>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Salary</h5>

                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>

                  <span class="text-danger mr-2">
                    <?php

                    $conn = mysqli_connect('localhost', 'root', '', 'admin');
                    $query = "SELECT SUM(salary) FROM adminuser";
                    $query_run = mysqli_query($conn, $query);
                    $row = mysqli_fetch_array($query_run);
                    $salary = $row['SUM(salary)'];
                    echo '<h2>' . " Total of Salary " . " - " . $salary .  '</h2>';
                    ?>
                  </span>

                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Lowest Salary</h5>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span>

                      <?php
                      $conn = mysqli_connect('localhost', 'root', '', 'admin');
                      $query = "SELECT MAX(salary) AS begger FROM adminuser";
                      $query_run = mysqli_query($conn, $query);
                      $row = mysqli_fetch_array($query_run);
                      $salary = $row['begger'];

                      echo '<h2>' . " Minemum Salary " . " - " . $salary .  '</h2>';
                      ?>
                    </span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Highest Salary</h5>
                      <span class="h2 font-weight-bold mb-0">
                        <br>
                        <p class="mt-3 mb-0 text-muted ">
                          <?php
                          $conn = mysqli_connect('localhost', 'root', '', 'admin');
                          $query = "SELECT MIN(salary) FROM adminuser";
                          $query_run = mysqli_query($conn, $query);
                          $row = mysqli_fetch_array($query_run);
                          $salary = $row['MIN(salary)'];

                          echo '<h2>' . " Bigger Salary " . " - " . $salary .  '</h2>';
                          ?>
                        </p>
                      </span>

                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="d-grid gap-2 col-6 mx-auto mt-5 ">
      <a class="btn btn-primary rounded-5 fs-3" href="./login.php">Login</a>
      <a class="btn btn-primary rounded-5 fs-3" href="./register.php" style="background-color:palevioletred">Sign UP</a>
    </div>
    <?php
    include "./includes/footer.php";
    ?>

</body>

</html>