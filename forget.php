<?php
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Forgot Password</title>

    <link rel="stylesheet" href="style.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <form method="post">

        <div class="container">
            <div class="form-box">

                <h2>Reset Password</h2>

                <input type="email"
                    name="email"
                    placeholder="Enter your registered email">

                <input type="password"
                    name="newpassword"
                    placeholder="Enter new password">

                <input type="submit"
                    name="reset"
                    value="RESET PASSWORD"
                    id="login-button">

            </div>
        </div>

    </form>

    <?php

    if (isset($_POST['reset'])) {
        $email = $_POST['email'];
        $newpassword = $_POST['newpassword'];


        $check = "SELECT * FROM login WHERE email='$email'";

        $result = mysqli_query($conn, $check);

        if (mysqli_num_rows($result) > 0) {

            $update = "UPDATE login 
                   SET `password`='$newpassword'    /* used backticks for password because it's a reserved keyword */
                   WHERE email='$email'";

            $data = mysqli_query($conn, $update);

            if ($data) {
    ?>

                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Password Reset Successful!',
                        text: 'Now login with your new password',
                        confirmButtonColor: '#198754'
                    }).then(() => {

                        window.location.href = "login.php";

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
                    text: 'This email is not registered',
                    confirmButtonColor: '#dc3545'
                });
            </script>

    <?php
        }
    }
    ?>

</body>

</html>