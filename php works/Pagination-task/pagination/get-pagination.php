<?php
require_once "connection.php";   

$per_page_record = 10;  // Number of entries to show in a page.   
// Look for a GET variable page if not found default is 1.        
if (isset($_GET["page"])) {    
      $page  = $_GET["page"];    
 }    
 else {    
       $page=1;    
 }    
    
//determine the sql LIMIT starting number for the results on the displaying page  
 $start_from = ($page-1) * $per_page_record;     
    
 $query = "SELECT * FROM basic_details LIMIT $start_from, $per_page_record";     
 $rs_result = mysqli_query ($conn, $query);    
 ?>