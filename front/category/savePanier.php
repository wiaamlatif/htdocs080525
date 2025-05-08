<?php

$cartData=$_POST['cartData'];

echo "Working";

// Check if data is received
if (!empty($cartData)) {
    
        require_once 'database.php';    
    //==============================
    //==============================
    
        $sqlValues="";
        foreach ($cartData as $row) { 
    
          $idProduct = $row['idProduct'];
              $price = $row['price'];
           $quantity = $row['quantity'];
    
        $sqlValues .= "(NULL,".$idProduct.",".$price.",".$quantity.","."CURRENT_TIMESTAMP),";
    
        }
        
        $sqlValues=substr($sqlValues, 0, -1);
    
        
    
        $sql="INSERT INTO `items_panier` 
                    (`id_panier`,
                     `id_product`, 
                     `price`, 
                     `quantity`, 
                     `created_at`)
             VALUES $sqlValues";
        
    
        mysqli_query($conn, $sql);
    
        mysqli_close($conn); 
    
    }  
    


