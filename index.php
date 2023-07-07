<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
    crossorigin="anonymous">
    <!-- Bootstrap -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font Awesome -->

    <!-- Table CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <!-- Table CSS -->

    <title>Personnel Section</title>
    <link rel="icon" href="https://mimaropa.denr.gov.ph/images/2020/denrlogo.png">
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-1 mb-5 text-bg-success p-7" 
    style="background-color: #00ff5573;">
        201 Data
    </nav>

    <div class="container">
        <!-- Notification Message -->
        <?php
            if (isset($_GET['msg'])){
                $msg = $_GET['msg'];
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                '.$msg.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';

            //   header("refresh: 1; url = http://localhost:3000/index.php");
            }
        ?>
        <!-- Notification Message -->
        
        <a href="add.php" class="btn btn-dark mb-3">Add Employee</a>

        <table id="example" class="table table-striped" style="width:100%">
        <thead class="table-dark">
            <tr>
                <th>TIN</th>
                <th>Division</th>
                <th>Name</th>
                <th>File</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include 'connection.php';
                $sql = "SELECT * FROM `201`";
                $result = mysqli_query($connection,$sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['tin'] ?></td>
                        <td><?php echo $row['division'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td>
                            <a href="files/<?php echo $row["file"] ?>"><?php echo $row["file"] ?></a>
                        </td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                            <a href="delete.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>

    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
    crossorigin="anonymous"></script>
    <!-- Bootstrap -->

    <!-- Table Script -->
    <script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script defer src="script.js"></script>
    <!-- Table Script -->
</body>
</html>