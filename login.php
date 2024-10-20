<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        h2 {
            text-align: center;
        }
        form {
            margin: auto;
            width: 50%;
            padding: 10px;
        }
        form div {
            margin-bottom: 10px;
        }
        form div label {
            display: block;
        }
        form div input {
            width: 100%;
            padding: 5px;
        }
        form div button {
            padding: 5px;
        }
    </style>
</head>
<body>
    <h2>Login</h2>
    <form action="login.php" method="post">
        <div>
            <label for="username" class="form-label">Username:</label>
            <input type="text" id="username" name="username" class="form-control" required>
        </div>
        <div>
            <label for="password" class="form-label">Password:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username == "admin" && $password == "admin") {
            header("Location: manage_registration.php");
        } else {
            echo "<script>alert('Username atau password salah!');</script>";
        }
    }
    ?>
</body>
</html>