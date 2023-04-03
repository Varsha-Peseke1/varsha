<?php 

 require_once 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
    if($_POST){

            include 'connect.php';


        $name= $_POST['name'];
        $role = $_POST['role'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $dateofbirth = $_POST['dateofbirth'];
        $profilepicture = $_POST['profilepicture'];
        $signature = $_POST['signature'];

         $query = "INSERT INTO details SET name=:name, role=:role, mobile=:mobile, email=:email, address=:address, gender=:gender, dateofbirth=:dateofbirth, profilepicture=:profilepicture, signature=:signature";
    
        // prepare query for execution
        $stmt = $conn->prepare($query);
        echo "it is a login credentials";
        
        // bind the parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':mobile', $mobile);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':dateofbirth', $dateofbirth);
        $stmt->bindParam(':profilepicture', $profilepicture);
        $stmt->bindParam(':signature', $signature);
        if($stmt->execute()){
            echo "<div class='alert alert-success'>User is saved.</div>";
        }
        else{
            echo "<div class='alert alert-danger'>Unable to save User.</div>";
        }
         
        
    }
    ?>
    <!-------header starts here ------->

    <div class="container">
   
        <div class="page-header">
            <h1>24/7 intouch</h1>
        </div>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>name</td>
            <td><input type='text' name='name' class='form-control' /></td>
        </tr>
        <tr>
            <td>role</td>
            <td><input type='text' name='role' class='form-control'/></td>
        </tr>
        <tr>
            <td>mobile</td>
            <td><input type='text' name='mobile' class='form-control' /></td>
        </tr>
        <tr>
            <td>email</td>
            <td><input type='text' name='email' class='form-control' /></td>
        </tr>
        <tr>
            <td>address</td>
            <td><input type='text' name='address' class='form-control' /></td>
        </tr>
        <tr>
            <td>gender</td>
            <td><input type='text' name='gender' class='form-control' /></td>
        </tr>
        <tr>
            <td>dateofbirth</td>
            <td><input type='text' name='dateofbirth' class='form-control' /></td>
        </tr>
        <tr>
            <td>profilepicture</td>
            <td><input type='file' name='profilepicture' class='form-control' /></td>
        </tr>
        <tr>
            <td>signature</td>
            <td><input type='file' name='signature' class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='header.php' class='btn btn-danger'>Back</a>
            </td>
        </tr>
    </table>
</form>
          
    </div> 
         

</body>
</html>