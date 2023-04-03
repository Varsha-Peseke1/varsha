<?php
session_start();
include 'connect.php';
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA_Compatible" content="IE-edge"> 
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <link rel="stylesheet" href="main.css" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <title>Login</title>
    </head>
    <body>
    <div class="center">
            <h1>Login</h1>
            <form action="update.php" method="POST">
                <label for="email">Email Address:</label>
                    <input type="email" name="email" required/><br>
                <label for="password">Password:</label>
                    <input type="password" name="password" required/><br>
                    <input type="submit" name="login" value="Login"><br>
                    <a href="register.php">Register Here</a>
            </form>
        </div>
        <?php
            if(isset($_POST['login'])){
                $email=$_POST['email'];
                $password=$_POST['password'];

                $select=mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
                $row=mysqli_fetch_array($select);

                $status=$row['status'];

                $select2=mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
                $check_user=mysqli_num_rows($select2);

                if($check_user==1){
                    $_session["status"]=$row['status'];
                    $_session["email"]=$row['email'];
                    $_session["password"]=$row['password'];

                    if($status=="approved"){
                        echo '<srcipt type="text/javascript">';
                        echo 'alert("Login Success!")';
                        echo 'window.location.href="user-dashboard.php"';
                        echo '</script>';
                    }
                    elseif($status=="pending"){
                        echo '<srcipt type="text/javascript">';
                        echo 'alert("Your account is still pending for approval!")';
                        echo 'window.location.href="login.php"';
                        echo '</script>';
                    }else{
                        echo "Incorrect email or password!";
                    }
                }
            }
        ?>


    </body>
</html>
