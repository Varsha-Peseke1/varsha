<?php     
  while ($row = mysqli_fetch_array($rs_result)) {    
            // Display each field of the records.    
  ?>     
  <tr>     
  <td><?php echo $row["Rank"]; ?></td>     
  <td><?php echo $row["Employee Name"]; ?></td>   
  <td><?php echo $row["Designation"]; ?></td>   
  <td><?php echo $row["Date of Birth"]; ?></td> 
  <td><?php echo $row["Date of Joining"]; ?></td>
  <td><?php echo $row["Blood Group"]; ?></td>
  <td><?php echo $row["Mobile"]; ?></td>
  <td><?php echo $row["Email"]; ?></td> 
  <td><?php echo $row["Address"]; ?></td> 
  </tr>     
  <?php     
  };   
  ?>  
