<?php

    require_once '\htdocs\include\database.php';

    $sql="SELECT * FROM items_panier";

    $result=mysqli_query($conn,$sql);

    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $rowcount=mysqli_num_rows($result);

    echo $rowcount; 
  
    $panier=[];
    if($rowcount>0){
        //copier le panier dans un tableau
        foreach($row as $item){
            $panier[$item['id_panier']]=$item;
        }
    } else {
       //Message panier vide
    }

  //  echo "<pre>";
  //  var_dump($panier);
  //  echo "</pre>";

   
?>
