<?php



require_once 'header.php';
include 'connection.php';

if($_POST){
    $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Details not found.');
    try{

    	$employeeId=htmlspecialchars(strip_tags($_POST['employeeId']));
    	$employeeName=htmlspecialchars(strip_tags($_POST['employeeName']));
    	$mobile=htmlspecialchars(strip_tags($_POST['mobile']));
    	$email=htmlspecialchars(strip_tags($_POST['email']));
    	$address=htmlspecialchars(strip_tags($_POST['address']));
        $process=htmlspecialchars(strip_tags($_POST['process']));
        $jobrole=htmlspecialchars(strip_tags($_POST['jobrole']));


    	$query ="UPDATE Details SET employeeId=:employeeId, employeeName=:employeeName, mobile=:mobile, email=:email, address=:address, process=:process, jobrole=:jobrole";


    	// $employeeId= $_POST['employeeId'];
     //    $employeeName = $_POST['employeeName'];
     //    $mobile = $_POST['mobile'];
     //    $email = $_POST['email'];
     //    $address = $_POST['address'];
     //    $process = $_POST['process'];
     //    $jobrole = $_POST['jobrole'];

    	$stmt = $con->prepare($query);

        $stmt->bindParam(':employeeId', $employeeId);
        $stmt->bindParam(':employeeName', $employeeName);
        $stmt->bindParam(':mobile', $mobile);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':address',$address);
        $stmt->bindParam(':process', $process);
        $stmt->bindParam(':jobrole', $jobrole);

        


    	echo $stmt->execute();


    	if ($stmt->execute()) {
    		echo "<div class='alert alert-success'> Details was Edited.</div>";

    	} else {
    		echo "<div class='alert alert-danger'> Unable to Edit Details.</div>";
    	}
    	

    }
    catch(PDOException $e){
    	die('ERROR: ' . $e->getMessage());

    }
}
?>

<body>
<div class="container">
   
        <div class="page-header">
            <h2>Edit Details</h2>
        </div>
        <?php

        $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Details not found.');

        include 'connection.php';


        try{
        	$query ="SELECT id, employeeId, employeeName, mobile, email, address, process, jobrole FROM Details WHERE id = ? LIMIT 0,1";
    	

    	$stmt = $con->prepare($query);

    	$stmt->bindParam(1, $id);



    	$stmt->execute();

    	$row = $stmt->fetch(PDO::FETCH_ASSOC);


    	$employeeId = $row['employeeId'];
    	$employeeName = $row['employeeName'];
    	$mobile = $row['mobile'];
    	$email = $row['email'];
        $address = $row['address'];
    	$process = $row['process'];
        $jobrole = $row['jobrole'];

        }


        catch(PDOException $e){
        	die('ERROR: ' . $e->getMessage());

        }
        ?>


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>employeeId</td>
            <td><input type='text' name='employeeId' value="<?php echo $employeeId; ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>employeeName</td>
            <td><input name='employeeName'  value="<?php echo $employeeName; ?>" class='form-control'/></td>
        </tr>
        <tr>
            <td>mobile</td>
            <td><input type='text' name='mobile' value="<?php echo $mobile; ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>email</td>
            <td><input type='text' name='email' value="<?php echo $email; ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>address</td>
            <td><input type='text' name='address' value="<?php echo $address; ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>process</td>
            <td><input type='text' name='process' value="<?php echo $process; ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>jobrole</td>
            <td><input type='text' name='jobrole' value="<?php echo $jobrole; ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save Changes' class='btn btn-primary' />
                <a href='add-login.php' class='btn btn-danger'>Back</a>
            </td>
        </tr>
    </table>
</form>
          
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
