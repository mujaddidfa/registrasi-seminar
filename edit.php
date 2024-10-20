<?php
    include 'connection.php';

    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM registration WHERE id='$id'");
    while ($user_data = mysqli_fetch_array($result)) {
        $email = $user_data['email'];
        $name = $user_data['name'];
        $institution = $user_data['institution'];
        $country = $user_data['country'];
        $address = $user_data['address'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        table {
            margin: auto;
        }
        td {
            padding: 10px;
        }
    </style>
</head>
<body>
    <a href="manage_registration.php" class="btn btn-outline-primary">Kembali</a>
    <br>
    <form action="edit.php" method="post">
        <table>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" id="email" name="email" value="<?php echo $email; ?>" required></td>
            </tr>
            <tr>
                <td><label for="name">Nama</label></td>
                <td><input type="text" id="name" name="name" value="<?php echo $name; ?>" required></td>
            </tr>
            <tr>
                <td><label for="institution">Institusi</label></td>
                <td><input type="text" id="institution" name="institution" value="<?php echo $institution; ?>" required></td>
            </tr>
            <tr>
                <td><label for="country">Negara</label></td>
                <td><input type="text" id="country" name="country" value="<?php echo $country; ?>" required></td>
            </tr>
            <tr>
                <td><label for="address">Alamat</label></td>
                <td><input type="text" id="address" name="address" value="<?php echo $address; ?>" required></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                <td><input type="submit" name="update" value="Update" class="btn btn-primary"></td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $institution = $_POST['institution'];
        $country = $_POST['country'];
        $address = $_POST['address'];

        $check_email_query = "SELECT * FROM registration WHERE is_deleted=0 AND email='$email' AND id != '$id'";
        $check_email_result = mysqli_query($conn, $check_email_query);

        if (mysqli_num_rows($check_email_result) > 0) {
            echo "<script>alert('Email telah terdaftar.'); window.history.back();</script></script>";
            exit();
        } else {
            $result = mysqli_query($conn, "UPDATE registration SET email='$email', name='$name', institution='$institution', country='$country', address='$address' WHERE id=$id");

            mysqli_close($conn);

            header("Location: manage_registration.php");
            exit();
        }
    }
?>