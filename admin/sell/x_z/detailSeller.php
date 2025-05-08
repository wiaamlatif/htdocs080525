<?php
$title ="Liste des categories";

$idz=$_GET['id'];

ob_start();
?>
  <?php $varSell="Sell";$varData="Data";?>
  <?php include 'C:\caisse191124\include\navAdmin.php'; ?>  
  <?php 

  require_once 'C:/caisse191124/include/database.php';

  $sql = "SELECT
                tickets.id_z,
                lignes_ticket.id_ligne_ticket,
                categories.id_category,
                categories.name_category,
                lignes_ticket.id_product,
                products.name_product,
                products.price,
                lignes_ticket.quantity,
                lignes_ticket.total_ligne
          FROM
                lignes_ticket
          INNER JOIN tickets ON tickets.id_ticket = lignes_ticket.id_ticket
          INNER JOIN products ON lignes_ticket.id_product = products.id_product
          INNER JOIN categories ON categories.id_category = products.id_category
          WHERE
                tickets.id_z = ?
          ORDER BY
                categories.id_category,
                lignes_ticket.id_product;";

  $sqlPdo = $pdo -> prepare($sql);

  $sqlPdo ->execute([$idz]);

  //lignes_ticket, name_Category, name_product, Quantity, total_lignes 
  $items=$sqlPdo -> fetchAll(PDO::FETCH_ASSOC); 

  //Extraire les categories
  $listCategory=[];   
  foreach($items as $item){

    $idCategory=$item['id_category'];          
    $listCategory[$idCategory]=$item['name_category'];         

  }

  //somCategory
  foreach($listCategory as $category){//1

    $somCategory[$category]=0;
    foreach($items as $item){//2

      $nameCategory=$item['name_category'];
      if($nameCategory==$category){
      $somCategory[$category]+=$item['total_ligne'];          
    }      
    }//2   
  }//1

  //Extraire les produits
  $listProduct=[];   
  foreach($items as $item){

  $idProduct=$item['id_product'];          
  $listProduct[$idProduct]=[$item['name_category'],$item['name_product']]; 

  }


  //somProduct, somQuantity, price,   
  foreach($listProduct as $product){//1

    $somProduct[$product[1]]=0;
    $somQuantity[$product[1]]=0;        
    foreach($items as $item){//2

      $nameProduct=$item['name_product'];
      if($nameProduct==$product[1]){           
        $price[$product[1]]=$item['price'];
        $somProduct[$product[1]]+=$item['total_ligne'];
        $somQuantity[$product[1]]+=$item['quantity'];
      //   echo $item['name_product']."...".$item['quantity']."....".$item['total_ligne']."<br>";
      } //if     
    }//2  
    // echo  $product."...".$price[$product]
    //               ."...".$somQuantity[$product]
    //               ."...".$somProduct[$product]."<br>";              
  }//1

  //....Table for datail Items 
  /*
  foreach($listCategory as $category){//1

  echo $category."....".$somCategory[$category]."<br>";

  foreach($listProduct as $product){//2

  if($product[0]==$category){                       
  echo str_repeat("&nbsp",10);
  echo $product[1]."......";
  echo $price[$product[1]]."......";
  echo $somQuantity[$product[1]]."......";
  echo $somProduct[$product[1]]."<br>";

  }//if

  }//2

  }//1
  */

?>  

<div class="container text-center">
  <div class="row justify-content-md-center">
    <div class="col col-10">


      <table class="table caption-top table-striped table-bordered">
        <caption >Detail Items</caption>
        <thead>
          <tr><!-- table row--->  
          <!--
          <th>name category</th>
          <th>total category</th>  
          -->
          </tr>
        </thead>
        <tbody>

            <?php    
            $totalEtatZ=array_sum($somCategory);   
            foreach($listCategory as $category){//1
            ?>

            <tr>
              <td colspan="2">
                <table class="table mb-0">
                  <thead>
                    <tr class="trDetailItem">
                      <th class="thDetailItem">Product</th>
                      <th class="thDetailItem">Quantity</th>
                      <th class="thDetailItem">Price</th>
                      <th class="thDetailItem">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                <!-------------------->
                <?php  
                foreach($listProduct as $product){//2
                if($product[0]==$category){ //if                      
                ?>
                <tr class="trDetailItem">                  
                <td class="tdDetailItem"><?=$product[1]?></td>
                <td class="tdDetailItem"><?=$price[$product[1]] ?></td>
                <td class="tdDetailItem"><?=$somQuantity[$product[1]] ?></td>                  
                <td class="tdDetailItem"><?=number_format($somProduct[$product[1]],2)?></td>                  
                </tr>

                <?php 
                }//if
                }//2 
                ?>
                <!-------------------->                                

                  </tbody>
            
                </table>              
              </td>
            </tr>


            <tr class="trCategory">    
              <td class="tdNameCategory"><?=$category?></td>                     
              <td class="tdSomCategory"><?=number_format($somCategory[$category],2)?></td>
            </tr> 

            <?php     
            } //1                              
            ?>      
          </tbody> 
          <tfoot>
            <tr>
            <td style="text-align:right;"><strong>Total</strong></td>
            <td><strong><?=number_format($totalEtatZ,2)?></strong></td>      
            </tr>                
          </tfoot>        
      </table>

    </div>  
  </div>
</div>


  


<?php $content = ob_get_clean(); ?>


<?php $varSell="Tickets";$varData="Data";?>
<?php include "c:/caisse191124/layout.php" ?>









