<?php require '/home/vol9_5/infinityfree.com/if0_38168562/htdocs/config.php'; ?>
<?php
$title ="Add a employe";
ob_start();
?>
<?php $varSell="Sell";$varData="Data";?>  
<?php include ROOT_DIRECTORY.'/include/navAdmin.php'; ?>

<?php        
        require_once ROOT_DIRECTORY.'/include/database.php';
/*
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

        if(isset($_POST['AddEmploye'])){
               
               $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'] ;
           $date_naissance = $_POST['date_naissance'];
                      $cin = $_POST['cin'] ;
           $cin_delivre_le = $_POST['cin_delivre_le'];
            $date_embauche = $_POST['date_embauche'];
                $telephone = $_POST['telephone'];
                  $adresse = $_POST['adresse'];
                 $fonction = $_POST['fonction'] ;
                $scolarite = $_POST['scolarite'];
                   $seller = $_POST['seller'];
                     $setz = $_POST['setz'];

          if(isset($seller)){
            $seller=1;
          }else{
            $seller=0;
          }

          if(isset($setz)){
            $setz=1;
          }else{
            $setz=0;
          }

       //   echo "<pre>";
       //   var_dump($_FILES['imgSrc']);
        //  echo "</pre>";
        //  die();

                                                      
          if(!empty($first_name) && !empty($last_name)){
          
          echo "<pre>";
          var_dump($_FILES['imgSrc']);
          echo "</pre>";

          echo "<pre>";
          var_dump($_POST);
          echo "</pre>";

          if(empty($_FILES['imgSrc']['name'])){
           $myImage='default_employe.png';
          } else {
            $myImage=uniqid().$_FILES['imgSrc']['name'];           
            move_uploaded_file($_FILES['imgSrc']['tmp_name'],'/home/vol9_5/infinityfree.com/if0_38168562/htdocs/uploads/employees/'.$myImage);
          }

          $sql="INSERT INTO employees (
                              first_name,
                              last_name,
                              date_naissance,
                              cin,
                              cin_delivre_le,
                              date_embauche,
                              telephone,
                              adresse,
                              fonction,
                              scolarite,
                              imgSrc,
                              seller,
                              set_z) 
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
                                                
          $sqlstm = $pdo -> prepare($sql);

          $inputData= [$first_name,
                       $last_name,
                       $date_naissance,
                       $cin,
                       $cin_delivre_le,
                       $date_embauche,
                       $telephone,
                       $adresse,
                       $fonction,
                       $scolarite,
                       $myImage,
                       $seller,
                       $setz
                      ];
                        
          $sqlstm -> execute($inputData);

          //Redirection
          header('location:index.php');
             
          } else {
             echo "
                    <div class='alert alert-danger' role='alert'>
                      Le nom et le prenom sont obligatoires !
                    </div>
                  ";
          }          

         }
    ?>      

    <div class="container py-2 w-50">

      <form method="post" enctype="multipart/form-data">

        <label class="form-label">Prenom</label>
        <input type="text" class="form-control" name="first_name">
        
        <label class="form-label">Nom</label>
        <input type="text" class="form-control" name="last_name">

        <label class="form-label">Date naissance</label>
        <input type="date" class="form-control" name="date_naissance">

        <label class="form-label">CIN</label>
        <input type="text" class="form-control" name="cin">

        <label class="form-label">CIN Delivree le</label>
        <input type="date" class="form-control" name="cin_delivre_le">

        <label class="form-label">Date embauche</label>
        <input type="date" class="form-control" name="date_embauche">

        <label class="form-label">telephone</label>
        <input type="text" class="form-control" name="telephone">

        <label class="form-label">adresse</label>
        <input type="text" class="form-control" name="adresse">

        <label class="form-label">Fonction</label>
        <input type="text" class="form-control" name="fonction">

        <label class="form-label">Scolarite</label>
        <input type="text" class="form-control" name="scolarite">

        <label class="form-label">Image</label>
        <input type="file" class="form-control" name="imgSrc">

        <div class="d-flex mb-3 justify-content-left"> 
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="seller">
            <label class="form-check-label">
            Seller
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="setz">
            <label class="form-check-label">
            Set Z
            </label>
          </div>
        </div>

        <input type="submit" value="AddEmploye" class="btn btn-primary my-2" name="AddEmploye">

      </form>

    </div>

<?php $content = ob_get_clean(); ?>

<?php $varSell="Sell";$varData="Data";?>
<?php include ROOT_DIRECTORY."/layout.php" ?>