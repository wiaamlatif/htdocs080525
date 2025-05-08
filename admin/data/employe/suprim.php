<?php
$title ="Delete employee";
ob_start();
?>

<?php
$id = $_GET['id'];

require_once MAINDIRECTORY.'/htdocs/include/database.php';

$sql ="DELETE FROM employees
       WHERE employees.id_employee =?;";

$sqlPdo = $pdo -> prepare($sql);

$sqlPdo -> execute([$id]);

//Redirection
header('location:index.php');
?>

<?php $content = ob_get_clean(); ?>

<?php $varSell="Sell";$varData="Data";?>
<?php include MAINDIRECTORY."/htdocs/layout.php" ?>