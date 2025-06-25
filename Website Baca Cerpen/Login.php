<?php
ob_start();
include 'service/db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <title>Login Page</title>
</head>

<body style="background-image: url(./img/bg.png)">
    <br>
    <div class="container mt-5 justify-content-center" style="max-width: 900px; border: 1px solid #ccc; padding: 20px; border-radius: 10px; background-color:rgb(77, 138, 198);">
        <center>
            <h2>Login</h2>
        </center>
        <?php
        // Initialize variables
        session_start();
        $username = $password = "";
        $loginError = "";

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = trim($_POST["username"]);
            $password = trim($_POST["password"]);
            $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $result = $conn->query($sql);
            // Simple validation (you can enhance this)
            if (empty($username) || empty($password)) {
                $loginError = "Username and Password are required.";
            } else {
                if ($result->num_rows > 0) {
                    // User exists, redirect to dashboard
                    $data = $result->fetch_assoc();
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['is_login'] = true;
                    header("Location: ./Admin/dashboard.php");
                    exit();
                } else {
                    $loginError = "Invalid Username or Password.";
                }
            }
        }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <?php if (!empty($loginError)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $loginError; ?>
                </div>
            <?php endif; ?>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required value="<?php echo htmlspecialchars($username); ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <span id="togglePassword" style="cursor: pointer; color: blue; text-decoration: underline; float: right;">Show Password</span>
            </div>
            <button type="submit" class="btn btn-primary justify-content-end">Login</button>
        </form>
    </div>
    <br>
    <div>
        <p class="text-center text-dark">Kembali ke <a href="index.php" class="text-dark">Beranda</a></p>
    </div>

    <script>
        // JavaScript to toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordField = document.getElementById('password');
            const isPasswordVisible = passwordField.type === 'text';
            passwordField.type = isPasswordVisible ? 'password' : 'text'; // Toggle password visibility
            this.textContent = isPasswordVisible ? 'Show Password' : 'Hide Password'; // Change text
        });
    </script>
</body>

</html>