<?php require_once '/home/vol9_5/infinityfree.com/if0_38168562/htdocs/config.php'; ?>

<?php
      session_start();

      //echo $_SERVER['PHP_SELF'];

      $textNav = array(
                        0 => "Dashboard",
                        1 => "Categories",
                        2 => "Products",
                        3 => "Sells",
                        4 => "Commandes",
                        5 => "Livraisons",
                        6 => "Tickets",
                        7 => "X/Z",
                        8 => "Users",
                        9 => "Employes",
                       10 => "Clients",
                       11 => "Fournisseurs",
                       12 => "Deconnexion"
      );

      $urlNav = array(
                       0 => "/admin/index.php",
                       1 => "/admin/category/index.php",
                       2 => "/admin/product/index.php",
                       3 => "/admin/sell/index.php",
                       4 => "/admin/sell/commande/index.php",
                       5 => "/admin/sell/livraison/index.php",
                       6 => "/admin/sell/ticket/index.php",
                       7 => "/admin/sell/x_z/index.php",                       
                       8 => "/admin/data/index.php",
                       9 => "/admin/data/user/index.php",
                      10 => "/admin/data/employe/index.php",
                      11 => "/admin/data/client/index.php",
                      12 => "/admin/data/fournisseur/index.php",
                      13 => "/include/deconnexion.php",
                      14 => "/admin/category/addCategory.php",
                      15 => "/admin/category/modif.php",
                      16 => "/admin/product/addProduct.php",                      
                      17 => "/admin/product/modif.php",
                      18 => "/admin/sell/ticket/edit.php",
                      19 => "/admin/sell/ticket/print.php",
                      20 => "/admin/sell/ticket/suprim.php",
                      21 => "/admin/sell/x_z/detailTicket.php",
                      22 => "/admin/sell/x_z/detailCategory.php",
                      23 => "/admin/sell/x_z/detailItem.php",
                      24 => "/admin/sell/x_z/detailSeller.php",
                      25 => "/admin/sell/x_z/detailClient.php",
                      26 => "/admin/data/employe/add_employe.php",
                      27 => "/admin/data/employe/detail_employe.php"                      
      ); 

      for ($i=0; $i < count($urlNav) ; $i++) { 
        $coloredNav[$i]="";
      }
      
      //echo $_SERVER['PHP_SELF'];

      $showBack=false;
      // in_array(array_search($_SERVER['PHP_SELF'],$urlNav),range(21,25));

      $clickedNav=array_search($_SERVER['PHP_SELF'],$urlNav);

      if(in_array($clickedNav,range(14,15))){$clickedNav=1;}
      if(in_array($clickedNav,range(16,17))){$clickedNav=2;}

      if(in_array($clickedNav,range(18,20))){$clickedNav=6;}

      if(in_array($clickedNav,range(21,25))){$clickedNav=7;} //$showBack=true;}

      if(in_array($clickedNav,range(26,27))){$clickedNav=8;}
            
      $sellColored=(in_array($clickedNav,range(3,7)) ? "bg-primary text-white active" :"");

      $dataColored=(in_array($clickedNav,range(8,12)) ? "bg-primary text-white active" :"");

      $coloredNav[$clickedNav]= "bg-primary text-white active";
                  
      $countItems=0;      
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">

  <div class="container-fluid">
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link <?=$coloredNav[0]?>" href="/admin/index.php">Dashboard</a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?=$coloredNav[1]?>" href="/admin/category/index.php">Categories</a>
            </li>

            <li class="nav-item">
            <a class="nav-link <?=$coloredNav[2]?>"     href="/admin/product/index.php">Products</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link 
                <?php
                      if($clickedNav===3){
                ?>
                         <?="dropdown-toggle"?>
                <?php
                      }
                ?>
                <?=$sellColored?>" href="/admin/sell/index.php" 
                <?php
                      if($clickedNav===3){                      
                ?>
                      data-bs-toggle="dropdown"        
                <?php
                      } 
                ?>                
                > <!---Fermeture tag a --->
                    <?=$varSell?>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item <?=$coloredNav[4]?>" href="<?=$urlHost.$urlNav[4]?>">Commandes</a></li>
                    <li><a class="dropdown-item <?=$coloredNav[5]?>" href="<?=$urlHost.$urlNav[5]?>">Livraisons</a></li>
                    <li><a class="dropdown-item <?=$coloredNav[6]?>" href="<?=$urlHost.$urlNav[6]?>">Tickets</a></li>
                    <li><a class="dropdown-item <?=$coloredNav[7]?>" href="<?=$urlHost.$urlNav[7]?>">X/Z</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link 
                <?php
                      if($clickedNav===8){
                ?>
                         <?="dropdown-toggle"?>
                <?php
                      }
                ?>
                <?=$dataColored?>" href="<?=$urlHost.$urlNav[8]?>" 
                <?php
                      if($clickedNav===8){                      
                ?>
                      data-bs-toggle="dropdown"        
                <?php
                      } 
                ?>                
                > <!---Fermeture--->
                    <?=$varData?>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item <?=$coloredNav[9] ?>" href="<?=$urlHost.$urlNav[9]?>">Users</a></li>
                    <li><a class="dropdown-item <?=$coloredNav[10]?>" href="<?=$urlHost.$urlNav[10]?>">Employes</a></li>
                    <li><a class="dropdown-item <?=$coloredNav[11]?>" href="<?=$urlHost.$urlNav[11]?>">Clients</a></li>
                    <li><a class="dropdown-item <?=$coloredNav[12]?>" href="<?=$urlHost.$urlNav[12]?>">Fournisseurs</a></li>
                </ul>
            </li>

            <li class="nav-item">
            <a class="nav-link <?=$coloredNav[13]?>"     href="/include/deconnexion.php">Deconnexion</a>
            </li>

      </ul>      
      </div>
      
      <a href="<?php ROOT_DIRECTORY?>/index.php" class="btn"><h3><span class="badge text-bg-dark text-white">Front side</span></h3></a>
    
  </div>
</nav>