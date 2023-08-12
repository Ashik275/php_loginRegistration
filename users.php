<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'dbConfig.php';
                $sql = mysqli_query($conn, "SELECT * FROM `users`");
                $id = 1;
                while ($row = mysqli_fetch_assoc($sql)) {
                ?>
                    <tr class="table-primary">
                        <th scope="row"><?php echo $id++; ?></th>
                        <td><?php echo $row['user_name']; ?></td>
                        <td><?php echo $row['user_email']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="w-100">
            <button class="btn btn-danger btn-lg w-100" name="login">Logout</button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>