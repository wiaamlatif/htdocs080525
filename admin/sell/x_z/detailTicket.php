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
      <th>Id</th><!-- table head--->     
      <th>User</th>
      <th>Date</th>
      <th>nr_ticket</th>
      <th>total_ticket</th>     
      <th>Action</th>
    </tr>
  </thead>

  <tbody>

  <?php 
      require_once 'C:/caisse191124/include/database.php';

      $sql = "SELECT * FROM tickets
              INNER JOIN users 
              ON tickets.id_user = users.id_user
              WHERE tickets.id_z = ?;";


      $sqlPdo1 = $pdo -> prepare($sql);

      $sqlPdo1 ->execute([$idz]);
 
      $sqlPdo=$sqlPdo1 -> fetchAll(PDO::FETCH_ASSOC);
     
      $totalEtatZ=0;
      foreach ($sqlPdo as $row) { 
        $totalEtatZ+=$row['total_ticket'];      
  ?>              
    <tr>
       <td><?=$row['id_ticket']?></td>
      
       <td><?=$row['login']?></td>

       <td><?= date_format(date_create($row['date_ticket']),"d/m/Y H:i")?></td>         

       <td><?=$row['nr_ticket']?></td>

       <td><?=$row['total_ticket']?></td>
     
       <td>
          
          <a href="edit.php?id=<?=$row['id_ticket']?>" class="btn btn-primary btn-sm">Editer</a>             

          <a href="print.php?id=<?=$row['id_ticket']?>" class="btn btn-success btn-sm" onclick="return confirm('Imprimer le ticket Nr <?=$row['nr_ticket']?> ?')"><i class="fa-solid fa-print"></i></a>                 

          <a href="suprim.php?id=<?=$row['id_ticket']?>" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer le ticket Nr <?=$row['nr_ticket']?> ?')">Suprimer</a>                 
          
        </td>       
       
    </tr> 

  <?php     
      }                             
  ?>          
  </tbody> 
  <tfoot>
            <tr>
              <th colspan="4" style="text-align:right;" ><strong>Total</strong></th>
              <th id="thtotalTicket"><strong><?=number_format($totalEtatZ,2)?></strong></th>
            </tr>                
          </tfoot>        
</table>

</div>

<?php $content = ob_get_clean(); ?>


<?php $varSell="Tickets";$varData="Data";?>
<?php include "c:/caisse191124/layout.php" ?>





