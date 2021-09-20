<?php
session_start();
require 'db/db_connection.php';
require 'insert_user.php';
//if user logged in
if(isset($_SESSION['user_email'])){
    header('Location:home.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <form action="signup.php" method="POST">
        <h2>Create an account</h2>

        <div class=container>
            <label for="Username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" id="username" name="username" require>

            <label for="Username"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" id="user_email" name="user_email" require>

            <label for="Username"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" id="user_password" name="user_password" require>

            <button type="submit">Sign Up</button>
        </div>

        <?php
if(isset($success_message)){
    echo '<div class= "success_message">'.$success_message.'</div>';
}
if(isset($error_message)){
    echo '<div class="error_message">'.$error_message.'</div>';
}
?>
        <div class="container" style="background-color: 2fa">
            <a href="index.php"><button type="button" class="Regbtn">Login</button></a>
        </div>
    </form>
</body>

</html>