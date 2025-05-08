

<?php $title ="Panier"; ?>

<?php ob_start();?>

<?php include '\htdocs\include\nav.php';?>
<?php

    require_once '\htdocs\include\database.php';

    $sql="SELECT * FROM items_panier";

    $result=mysqli_query($conn,$sql);
  
    $rowcount=mysqli_num_rows($result);


?>
    <div class="container py-2">            
        <div class="row justify-content-md-center">
          <div class="col">
              <?php
              if($rowcount>0){
              ?>
                <table class="table table-striped table-hover">    
                  <thead>
                    <tr><!-- table row--->
                    <th width="5%">IdPan</th><!-- table head--->         
                    <th width="5%">IdPrd</th><!-- table head--->       
                    <th width="10%">Category</th><!-- table head--->       
                    <th width="20%">imgSrc</th>          
                    <th width="20%">Product</th>          
                    <th width="10%" style="text-align:center;">Quantite</th> 
                    <th width="10%">Prix</th> 
                    <th width="20%">Total</th>                             
                    </tr>
                  </thead>
                  <tbody>
                      <?php // Display cart's items    
                        if($rowcount>0){

                        require_once '\htdocs\include\database.php';

                        $sql = "SELECT * FROM items_panier
                                INNER JOIN products ON items_panier.id_product = products.id_product
                                INNER JOIN categories ON categories.id_category = products.id_category";
                                
              
                        $result = mysqli_query($conn, $sql);
                                      
                        $prdPanier = mysqli_fetch_all($result, MYSQLI_ASSOC);

                        }
                      ?>              
                      <?php   
                        $totalTicket=0;
                        foreach ($prdPanier as $produit){ 
                        $idPanier=$produit['id_panier'];
                        $idProduct=$produit['id_product'];
                        $idCategory=$produit['id_category'];
                        $quantityItem=$produit['quantity'];
                        $price=$produit['price'];
                        $imgSrc=$produit['imgSrc'];         
                        $totalItem=$price*$quantityItem;
                        $totalTicket+=$totalItem;                         
                      ?>              
                      <tr>
                        <td><?=$idPanier?></td>

                        <td><?=$idProduct?></td>

                        <td><?=$produit['name_category']?></td>

                        <td>            
                        <img class="img img-fluid" src="/uploads/products/<?=$produit['imgSrc']?>" width="70px" alt="">
                        </td>           

                        <td><?=$produit['name_product']?></td>

                        <td><!---Quantity---------------->                    
                        <!---Quantity--->
                        <?php include "quantity.php"; ?>
                        <!---Quantity--->
                        </td><!---Quantity Quantity---------------->            

                        <td class="tdPrice"><?= $price ?></td>

                        <td class="tdtotalItem"><strong><?=$totalItem?></strong></td>

                      </tr>  
                      <?php     
                      }                             
                      ?>          
                  </tbody> 
                  <tfoot>
                    <tr>
                    <th colspan="6" style="text-align:right;" ><strong>Total</strong></th>
                    <th id="thtotalTicket"><strong><?=$totalTicket?></strong></th>
                    </tr>    
                    <tr>
                    <th colspan="6" style="text-align:right;" >
                    <form action="" method="post">                  
                      <div class="d-flex mb-3 justify-content-end">                    

                      <input type="submit" name="valider" class="btn btn-success mx-1" value="Valider">
                      <input type="submit" name="vider"   class="btn btn-danger" value="Vider" onclick="return confirm('Confirmer vider panier?')">                                      

                      </div>
                    </form>            
                    </th>          
                    </tr>    
                  </tfoot> 
                </table>                                            
              <?php       
              }else{
              ?> 
                <div class='alert alert-warning' role='alert'>
                  Votre panier est vide !
                </div>            
              <?php
                }
              ?>  
          </div><!---col--->                                              
        </div><!---row--->
    </div><!-----container py-2 --->

<?php $content = ob_get_clean(); ?>

<?php

  if(isset($_POST['valider'])){
    
    session_start();      
    if(empty($_SESSION) || !isset($_SESSION) || $_SESSION['user']['role']===0){
      header('/include/connexion.php');
    } else {      
      header('location:/front/category/savePanier.php');
    }
  }

?>

<?php

if(isset($_POST['vider'])){  

  require_once '\htdocs\include\database.php';

  $sql="TRUNCATE TABLE items_panier";

  $result=mysqli_query($conn,$sql);

  if($result){
?>
    <div class='alert alert-warning' role='alert'>
      Votre panier est vide !
    </div>            
<?php 
  }       
} 
?>

<?php require_once '\htdocs\layout.php'?>



