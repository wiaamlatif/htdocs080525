<?php

require_once '\htdocs\include\database.php';

$sql="TRUNCATE TABLE items_panier";

$result=mysqli_query($conn,$sql);

if($result){
?>
  <div class='alert alert-warning' role='alert'>
    Votre panier est vide !
  </div>            
<?php 
}       

mysqli_close($conn); 

////header('Location: admin.php');
header('Location: index.php');