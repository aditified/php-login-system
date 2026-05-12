<?php include("connection.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <form action="" method="post">
        <div class="container">
            <div class="form-box" id="login-box">

                <h2>LOGIN</h2>
                <input type="email" id="login-email" placeholder="Email address" name="email" />
                <input type="password" id="login-password" placeholder="Password" name="password" />
                <input type="submit" name="submit" value="LOGIN" id="login-button">
                <p>
                    <a href="forget.php">Forget Your Password?</a>
                </p>
                <p>
                    Don't have an account?
                    <a href="index.php">Register</a>
                </p>
            </div>
        </div>
    </form>
    <?php
    if (isset($_POST['submit'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];
        $error = "";

        // Validation
        if (empty($email)) {
            $error = "Please enter Email";
        } elseif (empty($password)) {
            $error = "Please enter Password";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid Email Format";
        } elseif (!preg_match('/^[A-Za-z0-9._]{6,20}$/', $password)) {
            $error = "Password must be 6-20 characters and only contain letters, numbers, _ and .";
        }

        if ($error == "") {

            // Simple Query
            $sql = "SELECT * FROM login WHERE email='$email'";
            $result = mysqli_query($conn, $sql);

            // Check if Email Exists
            if (mysqli_num_rows($result) > 0) {

                // Fetch User Data
                $row = mysqli_fetch_assoc($result);

                // Verify Password
                if ($password == $row['password']) {
    ?>
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Login Successful!',
                            text: 'Welcome <?php echo $row['name']; ?>',
                            confirmButtonColor: '#198754'
                        }).then(() => {
                            window.location.href = "view.php";
                        });
                    </script>
                <?php
                } else {
                ?>
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Wrong Password!',
                            text: 'Please try again',
                            confirmButtonColor: '#dc3545'
                        });
                    </script>
                <?php
                }
            } else {
                ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Email Not Found!',
                        text: 'Please register first',
                        confirmButtonColor: '#dc3545'
                    });
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Login Failed!',
                    text: '<?php echo $error; ?>',
                    confirmButtonColor: '#dc3545'
                });
            </script>
    <?php
        }
    }
    ?>
</body>

</html>