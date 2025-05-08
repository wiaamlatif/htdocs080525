<?php
$title ="Liste des categories";

$idz=$_GET['id'];

ob_start();
?>
  <?php $varSell="Sell";$varData="Data";?>
  <?php include 'C:\caisse191124\include\navAdmin.php'; ?>

<div class="container py-2">

<table class="table table-striped table-hover">
  <thead>
    <tr><!-- table row--->      
      <th>name category</th>
      <th>total category</th>          
    </tr>
  </thead>

  <tbody>

  <?php 
      require_once 'C:/caisse191124/include/database.php';

      $sql = "SELECT * FROM lignes_ticket
              INNER JOIN tickets    ON tickets.id_ticket = lignes_ticket.id_ticket
              INNER JOIN products   ON lignes_ticket.id_product = products.id_product
              INNER JOIN categories ON categories.id_category = products.id_category 
              WHERE tickets.id_z =?;";

      $sqlPdo = $pdo -> prepare($sql);

      $sqlPdo ->execute([$idz]);
 
      $sqlPdo=$sqlPdo -> fetchAll(PDO::FETCH_ASSOC);
            
      $totalEtatZ=0;
      $som=[];     
      foreach ($sqlPdo as $row) {        
        
        $name_category=$row['name_category'];

        if(isset($som[$name_category])){
          $som[$name_category]+=$row['total_ligne'];
        } else {
          $som[$name_category]=$row['total_ligne'];         
        }                
        $totalEtatZ+=$row['total_ligne']; 

      }//foreach
     
  ?> 
    <?php    
       $tab=array_keys($som);
       foreach ($tab as $row) {                
    ?>
    <tr>
       <td><?= $row ?></td>
      
       <td><?=number_format($som[$row],2)?></td>
                   
    </tr> 

  <?php     
       }                             
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

<?php $content = ob_get_clean(); ?>


<?php $varSell="Tickets";$varData="Data";?>
<?php include "c:/caisse191124/layout.php" ?>





