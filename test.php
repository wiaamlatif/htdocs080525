<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

require_once '\htdocs\include\database.php';

$sql="SELECT * FROM items_panier";

$result=mysqli_query($conn,$sql);

$row = mysqli_fetch_all($result, MYSQLI_ASSOC);

$rowcount=mysqli_num_rows($result);

$panier=[];
if($rowcount>0){
    //copier le panier dans un tableau
    foreach($row as $item){
        $panier[$item['id_panier']]=$item;
    }
} else {
   //Message panier vide
}

echo "<pre>";
var_dump($panier[3]['quantity']);
echo "</pre>";

?>

    
</body>
</html>