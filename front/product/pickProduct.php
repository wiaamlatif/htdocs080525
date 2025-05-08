<?php
    session_start();

    if(isset($_SESSION['idTicket'])){

        $idTicket=$_SESSION['idTicket'];

    }

    if(isset($_GET['idProduct'])){

        $idProduct= $_GET['idProduct']; 
        $_SESSION['idProduct'] = $idProduct;
    }

    if(isset($_SESSION['idEmployee'])){
        $idEmployee=$_SESSION['idEmployee'];
    }



 
    require_once "\htdocs\include\database.php";

    $sql="SELECT COUNT(`id_product`) as countProduct FROM lignes_ticket     
           WHERE `id_ticket` =$idTicket
             AND `id_product`=$idProduct;";
             
    $result = mysqli_query($conn, $sql);

    $countIdProduct = mysqli_fetch_assoc($result);

    $countProduct = $countIdProduct['countProduct'];
        
    if($countProduct>0){
       
       $sql="SELECT id_ligne_ticket  FROM lignes_ticket     
              WHERE `id_ticket` =$idTicket
                AND `id_product`=$idProduct;";
         
        $result = mysqli_query($conn, $sql);

        $LineTicket = mysqli_fetch_assoc($result);

        $_SESSION['selectedRowTicket']= $LineTicket['id_ligne_ticket'];  
        $_SESSION['maxIdLinesTicket'] = 0;  

    //   echo 'The product alrady exist !';
    } else {

        $sql= "INSERT INTO  `lignes_ticket`
                           (`id_ticket`,
                            `id_product`,
                            `quantity`)
                    VALUES('$idTicket',
                           '$idProduct',
                           '1');";

        $result = mysqli_query($conn,$sql);

        if ($result) {            
        
            $_SESSION['selectedRowTicket'] = mysqli_insert_id($conn); 
            $_SESSION['maxIdLinesTicket'] = $_SESSION['selectedRowTicket'];

        }

//>> totalTicket

        $sql="SELECT SUM(products.price*lignes_ticket.quantity) as sumTicket FROM lignes_ticket
              INNER JOIN products ON lignes_ticket.id_product = products.id_product
                   WHERE lignes_ticket.id_ticket = $idTicket;";
                 
        $result = mysqli_query($conn, $sql);

        $product = mysqli_fetch_assoc($result);
  
        $totalTicket=$product['sumTicket'];//$product['sumTicket'];
        
        $sql=" UPDATE  `tickets`
                  SET   total_ticket = $totalTicket 
                WHERE      id_ticket = $idTicket;";

        $result = mysqli_query($conn, $sql); 

    }

    $data = [
              'idEmployee' => $idEmployee,
                'idTicket' => $idTicket                      
            ];

    print_r(json_encode($data));        
        //==================================    

/*
`lignes_ticket`
id_ligne_ticket
id_ticket
id_product
price
quantity
total_ligne	
*/
?>