<?php require_once '/home/vol9_5/infinityfree.com/if0_38168562/htdocs/config.php'; ?>
<?php
$title ="Deconnexion";
ob_start();
?>
<?php
    session_start();

    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();

    //redirection
    header('location:/index.php');
?>
   
<?php $content = ob_get_clean(); ?>


<?php include ROOT_DIRECTORY."/layout.php" ?>