<?php require_once '/home/vol9_5/infinityfree.com/if0_38168562/htdocs/config.php'; ?>
<?php
$title ="Commandes ";
ob_start();
?>
    <?php $varSell="Sell";$varData="Data";?>
    <?php include ROOT_DIRECTORY.'/include/navAdmin.php'; ?>

    <h1>Ici Index Livraison</h1>
 

<?php $content = ob_get_clean(); ?>


<?php include ROOT_DIRECTORY."/layout.php" ?>