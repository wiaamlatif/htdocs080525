<?php $title ="Panier"; ?>

<?php ob_start();?>

<?php

    require_once "\htdocs\include\database.php";

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

                        require_once "\htdocs\include\database.php";

                        $sql = "SELECT * FROM items_panier
                                INNER JOIN products ON items_panier.id_product = products.id_product
                                INNER JOIN categories ON categories.id_category = products.id_category";
                                
              
                        $result = mysqli_query($conn, $sql);
                                      
                        $prdPanier = mysqli_fetch_all($result, MYSQLI_ASSOC);

                       // echo "<pre>";
                       // var_dump($prdPanier);
                       // echo "</pre>";

                        }
                      ?>              
                      <?php   
                      
                        $totalPanier=0;
                        foreach ($prdPanier as $produit){ 
                        $idPanier=$produit['id_panier'];
                        $idProduct=$produit['id_product'];
                        $idCategory=$produit['id_category'];                        
                        $quantityItem=$produit['quantity'];
                        $price=$produit['price'];
                        $totalItem=$quantityItem * $price;                        
                        $totalPanier+=$totalItem;               
                        $imgSrc=$produit['imgSrc'];        
                      ?>              
                      <tr class="row<?=$idPanier?>" data-id="<?=$idPanier?>">
                        <td class="col1"><?=$idPanier?></td>

                        <td class="col2"><?=$idProduct?></td>

                        <td class="col3"><?=$produit['name_category']?></td>

                        <td class="col4">            
                        <img class="img img-fluid" src="/uploads/products/<?=$produit['imgSrc']?>" width="70px" alt="">
                        </td>           

                        <td class="col5"><?=$produit['name_product']?></td>
                            
                        <td class="col6 d-flex mb-3 justify-content-center"><!---Quantity------>  
                          <button class="supItemCart btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></button>               
                          <button class="decrementPanier btn btn-primary">-</button>
                          <span class="quantity"><?=number_format($quantityItem,0)?></span>
                          <button class="incrementPanier btn btn-primary">+</button>               
                        </td><!---Quantity------>                                                        

                        <td class="col7"><?=number_format($price,2)?></td>

                        <td class="col8"><?=number_format($totalItem,2)?></td>

                      </tr>  
                      <?php     
                      }                             
                      ?>          
                  </tbody> 
                  <tfoot>
                    <tr>
                      <td colspan="6" style="text-align:right;" ><strong>Total</strong></td>
                      <td><strong class="tdtotalPanier"><?=number_format($totalPanier,2)?></strong></td>
                    </tr>    
                    <tr>
                      <td colspan="6" style="text-align:right;" >
                        <button class="valider btn btn-success">valider</button>
                        <button class="vider btn btn-danger">vider</button>
                      </td>          
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
<div id="result"></div>
<?php $content = ob_get_clean(); ?>


<?php require_once 'C:\htdocs\layout.php'?>



