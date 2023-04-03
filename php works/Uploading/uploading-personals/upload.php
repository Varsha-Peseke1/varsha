<?php 

 include 'header.php';
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


        $image= $_POST['image'];
        $pan_card = $_POST['pan_card'];
        $aadhar_card = $_POST['aadhar_card'];
        $ssc_memo = $_POST['ssc_memo'];
        $inter_memo = $_POST['inter_memo'];
        $graduation_memo = $_POST['graduation_memo'];
        $caste_certificate = $_POST['caste_certificate'];
        $income_certificate = $_POST['income_certificate'];
        $updated_resume = $_POST['updated_resume'];

         $query = "INSERT INTO product SET image=:image, pan_card=:pan_card, aadhar_card=:aadhar_card, ssc_memo=:ssc_memo, inter_memo=:inter_memo, graduation_memo=:graduation_memo, caste_certificate=:caste_certificate, income_certificate=:income_certificate, updated_resume=:updated_resume";
    
        // prepare query for execution
        $stmt = $conn->prepare($query);
        echo "it is a login credentials";
        
        // bind the parameters
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':pan_card', $pan_card);
        $stmt->bindParam(':aadhar_card', $aadhar_card);
        $stmt->bindParam(':ssc_memo', $ssc_memo);
        $stmt->bindParam(':inter_memo', $inter_memo);
        $stmt->bindParam(':graduation_memo', $graduation_memo);
        $stmt->bindParam(':caste_certificate', $caste_certificate);
        $stmt->bindParam(':income_certificate', $income_certificate);
        $stmt->bindParam(':updated_resume', $updated_resume);

        if($stmt->execute()){
            echo "<div class='alert alert-success'>files are successfully uploaded.</div>";
        }
        else{
            echo "<div class='alert alert-danger'>Unable to upload your files.</div>";
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
            <td>image</td>
            <td><input type='file' name='image' class='form-control' /></td>
        </tr>
        <tr>
            <td>pan_card</td>
            <td><input type='file'  name='pan_card' class='form-control'/></td>
        </tr>
        <tr>
            <td>aadhar_card</td>
            <td><input type='file' name='aadhar_card' class='form-control' /></td>
        </tr>
        <tr>
            <td>ssc_memo</td>
            <td><input type='file' name='ssc_memo' class='form-control' /></td>
        </tr>
        <tr>
            <td>inter_memo</td>
            <td><input type='file' name='inter_memo' class='form-control' /></td>
        </tr>
        <tr>
            <td>graduation_memo</td>
            <td><input type='file' name='graduation_memo' class='form-control' /></td>
        </tr>
        <tr>
            <td>caste_certificate</td>
            <td><input type='file' name='caste_certificate' class='form-control' /></td>
        </tr>
        <tr>
            <td>income_certificate</td>
            <td><input type='file' name='income_certificate' class='form-control' /></td>
        </tr>
        <tr>
            <td>updated_resume</td>
            <td><input type='file' name='updated_resume' class='form-control' /></td>
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