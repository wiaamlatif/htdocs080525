<?php $title ="Etat Z"; ?>

<?php ob_start();?>

  <?php $varSell="Sell";$varData="Data";?>
  <?php include 'C:\caisse191124\include\navAdmin.php'; ?>

<div class="container py-2">   
  
    <div class="d-flex py-2">
      <a href="addEtatz.php" class="btn btn-danger  mx-1">Z</a>          
      <a href="addEtatz.php" class="btn btn-success mx-1">X</a>
    </div>

    <div class="row">
          
        <table class="table table-striped table-hover">
          <thead>
            <tr><!-- table row--->
              <th width="5%">Nr Z</th>
              <th width="15%" style="text-align:center;">Date</th>
              <th width="15%">Nr Ticket Debut</th>          
              <th width="15%">Nr Ticket Fin</th>          
              <th width="10%">Total</th>                
              <th width="10%" style="text-align: center;">Action</th>                           
            </tr>
          </thead>
          <tbody>
          <?php 
              require_once 'C:/caisse191124/include/database.php';

              $sql = "SELECT * FROM etat_z ;";       
              $listeEtatZ = $pdo -> query($sql)
                                 -> fetchAll(PDO::FETCH_ASSOC);

                     $totalEtatZ=0;
                     foreach ($listeEtatZ as $EtatZ){ 
                        $idz=$EtatZ['id_z'];                
                        $totalEtatZ+=$EtatZ['total_z'];
          ?>              
            <tr>
                <td><?=$idz?></td>                            
                <td><?= date_format(date_create($EtatZ['date_z']),"d/m/Y H:i:s")?></td>
                <td style="text-align:center;"><?=$EtatZ['nr_tk_debut']?></td>
                <td style="text-align:center;"><?=$EtatZ['nr_tk_fin']?></td>
                <td><?=$EtatZ['total_z']?></td>               
                <td>
                  <div class="d-flex py-2">                    
                    <a href="detailTicket.php?id=<?=$idz?>" class="btn btn-danger btn-sm mx-1">Detail</a>
                    <a href="detailCategory.php?id=<?=$idz?>" class="btn btn-primary btn-sm mx-1">Category</a>
                    <a href="detailItem.php?id=<?=$idz?>" class="btn btn-info btn-sm mx-1">Items</a>
                    <a href="detailSeller.php?id=<?=$idz?>" class="btn btn-warning btn-sm mx-1">Sellers</a>
                    <a href="detailClient.php?id=<?=$idz?>" class="btn btn-success btn-sm mx-1">Clients</a>
                  </div>
                </td>    
            </tr>  
          <?php     
              }                             
          ?>          
          </tbody> 
          <tfoot>
            <tr>
              <th colspan="4" style="text-align:right;" ><strong>Total</strong></th>
              <th id="thtotalTicket"><strong><?=$totalEtatZ?></strong></th>
            </tr>                
          </tfoot> 
    
        </table>        
                                           
    </div><!---row--->

</div><!-----container py-2 --->

<?php $content = ob_get_clean(); ?>

<?php require_once 'C:\caisse191124\layout.php'; ?>  



