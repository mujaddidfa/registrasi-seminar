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
</head>
<body>
    <table border="1">
        <a href="index.php">Kembali</a>
        <a href="add.php">Tambah Peserta</a>
        <tr>
            <th>Email</th>
            <th>Nama</th>
            <th>Institusi</th>
            <th>Negara</th>
            <th>Alamat</th>
            <th>Action</th>
        </tr>
        <?php
            while ($user_data = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>".$user_data['email']."</td>";
                echo "<td>".$user_data['name']."</td>";
                echo "<td>".$user_data['institution']."</td>";
                echo "<td>".$user_data['country']."</td>";
                echo "<td>".$user_data['address']."</td>";
                echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";
            }
        ?>
</body>
</html>