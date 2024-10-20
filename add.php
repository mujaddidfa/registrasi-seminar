<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Peserta</title>
</head>
<body>
	<form action="add.php" method="post">
		<table>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email" required></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="name" required></td>
			</tr>
			<tr>
				<td>Insitusi</td>
				<td><input type="text" name="institution" required></td>
			</tr>
			<tr>
				<td>Negara</td>
				<td><input type="text" name="country" required></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="address" required></td>
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

			$sql = "INSERT INTO registration (email, name, institution, country, address) VALUES ('$email', '$name', '$institution', '$country', '$address')";
			$result = mysqli_query($conn, $sql);

			mysqli_close($conn);

			header('Location: manage_registration.php');
		}
	?>
</body>
</html>