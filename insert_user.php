<?php
require 'db/db_connection.php';

if(isset($_POST['username']) && isset($_POST['user_email']) && isset($_POST['user_password'])){
    
    // CHECK IF FIELDS ARE NOT EMPTY
if(!empty(trim($_POST['username'])) && !empty(trim($_POST['user_email'])) && !empty($_POST['user_password'])){

    // Escape Special Characters.
    $username = mysqli_real_escape_string($db_connection, htmlspecialchars($_POST['username']));
    $user_email = mysqli_real_escape_string($db_connection, htmlspecialchars($_POST['user_email']));
    
    // If Email is Valid
    if(filter_var($user_email, FILTER_VALIDATE_EMAIL)){
        
        //CHECK IF EMAIL IS ALREADY REGISTERED
        $check_email = mysqli_query($db_connection, "SELECT `user_email` FROM  `users` WHERE user_email ='$user_email'");
    
        if(mysqli_num_rows($check_email) > 0){
            $error_message = " This email address is already registered. Please try another.";
        }
        else{
            // if email is not registered
                $options = [
                    'cost' => 12,
                ];
            
            $user_hash_password = password_hash($_POST['user_password'], PASSWORD_BCRYPT, $options);

            //inser user into the database
            $insert_user = mysqli_query($db_connection, "INSERT INTO `users` (username, user_email, user_password) VALUES ('$username', '$user_email', '$user_hash_password')");

            if($insert_user === TRUE){
                $success_message = "Thanks! You have successfully signed up.";
            }
            else{
                $error_message = "Oops! something wrong.";
            }
        }
    }
    else{
        // if email is invalid
        $error_message = "Invalid email address";
    }      
    }
    else{
    $error_message = "PLlease fill in all the reqired fields";
    }
}




?>