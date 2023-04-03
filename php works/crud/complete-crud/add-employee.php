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

            include 'connection.php';


        $employeeId= $_POST['employeeId'];
        $employeeName = $_POST['employeeName'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $process = $_POST['process'];
        $jobrole = $_POST['jobrole'];

         $query = "INSERT INTO details SET employeeId=:employeeId, employeeName=:employeeName, mobile=:mobile, email=:email, address=:address, process=:process, jobrole=:jobrole";
    
        // prepare query for execution
        $stmt = $con->prepare($query);
        echo "it is a login credentials";
        
        // bind the parameters
        $stmt->bindParam(':employeeId', $employeeId);
        $stmt->bindParam(':employeeName', $employeeName);
        $stmt->bindParam(':mobile', $mobile);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':process', $process);
        $stmt->bindParam(':jobrole', $jobrole);
        if($stmt->execute()){
            echo "<div class='alert alert-success'>Record is saved.</div>";
        }
        else{
            echo "<div class='alert alert-danger'>Unable to save record.</div>";
        }
         
        
    }
    ?>
    <!-------header starts here ------->

    <div class="container">
   
        <div class="page-header">
            <h1>24/7 intouch</h1>
        </div>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>employeeId</td>
            <td><input type='text' name='employeeId' class='form-control' /></td>
        </tr>
        <tr>
            <td>employeeName</td>
            <td><input name='employeeName' class='form-control'/></td>
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
            <td>process</td>
            <td><input type='text' name='process' class='form-control' /></td>
        </tr>
        <tr>
            <td>jobrole</td>
            <td><input type='text' name='jobrole' class='form-control' /></td>
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