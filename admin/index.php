<?php require_once '/home/vol9_5/infinityfree.com/if0_38168562/htdocs/config.php'; ?>
<?php $title ="Dashboard"; ?>
<?php ob_start(); ?>  

    <?php $varSell="Sell";$varData="Data";?>
    <?php include ROOT_DIRECTORY.'/include/navAdmin.php'; ?>

    <?php
        if(!isset($_SESSION['user']) || $_SESSION['user']['role']!=3){
            header(ROOT_DIRECTORY.'/include/connexion.php');            
        }
    ?>

    <h3 style="text-align:center;margin-bottom:50px;">Bonjour <?=$_SESSION['user']['login']?></h3>

<div class="d-flex mb-3 justify-content-center"> 

    <a href="#" class="btn">
        <h3>
            <span class="badge text-bg-success text-white">Statistique</span>
        </h3>
    </a>

    <a href="#" class="btn">
        <h3>
            <span class="badge text-bg-primary text-white">Personnaliser</span>
        </h3>
    </a>

    <a href="#" class="btn">
        <h3>
            <span class="badge text-bg-danger text-white">Initialise Database</span>
        </h3>
    </a>




</div>
 

<?php $content = ob_get_clean(); ?>


<?php include ROOT_DIRECTORY."/layout.php" ?>





