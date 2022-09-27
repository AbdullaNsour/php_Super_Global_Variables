<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "admin";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Super Admin CRUD</title>
    <style>
        .flex{
            display: flex;
            margin: 15px;
            

        }
        .nsour{
            margin-right: 20px;
            padding: 10px;
            font-size: medium;
            border:solid;
            border-radius: 5px;
            
            
        }
        
    </style>
</head>

<body>

    <div class="container mt-4">



        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1> Details for Super Admin
                        <a href="logout.php" class=" btn btn-danger float-end">logout</a>
                            <span class="flex">
                            
                                <p class="nsour ">
                                    <?php
                                    $conn = mysqli_connect('localhost', 'root', '', 'admin');
                                    $query = "SELECT MIN(salary) FROM adminuser";
                                    $query_run = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_array($query_run);
                                    $salary = $row['MIN(salary)'];

                                    echo " Higher Salary " . " - " . $salary ;
                                    ?>
                                </p>
                                <p class="nsour">


                                    <?php
                                    $conn = mysqli_connect('localhost', 'root', '', 'admin');
                                    $query = "SELECT MAX(salary) AS begger FROM adminuser";
                                    $query_run = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_array($query_run);
                                    $salary = $row['begger'];

                                    echo " Min Salary " . " - " . $salary ;
                                    ?>

                                </p>
                                <p class="nsour ">
                                    <?php

                                    $conn = mysqli_connect('localhost', 'root', '', 'admin');
                                    $query = "SELECT SUM(salary) FROM adminuser";
                                    $query_run = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_array($query_run);
                                    $salary = $row['SUM(salary)'];

                                    // print_r($salary);
                                    echo " Total Salary " . " - " . $salary ;
                                    ?>
                                </p>
                                
                                    <p class="nsour ">
                                        <?php
                                        $conn = mysqli_connect('localhost', 'root', '', 'admin');
                                        $query = "SELECT id FROM adminuser ORDER BY id";
                                        $query_run = mysqli_query($conn, $query);
                                        $row = mysqli_num_rows($query_run);
                                        echo " Number of Employee " . " - " . $row ;
                                        ?>
                                    </p>
                                    
                            </span>
                        </h1>
                        

                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>

                                <tr>
                                    <th>ID</th>
                                    <th>first name</th>
                                    <th>middle name</th>
                                    <th>family name</th>
                                    <th>salary</th>
                                    <th>email</th>
                                    <th>date of birth</th>
                                    <th>password</th>
                                    <th>action</th>


                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM adminuser";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $row) {
                                ?>
                                        <tr>
                                            <td><?= $row['id']; ?></td>
                                            <td><?= $row['first_name']; ?></td>
                                            <td><?= $row['middle_name']; ?></td>
                                            <td><?= $row['family_name']; ?></td>
                                            <td><?= $row['salary']; ?></td>
                                            <td><?= $row['email_address']; ?></td>
                                            <td><?= $row['date_of_birth']; ?></td>
                                            <td><?= $row['password']; ?></td>

                                            <td>

                                                <a href="adminEdit.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                <form action="code.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete" value="<?= $row['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                                    <a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>
                                                </form>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<h5> No Record Found </h5>";
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>