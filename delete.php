<?php
    include 'connection.php';

    $id = $_GET['id'];
    $result = mysqli_query($conn, "UPDATE registration SET is_deleted=1 WHERE id='$id'");
    header("Location:manage_registration.php");
?>