<?php require_once '/home/vol9_5/infinityfree.com/if0_38168562/htdocs/config.php'; ?>

<?php
//Dans connexion.php => role 
/* $role= array(0 => "", //..
                1 => "Client",  //../client/index.php
                2 => "Seller", //../seller/index.php
                3 => "Admin"); //../admin/index.php*/

$title ="Connexion";
ob_start();
?>
    <?php  include ROOT_DIRECTORY."/front/category/count_items.php"?> 
    <?php  include 'nav.php';?>
    <?php
       if(isset($_POST['connexion'])){

        $login=$_POST['login'];
          $pwd=$_POST['password'];

         if(!empty($login) && !empty($pwd)){

            require_once 'database.php';

            $sql = "SELECT * FROM users
                    WHERE login = ?
                    and password = ?";

            $sqlPdo = $pdo -> prepare($sql);

            $sqlPdo -> execute([$login,$pwd]);

            $user=$sqlPdo -> fetch(PDO::FETCH_ASSOC);
           
            $find=$sqlPdo -> rowCount()>0;

            if($find){                
                        session_start();
                        $_SESSION['user'] = $user; 

                        switch ($user['role']) {
                            case 0:
                                 ;//           
                            break;
                            case 1:
                                header('location:..\client\index.php');
                            break;
                            case 2:
                                header('location:..\seller\index.php');
                            break;
                            case 3:
                                header('location:..\admin\index.php');            
                            break;            
                            default:
                        //code block
                        } ;//fin block switch 
                        // echo "==================================";
                        // echo "<pre>";
                        // var_dump($user);
                        // echo "</pre>";                        
                     } else {
    ?>
            <div class="alert alert-danger text-center text-success" id="alert" role="alert">
                Login ou mot de passe incorrects !
            </div>

                         
    <?php

                     }            
         } else {
    ?>
            <div class="alert alert-danger text-center text-success" id="alert" role="alert">
                Login et mot de passe sont obligatoires!
            </div>
    <?php        
         }
       }
    ?>
    <form method="post">
        <div class="container">
            <label class="form-label">Login</label>
            <input type="text" name="login" class="form-control">

            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control">

            <input type="submit" name="connexion" value="Connexion" class="btn btn-primary my-2">
        </div>
    </form>    


<?php $content = ob_get_clean(); ?>


<?php require_once ROOT_DIRECTORY.'/layout.php'?>

