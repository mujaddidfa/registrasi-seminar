<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registrasi Seminar</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<style>
		table {
			margin: auto;
		}
		table tr td {
			padding: 5px;
		}
		table tr td input {
			width: 100%;
		}
		table tr td input[type="submit"] {
			width: 50%;
			margin: auto;
		}
	</style>
</head>
<body>
	<form action="register.php" method="post">
		<table>
			<tr>
				<td><label for="email">Email</label></td>
				<td><input type="email" id="email" name="email" required></td>
			</tr>
			<tr>
				<td><label for="name">Nama</label></td>
				<td><input type="text" id="name" name="name" required></td>
			</tr>
			<tr>
				<td><label for="institution">Institusi</label></td>
				<td><input type="text" id="institution" name="institution" required></td>
			</tr>
			<tr>
				<td><label for="country">Negara</label></td>
				<td><input type="text" id="country" name="country" required></td>
			</tr>
			<tr>
				<td><label for="address">Alamat</label></td>
				<td><input type="text" id="address" name="address" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
	</form>

	<?php
		include 'connection.php';

		if (isset($_POST['submit'])) {
			$email = $_POST['email'];
			$name = $_POST['name'];
			$institution = $_POST['institution'];
			$country = $_POST['country'];
			$address = $_POST['address'];

			$checkEmailQuery = "SELECT * FROM registration WHERE is_deleted=0 AND email='$email'";
			$checkEmailResult = mysqli_query($conn, $checkEmailQuery);

			if (mysqli_num_rows($checkEmailResult) > 0) {
				echo "<script>alert('Email telah terdaftar.')</script>";
				exit();
			} else {
				$sql = "INSERT INTO registration (email, name, institution, country, address) VALUES ('$email', '$name', '$institution', '$country', '$address')";
				$result = mysqli_query($conn, $sql);

				mysqli_close($conn);

				header('Location: index.html');
				exit();
			}
		}
	?>
</body>
</html>