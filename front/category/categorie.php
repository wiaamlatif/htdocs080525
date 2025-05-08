<?php
    $idCategory = $_GET['id']; 

    require_once '\htdocs\include\database.php';

    $sql = "SELECT * FROM categories
            WHERE id_category=$idCategory";
            
    $result = mysqli_query($conn, $sql);

    $categorie = mysqli_fetch_assoc($result);
    
    $sql = "SELECT * FROM products
            WHERE id_category=$idCategory";

    $result = mysqli_query($conn,$sql);

    $produits = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<?php 
       $title=$categorie['name_category']; 
?>

<?php ob_start();?>
    
    <?php include '\htdocs\include\nav.php'; ?>

    <h3><?=$title?></h3>    

    <div class="container">
        <div class="row">

            <?php 
              foreach($produits as $produit){
                $idCategory=$produit['id_category'];
                $idProduct=$produit['id_product'];
                /* */ $panier=[];
                if(in_array($produit['id_product'],array_keys($panier))){
                    $quantityItem=$panier[$produit['id_product']];
                } else {
                    $quantityItem=0;
                }      
            ?>
            <!--==============================--->
            <div class="card mb-3 col-md-3 m-1">
                <img src="/uploads/products/<?=$produit['imgSrc']?>" class="card-img-top w-50 mx-auto" alt="...">
                <div class="card-body">
                    <a href="detail_produit.php?idPrd=<?=$produit['id_product']?>" class="btn stretched-link">Afficher detail</a>                   
                    <h5 class="card-title"><?=$produit['name_product']?></h5>
                    <p class="card-text"><?=$produit['description']?></p>
                    <p class="card-text"><small class="text-muted"> <?=$produit['price']?> MAD</small></p>
                    <p class="card-text"> <?= date_format(date_create($produit['date_product']),format:'Y/m/d' )  ?></p>
                </div>
                <div class="card-footer" style="z-index:10">                 
                    <!---Quantity---> 
                    <div class="card-btns d-flex mb-3 justify-content-center">
                          <input class="idProduct" type="hidden" value="<?=$produit['id_product']?>">
                          <input class="price" type="hidden" value="<?=$produit['price']?>">
                          <button class="supItem btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></button>               
                          <button class="decrement btn btn-primary">-</button>
                          <span id="quantity" class="quantity"><?=number_format($quantityItem,0)?></span>
                          <button class="increment btn btn-primary">+</button>                                                       
                    </div>
                    <!---/Quantity--->
                </div>
            </div>            
            <!--==============================--->
            <?php
              }
            ?>
     

        </div>
    </div>
    
    <div id="result"></div>

<?php $content = ob_get_clean(); ?>

<?php require_once '\htdocs\layout.php'?>











