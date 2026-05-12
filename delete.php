<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <?php
    include("connection.php");

    $id = $_GET['id'];

    $delete = "DELETE FROM login WHERE id='$id'";

    $data = mysqli_query($conn, $delete);

    if ($data) {
    ?>

        <script>
            Swal.fire({
                icon: 'success',
                title: 'Deleted Successfully!',
                text: 'User account deleted',
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
                title: 'Delete Failed!',
                text: 'User NOT deleted',
                confirmButtonColor: '#dc3545'
            }).then(() => {

                window.location.href = "view.php";

            });
        </script>

    <?php
    }
    ?>

</body>

</html>