<?php
session_start();
require 'db/db_connection.php';
require 'login.php';
// IF USER LOGGED IN
if(isset($_SESSION['user_email'])){
    header('Location: home.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - </title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <form action=" " method="POST">
        <h2>User Login</h2>

        <div class="container">
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter email" id="email" name="user_email" require>

            <label for="Password"><b>Password</b></label>
            <input type="Password" placeholder="Enter Password" id="password" name="user_password" require>

            <button type="submit"> Login </button>
        </div>
        <?php
        if(isset($success_message)){
            echo '<div class="error_message">'.$success_message.'</div>';
        }
        if(isset($error_message)){
            echo '<div class="error_message">'.$error_message.'</div>';
        }
        ?>
        <div class="container" style="background-color: #845">
            <a href="signup.php"><button type="button" class="Regbtn">Create an account</button></a>
        </div>
    </form>

</body>

</html>