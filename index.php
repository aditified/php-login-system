<?php include("connection.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>

    <form action="" method="post">
        <div class="container">
            <div class="form-box" id="login-box">

                <h2>Register</h2>
                <input type="text" id="login-name" placeholder=" Your Name" name="name">
                <input type="email" id="login-email" placeholder="Email address" name="email" />
                <input type="password" id="login-password" placeholder="Password" name="password" />
                <input type="submit" name="submit" value="REGISTER" id="login-button">

                <p>
                    Already have an account?
                    <a href="login.php">Login</a>
                </p>
            </div>
        </div>
    </form>

    <?php

    if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $error = "";

        // Validation
        if (empty($name)) {
            $error = "Please fill Name";
        } elseif (empty($email)) {
            $error = "Please fill Email";
        } elseif (empty($password)) {
            $error = "Please fill Password";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid Email Format";
        } elseif (!preg_match('/^[A-Za-z0-9._]{6,20}$/', $password)) {
            $error = "Password must be 6-20 characters and only contain letters, numbers, _ and .";
        }

        if ($error == "") {


            $sql = "insert into login(name,email,password)
            values('$name','$email','$password');";
            $data = mysqli_query($conn, $sql);

            if ($data) {
    ?>

                <script type="text/javascript">
                    Swal.fire({
                        icon: 'success',
                        title: 'Registration Successful!',
                        text: 'Welcome <?php echo htmlspecialchars($name); ?>',
                        confirmButtonColor: '#198754'
                    });
                </script>

            <?php
            }
        } else {
            ?>

            <script type="text/javascript">
                Swal.fire({
                    icon: 'error',
                    title: 'Failed!',
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