<?php 

  include 'header.php';
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
            <h1>Employee Details</h1>
        </div>
        <?php

        include 'connection.php';


        $action = isset($_GET['action']) ? $_GET['action'] : "";
        // $image= $_POST['image'];
        // $pan_card = $_POST['pan_card'];
        // $aadhar_card = $_POST['aadhar_card'];
        // $ssc_memo = $_POST['ssc_memo'];
        // $inter_memo = $_POST['inter_memo'];
        // $graduation_memo = $_POST['graduation_memo'];
        // $caste_certificate = $_POST['caste_certificate'];
        // $income_certificate = $_POST['income_certificate'];
        // $updated_resume = $_POST['updated_resume'];

        
	$query = "SELECT id, image, pan_card, aadhar_card, ssc_memo, inter_memo, graduation_memo, caste_certificate, income_certificate, updated_resume  FROM product ORDER BY id ASC";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	$num = $stmt->rowCount();

	echo "<a href='upload.php' class='btn btn-primary m-b-1em'>User-details</a>";

	if($num>0){
 		
    echo "<table class='table table-hover table-responsive table-bordered'>";

 	echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Image</th>";
        echo "<th>Pan_card</th>";
        echo "<th>Aadhar_card</th>";
        echo "<th>Ssc_memo</th>";
        echo "<th>Inter_memo</th>";
        echo "<th>Graduation_memo</th>";
        echo "<th>Caste_certificate</th>";
        echo "<th>Income_certificate</th>";
        echo "<th>Updated_resume</th>";

        
    	echo "</tr>";

    	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                extract($row);
    		    // echo row;


    	echo "<tr>";
        echo "<td>{$id}</td>";
        // echo "<td>{$image}</td>";
        // echo  "<td> . "<img src="['$image']. "width="100px" height="100px"">" . </td>"
        echo "<td>" . "<img src=".$row['image'].' width=100px height="100px">' . "</td>";

        //echo "<td>{$pan_card}</td>";
        echo "<td>" . "<img src=".$row['pan_card'].' width=100px height="100px">' . "</td>";

        //echo "<td>{$aadhar_card}</td>";
        echo "<td>" . "<img src=".$row['aadhar_card'].' width=100px height="100px">' . "</td>";
       
        //echo "<td>{$ssc_memo}</td>";
        echo "<td>" . "<img src=".$row['ssc_memo'].' width=100px height="100px">' . "</td>";
  
        //echo "<td>{$inter_memo}</td>";
        echo "<td>" . "<img src=".$row['inter_memo'].' width=100px height="100px">' . "</td>";

        //echo "<td>{$graduation_memo}</td>";
        
        echo "<td>" . "<img src=".$row['graduation_memo'].' width=100px height="100px">' . "</td>";
        //echo "<td>{$caste_certificate}</td>";
        
        echo "<td>" . "<img src=".$row['caste_certificate'].' width=100px height="100px">' . "</td>";
        //echo "<td>{$income_certificate}</td>";
        echo "<td>" . "<img src=".$row['income_certificate'].' width=100px height="100px">' . "</td>";
     
        //echo "<td>{$updated_resume}</td>";
        echo "<td>" . "<img src=".$row['updated_resume'].' width=100px height="100px">' . "</td>";

         echo "</tr>";
}
 

echo "</table>";
     
}
else{
    echo "<div class='alert alert-danger'>No Employees found.</div>";
}
?>

</div>

<script src="https:code.jquery.com/jquery-3.2.1.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


 
</body>
</html>

 


     



