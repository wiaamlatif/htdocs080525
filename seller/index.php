<?php include "C:/caisse191124/front/category/count_items.php"?>

<?php $title ="Seller"; ?>

<?php ob_start();?>

<?php include '..\include\navSeller.php'; ?>
    
    <h1 class="testo">Seller</h1>


<?php $content = ob_get_clean(); ?>


<?php include "../layout.php" ?>