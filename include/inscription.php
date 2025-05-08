<?php require_once '/home/vol9_5/infinityfree.com/if0_38168562/htdocs/config.php'; ?>

<?php
/* $role= array(0 => "",
                1 => "Client",
                2 => "Seller",
                3 => "Admin"); */
$title ="Inscription";
ob_start();
?>
    <?php  include "../front/category/count_items.php"?> 
    <?php include ROOT_DIRECTORY."/include/nav.php"; ?>

     <div class="container justify-content-center py-2 w-75">
     <?php
        if(isset($_POST['inscrire'])){
            $role=1;
            $login=$_POST['login'];           
            $pwd=$_POST['password'];           
            $societe=$_POST['societe'];
            $first_name=$_POST['first_name'];
            $last_name=$_POST['last_name'];
            $adresse=$_POST['adresse'];
            $telephone=$_POST['telephone'];
            $e_mail=$_POST['e_mail'];
            
            $okInputClient=!empty($login) &&
                           !empty($pwd) &&
                           !empty($first_name) &&
                           !empty($last_name) &&
                           !empty($adresse) &&
                           !empty($telephone);                          

            if($okInputClient){

                require_once '../include/database.php';

                $sql = "INSERT INTO users (login,
                                        password,
                                        societe,
                                        first_name,
                                        last_name,
                                        adresse,
                                        telephone,
                                        e_mail,
                                        role) 
                        VALUES (?,?,?,?,?,?,?,?,?)";

                $sqlPdo = $pdo -> prepare($sql);
               
                $sqlPdo -> execute([$login,
                                    $pwd,
                                    $societe,
                                    $first_name,
                                    $last_name,
                                    $adresse,
                                    $telephone,
                                    $e_mail,
                                    $role]);

                //Redirection
                header('location:../include/connexion.php');
               
            } else {
        ?>
            <div class="alert alert-danger text-center text-success" id="alert" role="alert">
                    Remplir S.V.P les champs obligatoires!
            </div>
        <?php
            } 
        }
        ?>

    <!-- id_user	societe	first_name	last_name	adresse	telephone	e_mail -->
    <form method="post">

            <label class="form-label">login<span class="required">*</span></label>
            <input type="text" name="login" class="form-control">                   
            
            <label class="form-label">Password<span class="required">*</span></label>
            <input type="password" name="password" class="form-control">

            <label class="form-label">societe</label>
            <input type="text" name="societe" class="form-control">

            <label class="form-label">first_name<span class="required">*</span></label>
            <input type="text" name="first_name" class="form-control">

            <label class="form-label">last_name<span class="required">*</span></label>
            <input type="text" name="last_name" class="form-control">

            <label class="form-label">adresse<span class="required">*</span></label>
            <input type="text" name="adresse" class="form-control">

            <label class="form-label">telephone<span class="required">*</span></label>
            <input type="tel" name="telephone" class="form-control">

            <label class="form-label">e_mail</label>
            <input type="email" name="e_mail" class="form-control">                                    

            <div class="d-flex mb-3 justify-content-between"> 

                <input type="submit" name="inscrire" value="Inscrire" class="btn btn-primary my-2">

                <p aria-hidden="true" id="required-description">
                    <span class="required">*</span>Required field
                </p>

            </div>
        
    </form>    

    </div>

<?php $content = ob_get_clean(); ?>


<?php require_once ROOT_DIRECTORY.'/layout.php'?>