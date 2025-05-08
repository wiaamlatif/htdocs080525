<?php
require_once MAINDIRECTORY.'/htdocs/include/database.php';

$idClerk = $_GET['id'];

$sqlstm = $pdo -> prepare('SELECT * FROM employees
                           WHERE id_employee=?;');

$sqlstm -> execute([$idClerk]); 

$clerk= $sqlstm -> fetch(PDO::FETCH_ASSOC);

/*
echo "<pre>";
var_dump($clerk);
echo "</pre>";
die();
*/
?>
<?php
/*<?php $varSell="Sell";$varData="Data";?>
id_employee
first_name	
last_name	
date_naissance	
cin	cin_delivre_le	
telephone	
adresse	
fonction	
scolarite	
imgSrc	
seller	
set_z	
date_embauche	
created_at	
*/
?>


<?php
$title ="Detail Employe";
ob_start();
?>
<?php $varSell="Sell";$varData="Data";?>  
<?php include MAINDIRECTORY.'/htdocs/include/navAdmin.php'; ?>

<div class="container py-2">
      <div class="container">
        <div class="row align-items-center">

          <div class="col-md-6 text-center">
            <h4><?=$clerk['first_name']?></h4>
            <img class="img img-fluid w-50" src="/uploads/employees/<?=$clerk['imgSrc']?>" alt="" >           
          </div>

          <div class="col-md-6">

            <table class="table">
              <tbody>
                <tr>
                  <th>First name</th>
                  <td><?=$clerk['first_name']?></td>
                </tr>
                <tr>
                  <th>Last name</th>
                  <td><?=$clerk['last_name']?></td>
                </tr>
                <tr>
                <th>Date naissance</th>
                <td><?=date_format(date_create($clerk['date_naissance']),format:'d/m/Y')?></td>
                </tr>
                <tr>
                <th>CIN</th>
                <td><?=$clerk['cin']?></td>
                </tr>
                <tr>
                <th>CIN Delivree le :</th>
                <td><?=date_format(date_create($clerk['cin_delivre_le']),format:'d/m/Y')?></td>
                </tr>                                
                <tr>
                <th>Telephone</th>
                <td><?=$clerk['telephone']?></td>
                </tr>
                <tr>
                  <th>Adresse</th> 
                  <td><?=$clerk['adresse']?></td>
                </tr>
                <tr>
                  <th>Fonction</th> 
                  <td><?=$clerk['fonction']?></td>
                </tr>
                <tr>
                  <th>Scolarite</th> 
                  <td><?=$clerk['scolarite']?></td>
                </tr>
                <tr>
                  <th>Seller</th> 
                  <td>
                    <input class="form-check-input input-bg input-black" type="checkbox"
                    <?php
                      if($clerk['seller']==1){
                    ?>
                      checked
                    <?php
                      }
                    ?> 
                    value="1" name="seller" disabled
                    >
                  </td>
                </tr>
                <tr>
                  <th>Set Z</th> 
                  <td>
                    <input class="form-check-input" type="checkbox"
                    <?php
                      if($clerk['set_z']==1){
                    ?>
                      checked
                    <?php                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
                      }
                    ?> 
                    value="1" name="setz" disabled
                    >
                  </td>                                    
                </tr>
                <tr>
                <th>Date embauche</th>
                <td><?=date_format(date_create($clerk['date_embauche']),format:'d/m/Y')?></td>
                </tr>
                <tr>
                <th>Date saisie</th>
                <td><?=date_format(date_create($clerk['created_at']),format:'d/m/Y')?></td>
                </tr>                

                  
              </tbody>
            </table>    

            <div class="d-flex mb-3 justify-content-center"> 

                <a href="modif.php?id=<?=$idClerk?>" class="btn btn-primary btn-sm mx-1">Modifier</a>
              
                <a href="suprim.php?id=<?=$idClerk?>" class="btn btn-danger btn-sm"
                    onclick="return confirm('Confirmez SVP la suppression de <?=$clerk['first_name']?>')">Suprimer</a>                     

            </div>            
                  
          </div>  

        </div>
      </div>
    </div>
 

<?php $content = ob_get_clean(); ?>

<?php $varSell="Sell";$varData="Data";?>
<?php include MAINDIRECTORY."/htdocs/layout.php" ?>