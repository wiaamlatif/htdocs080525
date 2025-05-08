<?php require '/home/vol9_5/infinityfree.com/if0_38168562/htdocs/config.php'; ?>
<?php
$title ="Delete product";
ob_start();
?>

<?php $varSell="Sell";$varData="Data";?>
<?php include ROOT_DIRECTORY.'/include/navAdmin.php'; ?>

<?php
$id = $_GET['id'];

require_once ROOT_DIRECTORY.'/include/database.php';

$sql ="DELETE FROM products
       WHERE products.id_product =?;";

$sqlPdo = $pdo -> prepare($sql);

$sqlPdo -> execute([$id]);

//Redirection
header('location:index.php');
?>





<?php $content = ob_get_clean(); ?>


<?php include ROOT_DIRECTORY."/layout.php" ?>