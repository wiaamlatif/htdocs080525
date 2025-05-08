<?php include "C:/caisse191124/front/category/count_items.php"?>

<?php $title ="Client"; ?>

<?php ob_start();?>

<?php include '..\include\navClient.php'; ?>
    
    <h1 class="testo">Client</h1>


<?php $content = ob_get_clean(); ?>


<?php require_once '../layout.php';?>     