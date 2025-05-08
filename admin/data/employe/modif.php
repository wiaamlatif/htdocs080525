<?php
    if(isset($_POST['back'])){
      //Redirection
      header('location:index.php');
    }
?>

<?php 
     
     require_once MAINDIRECTORY.'/htdocs/include/database.php';
     
     $id = $_GET['id'];          
     $sqlstm = $pdo -> prepare('SELECT * FROM employees
                                WHERE id_employee  =?;   
                              ');
     
     $sqlstm -> execute([$id]) ;

     $clerck=$sqlstm->fetch(PDO::FETCH_ASSOC);
    
     if(isset($_POST['modifEmploye'])){
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'] ;
 $date_naissance = $_POST['date_naissance'];
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

         
if(empty($_FILES['imgSrc']['name'])){  
  $myImage='default_employe.png';
 } else {
   $myImage=uniqid().$_FILES['imgSrc']['name'];           
   move_uploaded_file($_FILES['imgSrc']['tmp_name'],'C:/caisse191124/uploads/employees/'.$myImage);
 }
           
        if(!empty($first_name) && !empty($last_name) ){

        $sql="UPDATE  employees
              SET     first_name=?,
                      last_name=?,
                      date_naissance=?,
                      date_embauche=?,
                      telephone=?,
                      adresse=?,
                      fonction=?,
                      scolarite=?,
                      imgSrc=?,
                      seller=?,
                      set_z=?
              WHERE   id_employee=?;";

        $sqlstm = $pdo -> prepare($sql);
        
        $inputData= [ $first_name,
                      $last_name,
                      $date_naissance,
                      $date_embauche,
                      $telephone,
                      $adresse,
                      $fonction,
                      $scolarite,
                      $myImage,
                      $seller,
                      $setz,
                      $id
                    ];

        $sqlstm -> execute($inputData);

        //Redirection
        header('location:index.php');                    
                    
       } else {
        echo "
        <div class='alert alert-danger' role='alert'>
          Le nom et le prenom est obligatoire !
        </div>";      
       }
     }
?>
<?php
$title ="Modif employe";
ob_start();
?>
<?php $varSell="Sell";$varData="Data";?>  
<?php include 'C:\caisse191124\include\navAdmin.php'; ?>

<!--MMMMMMMMMMMMMMMMMMMMMMMMMMMM-->
<div class="container">
  <div class="row align-items-center ">
    <div class="col col-4 text-center border border-0 py-5">
      <img class="img img-fluid w-50 " src="/uploads/employees/<?=$clerck['imgSrc']?>" alt="">      
    </div>
    <div class="col col-8 text-left">
      <form method="post" enctype="multipart/form-data">

        <label class="form-label">Prenom</label>
        <input type="text" class="form-control" name="first_name" value="<?=$clerck['first_name']?>">

        <label class="form-label">Nom</label>
        <input type="text" class="form-control" name="last_name" value="<?=$clerck['last_name']?>">

        <label class="form-label">Date_naissance</label>
        <input type="text" class="form-control" name="date_naissance" value="<?=$clerck['date_naissance']?>">

        <label class="form-label">CIN</label>
        <input type="text" class="form-control" name="cin" value="<?=$clerck['cin']?>">

        <label class="form-label">CIN Delivree le</label>
        <input type="date" class="form-control" name="cin_delivre_le" value="<?=$clerck['cin_delivre_le']?>">

        <label class="form-label">Date embauche</label>
        <input type="date" class="form-control" name="date_embauche" value="<?=$clerck['date_embauche']?>">

        <label class="form-label">telephone</label>
        <input type="text" class="form-control" name="telephone" value="<?=$clerck['telephone']?>" >

        <label class="form-label">adresse</label>
        <input type="text" class="form-control" name="adresse" value="<?=$clerck['adresse']?>">

        <label class="form-label">Fonction</label>
        <input type="text" class="form-control" name="fonction" value="<?=$clerck['fonction']?>">

        <label class="form-label">Scolarite</label>
        <input type="text" class="form-control" name="scolarite" value="<?=$clerck['scolarite']?>">

        <!-- label class="form-label">Image</label -->
        <input type="file" class="form-control" name="imgSrc">

        <div class="d-flex mb-3 justify-content-left">

          <input class="form-check-input" type="checkbox"
          <?php
            if($clerck['seller']==1){
          ?>
            checked
          <?php
            }
          ?> 
          value="1" name="seller" 
          >
          <label class="form-check-label">
            Seller
          </label>

          <input class="form-check-input" type="checkbox"
          <?php
            if($clerck['set_z']==1){
          ?>
            checked
          <?php
            }
          ?> 
          value="1" name="setz" 
          >
          <label class="form-check-label">
            Set Z
          </label>

        </div>

        <input type="submit" value="Modifier" class="btn btn-primary my-2" name="modifEmploye">

      </form>      
    </div>
  </div>
</div>
<!--MMMMMMMMMMMMMMMMMMMMMMMMMMMM-->

<?php $content = ob_get_clean(); ?>



<?php $varSell="Sell";$varData="Data";?>
<?php include MAINDIRECTORY."/htdocs/layout.php" ?>