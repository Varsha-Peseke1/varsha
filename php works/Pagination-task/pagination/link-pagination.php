<?php
if($page>=2) {
        echo "<a href='index1.php?page=".($page-1)."'>  Prev </a>";   
}       
                   
for ($i=1; $i<=$total_pages; $i++) {   
        if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='index1.php?page="  
                                                .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='index1.php?page=".$i."'>   
                                                ".$i." </a>";     
          }   
};     
echo $pagLink;   
  
if($page<$total_pages){   
          echo "<a href='index1.php?page=".($page+1)."'>  Next </a>";   
}
?>