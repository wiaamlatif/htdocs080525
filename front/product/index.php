<?php $title ="Gestion des tickets"; ?>


<?php ob_start();?>
<!------------------------content----------------------------------->
   <?php include '\htdocs\include\nav.php';?>

   <div class="container text-center">
  <div class="row row-danger justify-content-center">
    <div class="col">    
      <?php include 'tableHeadsTicket.php';?>
    </div>
    <div class="col">
      <?php include 'ticketTable.php';?>          
    </div>
    <div class="col">
      <?php include 'productsTable.php';?>
    </div>
  </div>
</div>

<?php $content = ob_get_clean(); ?>
<!-----------------------content------------------------------------>


<?php require_once 'C:\htdocs\layout.php'?>





