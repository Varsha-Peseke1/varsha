<?php 

  require_once 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	  <style>
    .m-r-1em{ margin-right:1em; }
    .m-b-1em{ margin-bottom:1em; }
    .m-l-1em{ margin-left:1em; }
    .mt0{ margin-top:0; }
    </style>
</head>
<body>
	<div class="container">
  
        <div class="page-header">
            <h1>User Details</h1>
        </div>
        <?php

        include 'connection.php';


        $action = isset($_GET['action']) ? $_GET['action'] : "";
        // $name= $_POST['name'];
        // $role = $_POST['role'];
        // $mobile = $_POST['mobile'];
        // $email = $_POST['email'];
        // $address = $_POST['address'];
        // $gender = $_POST['gender'];
        // $dateofbirth = $_POST['dateofbirth'];
        // $profilepicture = $_POST['profilepicture'];
        // $signature = $_POST['signature'];

        if($action=='deleted'){
    echo "<div class='alert alert-success'>User was deleted.</div>";
    }
	$query = "SELECT id, name, role, mobile, email, address, gender, dateofbirth, profilepicture, signature  FROM details ORDER BY id ASC";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	$num = $stmt->rowCount();

	echo "<a href='admin-user.php' class='btn btn-primary m-b-1em'>User-details</a>";

	if($num>0){
 		
    echo "<table class='table table-hover table-responsive table-bordered'>";

 	echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Role</th>";
        echo "<th>Mobile</th>";
        echo "<th>Email</th>";
        echo "<th>Address</th>";
        echo "<th>Gender</th>";
        echo "<th>Dateofbirth</th>";
        echo "<th>Profilepicture</th>";
        echo "<th>Signature</th>";

        
    	echo "</tr>";

    	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                extract($row);
    		    // echo row;


    	echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$name}</td>";
        echo "<td>{$role}</td>";
        echo "<td>{$mobile}</td>";
        echo "<td>{$email}</td>";
        echo "<td>{$address}</td>";
        echo "<td>{$gender}</td>";
        echo "<td>{$dateofbirth}</td>";
        echo "<td>{$profilepicture}</td>";
        echo "<td>{$signature}</td>";
        echo "<td>";

                    //echo "<a href='update.php?id={$id}' class='btn btn-primary m-r-1em'>Update</a>";

                echo "<a href='#' onclick='delete_user({$id});'  class='btn btn-danger'>Delete</a>";
        echo "</td>";
    echo "</tr>";
}
 

echo "</table>";
     
}
else{
    echo "<div class='alert alert-danger'>No Users found.</div>";
}
?>

</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<script type='text/javascript'>
function delete_user( id ){
     
    var answer = confirm('Are you sure?');
    if (answer){
        
        window.location = 'delete.php?id=' + id;
    } 
}
</script>
 
</body>
</html>

 


     



