<?php include("connection.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container my-5">

        <table class="table table-hover  table-striped">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">READ</li>
                    <li class="breadcrumb-item"><a href="index.php">Register</a></li>
                    <li class="breadcrumb-item"><a href="login.php">Login</a></li>
                </ol>
            </nav>
            <tr>
                <th>name</th>
                <th>email</th>
                <th>password</th>
                <th>operation</th>
            </tr>

            <?php

            $sql = "select * from login;";
            $data = mysqli_query($conn, $sql);
            $result = mysqli_num_rows($data);

            if ($result) {
                while ($row = mysqli_fetch_array($data)) {
            ?>

                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><a class="btn btn-primary btn-sm" href="update.php?id=<?php echo $row['id']; ?>">update</a>
                            <a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $row['id']; ?>">delete</a>
                        </td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <td>no record found</td>
            <?php
            }
            ?>
        </table>

    </div>


</body>

</html>