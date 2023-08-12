<?php
include 'dbConfig.php';
if (isset($_POST['registration'])) {
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $pass = $_POST['password'];
    $cpass = $_POST['confirm_pass'];
    $gender = $_POST['gender'];
    if ($name == '' || $email == '' || $pass == '' || $cpass == '' || $gender == '') {
        echo '<div class="alert alert-danger" role="alert">
       All Fields Are Required
     </div>';
    } else {
        $checkUser = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `users` WHERE `user_email`='$email'"));
        if ($checkUser > 0) {
            echo '<div class="alert alert-danger" role="alert">
            Data Already Exist!!
          </div>';
        } else {
            if ($pass == $cpass) {
                $insertSql = "INSERT INTO `users`(`user_name`, `user_email`, `password`,`gender`) VALUES ('$name','$email','$pass','$gender')";
                $result = mysqli_query($conn, $insertSql);
                if ($result) {
                    header('Location:loginPage.php?status=true');
                }
            } else {
                echo '<div class="alert alert-danger" role="alert">
            Password Did not Match
          </div>';
            }
        }
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="bg-dark text-white p-2">
        <h3 class="text-center"> Please Register </h3>
    </div>
    <div class="container mx-auto w-50 mt-3 bg-dark p-4">
        <form class="text-white fw-bold" action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="d-flex justify-content-between">
                <div class="w-100 mx-2">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="user_name" placeholder="Enter Your Name">
                </div>
                <div class="w-100 mx-2">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="user_email" placeholder="Enter Your Email">
                </div>
            </div>
            <div class="d-flex justify-content-between my-5">
                <div class="w-100 mx-2">
                    <label for="exampleInputEmail1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="name" name="password" placeholder="Enter Your Password">
                </div>
                <div class="w-100 mx-2">
                    <label for="exampleInputEmail1" class="form-label">Confirm Pasword</label>
                    <input type="password" class="form-control" id="c_pass" name="confirm_pass" placeholder="Confirm Password">
                </div>
            </div>
            <div class="my-5 w-50">
                <label for="exampleInputEmail1" class="form-label">Gender</label>
                <select class="form-select" aria-label="Default select example" name="gender">
                    <option>Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="tanjim">Tanjim</option>
                </select>
            </div>
            <div class="w-100">
                <button class="btn btn-outline-light btn-lg w-100" type="submit" name="registration">Register</button>
            </div>
            <div class="d-flex">
                <p class="text-white">Already Register?</p><a href="loginPage.php">Please Login</a>
            </div>
    </div>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>