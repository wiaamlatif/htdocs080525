<?php   
    require_once MAINDIRECTORY.'/htdocs/include/database.php';

    $sql = "SELECT
                `id_employee`,
                `first_name`,
                `last_name`,
                `date_naissance`,
                `telephone`,
                `adresse`,
                `fonction`,
                `scolarite`,
                `imgSrc`,
                `seller`,
                `set_z`,
                `created_at`
            FROM
                `employees`;";
           
    $sqlPdo = $pdo -> query($sql);     
    $clerks = $sqlPdo -> fetchAll(PDO::FETCH_ASSOC);   
?>

<?php 
       $title='Employees'; 
?>

<?php ob_start();?>

<?php $varSell="Sell";$varData="Data";?>  
<?php include MAINDIRECTORY.'/htdocs/include/navAdmin.php'; ?>

<!---IIIIIIIIIIIIIIIIIIIIIIIII--->
<div class="container container-fluid">
  <div class="row justify-content-center">
    
    <?php 
              foreach ($clerks as $clerk) {
                $idClerk=$clerk['id_employee'];
            ?>
            <!--==============================--->
            <div class="card mb-3 col-md-3 m-1">                
                <div class="card-body text-center">
                <img class="img img-fluid w-50" src="/uploads/employees/<?=$clerk['imgSrc']?>" alt="">
                    <a href="detail_employe.php?id=<?=$idClerk?>" class="btn stretched-link">Afficher detail</a>
                    <h5 class="card-title"><?=$clerk['first_name']?></h5>
                    <p class="card-text"><?=$clerk['last_name']?></p>
                    <p class="card-text"><small class="text-muted"> <?="Espace1 Disponible"?> MAD</small></p>
                    <p class="card-text"> <?= date_format(date_create($clerk['created_at']),format:'Y/m/d' )  ?></p>
                </div>
                <div class="card-footer" style="z-index:10">                 
                    <!---Quantity--->
                    
                    <!---/Quantity--->
                </div>
            </div>            
            <!--==============================--->
            <?php
              }
            ?>  
            
            </div>   
            
<div class="row justify-content-center">
  <a href="add_employe.php" class="btn btn-primary py-2 col-md-3">Ajouter Employe</a>            
</div>

</div>

<!---IIIIIIIIIIIIIIIIIIIIIIIII--->
    
<?php $content = ob_get_clean(); ?>


<?php $varSell="Sell";$varData="Data";?>
<?php include MAINDIRECTORY."/htdocs/layout.php" ?>











