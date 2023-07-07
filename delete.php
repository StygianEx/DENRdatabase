<?php
    include 'connection.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM `201` WHERE id = $id";
    $result = mysqli_query($connection,$sql);

    if ($result) {
        header("Location: index.php?msg=Record deleted successfully");
    }
    else {
        echo "Failed: " . mysqli_error($connection);
    }
?>