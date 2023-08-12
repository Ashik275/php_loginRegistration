<?php
include 'dbConfig.php';
if (isset($_POST['login'])) {
    $email = $_POST['user_email'];
    $pass = $_POST['password'];
    if ($email == '' || $pass == '') {
        echo '<div class="alert alert-danger" role="alert">
       All Fields Are Required
     </div>';
    }else{
        $checkUser = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `users` WHERE `user_email`='$email'"));
        if($checkUser['password']==$pass ){
            session_start();
            $_SESSION['user_name']= $checkUser['user_name'];
           header('Location:users.php');
        }else{
            echo '<div class="alert alert-danger" role="alert">
            Password Did not match
          </div>';
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
    <?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'true') {
            echo '<div class="alert alert-success" role="alert">
                Registration Done Successfully
            </div>';
        }
    }
    ?>
    <div class="bg-dark text-white p-2">
        <h3 class="text-center"> Please Login </h3>
    </div>
    <div class="container mx-auto w-50 mt-3 bg-dark p-4">
        <form class="text-white fw-bold" action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="d-flex justify-content-between">
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
            </div>
            <div class="w-100">
                <button class="btn btn-outline-light btn-lg w-100" name="login">Login</button>
            </div>
            <div class="d-flex">
                <p class="text-white">Don't Have an account?</p><a href="index.php">Please Register</a>
            </div>
    </div>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>