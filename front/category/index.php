<?php $title ="Liste des categories"; ?>

<?php
    require_once "\htdocs\include\database.php";
    
    $sql = "SELECT * FROM categories";
            
    $result = mysqli_query($conn, $sql);
                   
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<?php ob_start();?>
   <?php include '\htdocs\include\nav.php';?>

   <div class="container text-center py-5">
   
      <div class="row">
      
         <div class="col-md-3">
         <!---Liste des Categories------->
            <ul class="list-group list-group-flush w-30">
               <?php           
               foreach($row as $data){
               ?>              
                  <li class="list-group-item">
                  <input class="idCategory" id="idCategory" type="hidden" value="<?=$data['id_category']?>">                    
                  <button class="btnCategory btn btn-light rounded-pill"><?=$data['name_category']?></button>
                  </li>
               <?php     
               }                             
               ?>          
            </ul>

         <!---Liste des Categories------->
         </div>

         <div class="col-md-9" >
         <!--- Cards of products ----->
            <div id="productsCards">
              
            </div>
         <!--- Cards of products ----->                  
         </div>

   <!---container--->
   </div>

<!----------------------------------------------------------->



<?php $content = ob_get_clean(); ?>


<?php require_once 'C:\htdocs\layout.php'?>





