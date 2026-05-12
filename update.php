<?php include("connection.php");
$id = $_GET['id'];
$select = "select * from login where id='$id';";
$data = mysqli_query($conn, $select);
$row = mysqli_fetch_array($data);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <form action="" method="post">
        <div class="container">
            <div class="form-box" id="login-box">
                <h2>Update form</h2>
                <input value="<?php echo $row['name']; ?>" type="text" id="login-name" placeholder=" Your Name" name="name">
                <input value="<?php echo $row['email']; ?>" type="email" id="login-email" placeholder="Email address" name="email" />
                <input value="<?php echo $row['password']; ?>" type="password" id="login-password" placeholder="Password" name="password" />
                <input type="submit" name="submit" value="Update" id="login-button">


            </div>
        </div>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];


        $error = "";

        // Validation
        if (empty($name)) {
            $error = "Please fill Name";
        } elseif (empty($email)) {
            $error = "Please fill Email";
        } elseif (empty($password)) {
            $error = "Please fill Password";
        } elseif (!preg_match('/^[A-Za-z0-9._]{6,20}$/', $password)) {
            $error = "Password must be 6-20 characters and only contain letters, numbers, _ and .";
        }
        if ($error == "") {
            $sql = "UPDATE login 
                    SET name='$name', email='$email', `password`='$password'
                    WHERE id='$id'";
            $data = mysqli_query($conn, $sql);
            if ($data &&  !empty($email) && !empty($password) && !empty($name)) {
    ?>

                <script type="text/javascript">
                    Swal.fire({
                        icon: 'success',
                        title: 'UPDATED Successful!',
                        text: 'User details updated successfully',
                        confirmButtonColor: '#198754'
                    }).then(() => {

                        window.location.href = "view.php";

                    });
                </script>

            <?php
            }
        } else {
            ?>

            <script type="text/javascript">
                Swal.fire({
                    icon: 'error',
                    title: 'updatation failed! TRY AGAIN',
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