<?php
 
 if(isset($_GET['quantity']) && !empty($_GET['quantity'])){
    $quantity=$_GET['quantity'];
 }

$id_product =2;
$id_user =7;
$price=12;
$quantity=19; 
$total_ligne=180;
$imgSrc="676426991ac5065393058a266climonade.png";

//$id_product = $_GET['id_product']; 
//$price = $_GET['price']; 
//$quantity = $_GET['quantity']; 
//$total_ligne = $_GET['total_ligne'];
//$imgSrc = $_GET['imgSrc'];
//$iduser = bin2hex(random_bytes(32));

require_once '\htdocs\include\database.php';

$sql = "INSERT INTO items_panier (id_product,
                                   id_user,
                                   price,
                                   quantity,
                                   total_ligne,
                                   imgSrc)
            VALUES ('$id_product',
                   '$id_user',
                   '$price',
                   '$quantity',
                   '$total_ligne',
                   '$imgSrc')";

mysqli_query($conn,$sql);

mysqli_close($conn);    




/*
INSERT INTO `items_panier`(
    `id_panier`,
    `id_product`,
    `id_user`,
    `price`,
    `quantity`,
    `total_ligne`,
    `imgSrc`,
    `created_at`
)
VALUES(
    NULL,
    '2',
    '1',
    '12.50',
    '10',
    '188',
    '',
    CURRENT_TIMESTAMP
);

*/