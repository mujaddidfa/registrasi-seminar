<?php
    include 'connection.php';
    $result = mysqli_query($conn, "SELECT * FROM registration WHERE is_deleted=0");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .table {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <table class="table">
        <a href="index.html" class="btn btn-primary">Kembali</a>
        <a href="add.php" class="btn btn-success">Tambah Peserta</a>
        <tr>
            <th class="table-primary">Email</th>
            <th class="table-primary">Nama</th>
            <th class="table-primary">Institusi</th>
            <th class="table-primary">Negara</th>
            <th class="table-primary">Alamat</th>
            <th class="table-primary">Action</th>
        </tr>
        <?php
            while ($user_data = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>".$user_data['email']."</td>";
                echo "<td>".$user_data['name']."</td>";
                echo "<td>".$user_data['institution']."</td>";
                echo "<td>".$user_data['country']."</td>";
                echo "<td>".$user_data['address']."</td>";
                echo "<td><a href='edit.php?id=$user_data[id]' class='btn btn-outline-primary'>Edit</a> | <a href='delete.php?id=$user_data[id]' class='btn btn-danger'>Delete</a></td></tr>";
            }
        ?>
</body>
</html>