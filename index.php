<?php $title ="Home"; ?>

<?php ob_start();?>
<?php include '\htdocs\include\nav.php';?>

  <div class="container py-2">
       <h1>MADI CASH</h1>

  </div>

     
<?php $content = ob_get_clean(); ?>


<?php require_once "layout.php";?>