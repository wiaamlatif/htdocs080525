<?php require_once '/home/vol9_5/infinityfree.com/if0_38168562/htdocs/config.php'; ?>
<?php include ROOT_DIRECTORY."/include/nav.php"; ?>

<?php include "count_items.php"?>

<?php
require_once ROOT_DIRECTORY.'/include/database.php';

$idProduct = $_GET['idPrd'];

$sqlstm = $pdo -> prepare('SELECT * FROM products
                           WHERE id_product=?');
$sqlstm -> execute([$idProduct]); 
$produit= $sqlstm -> fetch(PDO::FETCH_ASSOC);

$prix =$produit['price'];

$idProduct=$produit['id_product'];
$idCategory=$produit['id_category'];
$quantityItem=$panier[$idProduct];
?>

<?php
$title ="Detail Produit";
ob_start();
?>

<div class="container py-2">
      <div class="container">
        <div class="row">

          <div class="col-md-6">
            <h4><?=$produit['name_product']?></h4>
            <img class="img img-fluid w-50"src="/uploads/products/<?=$produit['imgSrc']?>" alt="">
          </div>

          <div class="col-md-6">

              <div class="d-flex align-items-center">

                <h4 class="w-100">
                  <?=$produit['name_product']?>
                </h4>

                <!--h5 class="mx-1">
                  <span class="badge bg-success">
                  -<?="0"?>%
                  </span>                   
                </h5  -->   

              </div>  

              <hr>

              <p><?=$produit['description']?></p>

              <hr>

              <div class="d-flex">

                <!--h3 class="mx-1">
                  <span class="badge bg-danger">
                  <del><?=$prix?></del> MAD
                  </span>                   
                </h3 -->         

                <h2 class="mx-1">
                  <span class="badge bg-success">
                  <?=$prix?> MAD
                  </span>                   
                </h2>         

              </div>            
            <hr>                                
                <!---Quantity--->
                <?php include "quantity.php";        ?>
                <!---/Quantity--->                                 
            <hr>
          </div>  

        </div>
      </div>
</div>
 

<?php $content = ob_get_clean(); ?>


<?php $varSell="Sell";$varData="Data";?>
<?php require_once ROOT_DIRECTORY.'/layout.php'?>