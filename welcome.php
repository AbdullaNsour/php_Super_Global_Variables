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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Admin CRUD</title>
</head>

<body>

    <div class="container mt-4">



        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Users Details
                        <a href="logout.php" class="btn btn-danger float-end">logout</a>
                        </h4>
                        

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
                                    <!-- <th>action</th> -->


                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                // where  type ='user'
                                $query = "SELECT * FROM adminuser ";
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

                                            
                                            <!-- <td>
                                                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                <form action="code.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete" value="<?= $row['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td> -->
                                         

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