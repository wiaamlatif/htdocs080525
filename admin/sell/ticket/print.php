<?php
$title ="Printer";
ob_start();
?>
    <h1>Print Ticket</h1>
 

<?php $content = ob_get_clean(); ?>


<?php $varSell="Tickets";$varData="Data";?>
<?php include "c:/caisse191124/layout.php" ?>