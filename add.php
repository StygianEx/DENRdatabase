<?php
    include 'connection.php';

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $tin = $_POST['tin'];
        $division = $_POST['division'];
        $name = $_POST['name'];
        // $file = $_POST['file'];

        if ($_FILES['file']['error']) {
            // header("Location: add.php?msg=File does not exist");
            echo
            "<script>
                alert('File Does Not Exist');
            </script>";
        }
        else {
            $fileName = $_FILES['file']['name'];
            $tmpName = $_FILES['file']['tmp_name'];

            $destination = 'files/'. $fileName;

            $validFileExtension = ['doc', 'docx', 'xls', 'xlsx', 'pdf', 'csv'];
            $fileExtension = explode('.' , $fileName);
            $fileExtension = strtolower(end($fileExtension));

            if (!in_array($fileExtension, $validFileExtension)) {
                echo
                "<script>
                    alert('Invalid File Extension');
                </script>";
            }
            else {
                move_uploaded_file($tmpName, $destination);
                // $sql = "INSERT INTO `table_201`(`id`, `division`, `name`, `file`) 
                // VALUES ('$id','$division','$name','$fileName')";
                $sql = "INSERT INTO `201`(`id`, `tin`, `division`, `name`, `file`) 
                VALUES ('$id','$tin','$division','$name','$fileName')";
                mysqli_query($connection,$sql);

                header("Location: index.php?msg=New record created successfully");
            }
        }

        // $sql = "INSERT INTO `table_201`(`id`, `division`, `name`, `file`) 
        // VALUES ('$id','$division','$name','$file')";

        // $result = mysqli_query($connection, $sql);

        // if ($result) {
        //     header("Location: index.php?msg=New record created successfully");
        // }
        // else {
        //     echo "Failed: " . mysqli_error($connection);
        // }
    }
?>

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

    <title>Personnel Section</title>
    <link rel="icon" href="https://mimaropa.denr.gov.ph/images/2020/denrlogo.png">
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-1 mb-5 text-bg-success p-7" 
    style="background-color: #00ff5573;">
        201 Data
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Add New User</h3>
            <p class="text-muted">Complete the form below to add a new user</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" enctype="multipart/form-data" style="width: 50vw; min-width: 300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">TIN</label>
                        <input type="text" name="tin" class="form-control" placeholder="TIN" pattern="[0-9\-]+" required>
                    </div>

                    <div class="col">
                        <label class="form-label">Division</label>
                        <input type="text" name="division" class="form-control" placeholder="Division" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                    </div>

                    <div class="col">
                        <label class="form-label">File</label>
                        <input type="file" name="file" class="form-control" multiple>
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Save</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
    crossorigin="anonymous"></script>
    <!-- Bootstrap -->
</body>
</html>