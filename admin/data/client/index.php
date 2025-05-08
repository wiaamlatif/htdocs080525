<?php require '/home/vol9_5/infinityfree.com/if0_38168562/htdocs/config.php'; ?>
<?php
$title ="Data Client";
ob_start();
?>

<?php $varSell="Sell";$varData="Data";?>
<?php include ROOT_DIRECTORY.'/include/navAdmin.php'; ?>

    <h1>Ici Index Data Client</h1>
 

<?php $content = ob_get_clean(); ?>

<?php $varSell="Sell";$varData="Data";?>
<?php include ROOT_DIRECTORY."/layout.php" ?>





