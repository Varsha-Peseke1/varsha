<?php
include 'header.php'
?>
<!-- <!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body> -->
	<form action="search.php" method="POST">
		<input type="text" name="search" placeholder="Search">
		<button type="submit" name="submit-search">Search</button>
	</form>
	<h1>Front Page</h1>
	<h2>All Articles:</h2>

	<div class="article-container">
		<?php
		$sql="SELECT * FROM article";
		$result=mysqli_query($conn, $sql);
		$queryResults=mysqli_num_rows($result);

		?>




		<?php     
            while ($row = mysqli_fetch_array($result)) {    
                  // Display each field of the records.    
            ?>     
            <tr>     
            <td><?php echo $row["a_title"]; ?></td>     
            <td><?php echo $row["a_text"]; ?></td>   
            <td><?php echo $row["a_date"]; ?></td> 
            <td><?php echo $row["a_author"]; ?></td>
            
            </tr>     
            <?php     
                };    
            ?>     

		
	</div>

</body>
</html>