<?php



require_once 'header.php';
include 'connect.php';

if($_POST){
    $id=isset($_GET['id']) ? $_GET['id'] : die(' Users not found.');
    try{
        // $name= $_POST['name'];
        // $role = $_POST['role'];
        // $mobile = $_POST['mobile'];
        // $email = $_POST['email'];
        // $address = $_POST['address'];
        // $gender = $_POST['gender'];
        // $dateofbirth = $_POST['dateofbirth'];
        // $profilepicture = $_POST['profilepicture'];
        // $signature = $_POST['signature'];


    	$name=htmlspecialchars(strip_tags($_POST['name']));
    	$role=htmlspecialchars(strip_tags($_POST['role']));
    	$mobile=htmlspecialchars(strip_tags($_POST['mobile']));
    	$email=htmlspecialchars(strip_tags($_POST['email']));
    	$address=htmlspecialchars(strip_tags($_POST['address']));
        $gender=htmlspecialchars(strip_tags($_POST['gender']));
        $dateofbirth=htmlspecialchars(strip_tags($_POST['dateofbirth']));
        $profilepicture=htmlspecialchars(strip_tags($_POST['profilepicture']));
        $signature=htmlspecialchars(strip_tags($_POST['signature']));


    	$query ="UPDATE Details SET name=:name, role=:role, mobile=:mobile, email=:email, address=:address, gender=:gender, dateofbirth=:dateofbirth, profilepicture=:profilepicture, signature=:signature";


    	

    	$stmt = $conn->prepare($query);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':mobile', $mobile);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':address',$address);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':dateofbirth', $dateofbirth);
        $stmt->bindParam(':profilepicture',$profilepicture);
        $stmt->bindParam(':signature', $signature);


        


    	echo $stmt->execute();


    	if ($stmt->execute()) {
    		echo "<div class='alert alert-success'> Users was Edited.</div>";

    	} else {
    		echo "<div class='alert alert-danger'> Unable to Edit Users.</div>";
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
            <h2>Edit Users</h2>
        </div>
        <?php

        $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Users not found.');

        include 'connection.php';


        try{
        	$query ="SELECT id, name, role, mobile, email, address, gender, dateofbirth, profilepicture, signature FROM Details WHERE id = ? LIMIT 0,1";
    	

    	$stmt = $conn->prepare($query);

    	$stmt->bindParam(1, $id);



    	$stmt->execute();

    	$row = $stmt->fetch(PDO::FETCH_ASSOC);


    	$name = $row['name'];
    	$role = $row['role'];
    	$mobile = $row['mobile'];
    	$email = $row['email'];
        $address = $row['address'];
    	$gender = $row['gender'];
        $dateofbirth = $row['dateofbirth'];
        $profilepicture = $row['profilepicture'];
        $signature = $row['signature'];


        }


        catch(PDOException $e){
        	die('ERROR: ' . $e->getMessage());

        }
        ?>


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>name</td>
            <td><input type='text' name='name' value="<?php echo $name; ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>role</td>
            <td><input type='text' name='role'  value="<?php echo $role; ?>" class='form-control'/></td>
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
            <td>gender</td>
            <td><input type='text' name='gender' value="<?php echo $gender; ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>dateofbirth</td>
            <td><input type='text' name='dateofbirth' value="<?php echo $dateofbirth; ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>profilepicture</td>
            <td><input type='file' name='profilepicture' value="<?php echo $profilepicture; ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>signature</td>
            <td><input type='file' name='signature' value="<?php echo $signature; ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save Changes' class='btn btn-primary' />
                <a href='add-user.php' class='btn btn-danger'>Back</a>
            </td>
        </tr>
    </table>
</form>
          
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
