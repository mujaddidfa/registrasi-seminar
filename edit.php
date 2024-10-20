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
</head>
<body>
    <a href="manage_registration.php">Kembali</a>
    <br>
    <form action="edit.php" method="post">
        <table>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" value="<?php echo $email; ?>" required></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="name" value="<?php echo $name; ?>" required></td>
            </tr>
            <tr>
                <td>Institusi</td>
                <td><input type="text" name="institution" value="<?php echo $institution; ?>" required></td>
            </tr>
            <tr>
                <td>Negara</td>
                <td><input type="text" name="country" value="<?php echo $country; ?>" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="address" value="<?php echo $address; ?>" required></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                <td><input type="submit" name="update" value="Update"></td>
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