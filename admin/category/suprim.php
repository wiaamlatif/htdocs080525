<?php require '/home/vol9_5/infinityfree.com/if0_38168562/htdocs/config.php'; ?>
<?php

$id = $_GET['id'];

require_once ROOT_DIRECTORY."/include/database.php";

$sqlstm = $pdo -> prepare('DELETE FROM categories
                           WHERE id_category=?;');
$sqlstm -> execute([$id]);

//Redirection
header('location:index.php');




