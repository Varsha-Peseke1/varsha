<?php
include 'connect.php';
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA_Compatible" content="IE-edge"> 
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <link rel="stylesheet" href="admin.css" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <title>Document</title>
    </head>
    <body>
        <div class="center">
            <h1>User Register</h1>

            <table id="users">
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Email Address</th>
                    <th>Action</th>
                </tr>
                <?php
                    $query="SELECT * FROM users WHERE status='pending' ORDER BY id ASC";
                    $result=mysqli_query($conn, $query);
                    while($row=mysqli_fetch_array($result)){
                ?>
                <tr>
                
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['username'];?></td>
                    <td><?php echo $row['email'];?></td>
                     <td>
                         <form action="admin-approval.php" method="POST">
                         <input type="hidden" name="id" value="<?php echo $row['id'];?>"/>
                         <input type="submit" name="approve" value="Approve">
                         <input type="submit" name="deny" value="Deny">
                         </form>
                        
                    </td>
                    
                </tr>
            
            </table>
            <?php
            }
            ?>
        </div>
            <?php
            if(isset($_POST['approve'])){
                $id=$_POST['id'];
                $select="UPDATE users SET status='approved' WHERE id='$id'";
                $result=mysqli_query($conn, $select);
                
                echo '<srcipt type="text/javascript">';
                echo 'alert("User Approved!")';
                echo 'window.location.href="admin-approval.php"';
                echo '</script>';
            }
            if(isset($_POST['deny'])){
                $id=$_POST['id'];
                $select="DELETE users SET status='approved' WHERE id='$id'";
                $result=mysqli_query($conn, $select);
                
                echo '<srcipt type="text/javascript">';
                echo 'alert("User Denied!")';
                echo 'window.location.href="admin-approval.php"';
                echo '</script>';
            }
            ?>
    </body>
</html>