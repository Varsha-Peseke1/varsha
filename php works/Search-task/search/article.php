<?php
include 'header.php';
?>
<h1>Article Page</h1>

<div class="article-container">
		<?php
		$title=mysqli_real_escape_string($conn, $_GET['search']);
		$date=mysqli_real_escape_string($conn, $_POST['date']);

		$sql="SELECT * FROM article WHERE a_title='$title' AND a_date='$date'";
		$result=mysqli_query($conn, $sql);
		$queryResults=mysqli_num_rows($result);

		if($queryResults>0){
			while($row=mysqli_fetch_assoc($result)){
				echo "<div class="text-box">"
				<h3>".$row['a_title']."</h3>
				<h3>".$row['a_text']."</h3>
				<h3>".$row['a_date']."</h3>
				<h3>".$row['a_author']."</h3>

				</div>";
			}
		}
		?>
		
	</div>
