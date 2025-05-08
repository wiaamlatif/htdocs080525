<?php

echo "Working";

$cartData=$_POST['cartData'];
$idProduct=$cartData[0]['idProduct'];
$price = $cartData[0]['price'];
$quantity = $cartData[0]['quantity'];

echo "<pre>";
var_dump($cartData);
echo "</pre>";

if(!empty($cartData)){

    require_once "\htdocs\include\database.php";
    //==============================
    //==============================
    $sql = "SELECT * FROM items_panier WHERE id_product= '$idProduct'";

$rowcount=0;
if ($result=mysqli_query($conn,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result); 
  }
  
  if($rowcount>0){
    //update
  $sql=" UPDATE 
               `items_panier`
         SET             
              `price`     = $price,
              `quantity`  = $quantity,
              `created_at`= CURRENT_TIMESTAMP
         WHERE
              id_product = $idProduct ;";


  } else {
   // insert

   $sql="INSERT INTO `items_panier` 
                    (
                      `id_product`, 
                      `price`, 
                      `quantity`, 
                      `created_at`)
              VALUES 
                    (
                     $idProduct,
                     $price,
                     $quantity,
                     CURRENT_TIMESTAMP);";

  }

  $result = mysqli_query($conn,$sql);
  
  mysqli_close($conn);

}

