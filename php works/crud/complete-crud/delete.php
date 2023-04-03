<?php

   include 'connection.php';
 
try {

	 $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');


	$query = "DELETE FROM details WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bindParam(1, $id);

        if($stmt->execute()){


        	header('Location: details1.php?action=deleted');
    }else{
        die('Unable to delete record.');
    }
}


catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>

     