<?php require '/home/vol9_5/infinityfree.com/if0_38168562/htdocs/config.php'; ?>

<?php
$title ="Liste des categories";
ob_start();
?>
    <?php $varSell="Sell";$varData="Data";?>
    <?php include ROOT_DIRECTORY.'/include/navAdmin.php'; ?>

<div class="container py-2">

<a href="addCategory.php" class="btn btn-primary">Ajouter Categorie</a>

<table class="table table-striped table-hover">
  <thead>
    <tr><!-- table row--->
      <th>Id</th><!-- table head--->     
      <th>Name</th>  
      <th>Date</th>
      <th>Action</th>
    </tr>
  </thead>

  <tbody>

  <?php 
      require_once ROOT_DIRECTORY.'/include/database.php';

      $sql = "SELECT * FROM categories";

      $sqlPdo = $pdo -> query($sql)
                     -> fetchAll(PDO::FETCH_ASSOC);      

      foreach ($sqlPdo as $row) {  
  ?>              
    <tr>
       <td><?=$row['id_category']?></td>
      
       <td><?=$row['name_category']?></td>
     
       <td><?= date_format(date_create($row['date_category']),"d/m/Y H:i:s")?></td>  

       <td>
             <a href="modif.php?id=<?=$row['id_category']?>" class="btn btn-primary btn-sm">Modifier</a>
             
             <a href="suprim.php?id=<?=$row['id_category']?>" class="btn btn-danger btn-sm"
                onclick="return confirm('Confirmez SVP la suppression de <?=$row['name_category']?>')"  >Suprimer</a>                 
        </td>       
       

    </tr> 

  <?php     
      }                             
  ?>          

  </tbody>        
</table>

</div>

<?php $content = ob_get_clean(); ?>


<?php $varSell="Sell";$varData="Data";?>
<?php include ROOT_DIRECTORY."/layout.php" ?>





