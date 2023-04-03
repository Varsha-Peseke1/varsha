<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA_Compatible" content="IE-edge"> 
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <link rel="stylesheet" href="main.css" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <title>Registration</title>
    </head>
    <body>
        <table class="table">
        <div class="center">
            <h1>Registration</h1>
            <form action="register.php" method="POST">
                <label for="username">Username:</label>
                <input type="text" name="username" class='form-control' required/>
                <label for="email">Email Address:</label>
                <input type="email" name="email" class='form-control' required/>
                <label for="password">Password:</label>
                <input type="password" name="password" class='form-control' required/>
                <input type="submit" name="register" value="Register">
                <a href="login.php">Login Here</a>
            </form>
        </div>
        <?php
        include ('connect.php');
        if(isset($_POST['register'])){
            $username=$_POST['username'];
            $email=$_POST['email'];
            $password=$_POST['password'];

            $select = "SELECT * FROM users WHERE email ='$email'";
            $result = mysqli_query($conn, $select);

            if(mysqli_num_rows($result)>0){
                echo "<srcipt type='text/javascript'>";
                echo "Email has already taken!";

                //echo "window.location.href='register.php'";
                echo "</script>";
            }else{
                $register = "INSERT INTO users (username, email, password, status) VALUES ('$username', '$email', '$password', 'pending')";
                mysqli_query($conn, $register);
                echo "<srcipt type='text/javascript'>";
                echo "alert('Your account is now pending for approval!')";
                echo "window.location.href='register.php'";
                echo "</script>";
            }
        }
        ?>
    </body>

</html>
