<?php 
  session_start();

        if(isset($_GET['idTicket'])){

         $idTicket = $_GET['idTicket'];
         $_SESSION['idTicket']=$idTicket;
       
        } 

        $pickedProduct=0;
        if(isset($_SESSION['idProduct'])){
           $pickedProduct = $_SESSION['idProduct']; 
        }

        $selectedRowTicket=0;
        if(isset($_SESSION['selectedRowTicket'])){
           $selectedRowTicket=$_SESSION['selectedRowTicket'];
        }
         
        $maxIdLinesTicket=0;
        if(isset($_SESSION['maxIdLinesTicket'])){
           $maxIdLinesTicket=$_SESSION['maxIdLinesTicket'];
        }

        require_once "\htdocs\include\database.php";
    
        //>> feed new items of the new ticket=cart
        $sql = "SELECT * FROM lignes_ticket
        INNER JOIN tickets       ON tickets.id_ticket  = lignes_ticket.id_ticket
        INNER JOIN products      ON products.id_product = lignes_ticket.id_product
        INNER JOIN categories    ON categories.id_category = products.id_category
        WHERE tickets.id_ticket  = $idTicket";    
                 
         $result = mysqli_query($conn, $sql);
                        
         $detailTiket = mysqli_fetch_all($result, MYSQLI_ASSOC);        
                 
         $arrayTicket=[];
         if(!empty($detailTiket)){ 

//>> Find detailTiket from lignes_ticket
            foreach ($detailTiket as $produit){ 
         
            $idLigneTicket=$produit['id_ligne_ticket'];
            $idProduct=$produit['id_product'];
            $idCategory=$produit['id_category'];  
            $imgSrc=$produit['imgSrc'];                      
            $nameProduct=$produit['name_product'];
            $quantity=$produit['quantity'];
            $price=$produit['price'];
            $totalItem=$quantity * $price; 
                        
            $elementTicket = [                                 
                              "id_ligne_ticket" => $idLigneTicket,
                                   "id_product" => $idProduct,
                                  "id_category" => $idCategory,
                                       "imgSrc" => $imgSrc,
                                 "name_product" => $nameProduct,
                                     "quantity" => $quantity,
                                        "price" => $price,
                                   "totalItem"  => $totalItem
                              ]; 

            array_push($arrayTicket,$elementTicket);  

        }//foreach

//>> Find maxIdTicket
        $sql="SELECT MAX(`id_ticket`) as maxIdTicket
                FROM `tickets`;";

        $result = mysqli_query($conn, $sql);

         $maxId = mysqli_fetch_assoc($result);

        $maxIdTicket = $maxId['maxIdTicket'];

        array_push($arrayTicket,$maxIdTicket); 

//>> Find totalTicket    
        //join table products to the table lignes_ticket to have the price of product 
        $sql="SELECT SUM(`price` * `quantity`) as sumTicket FROM `lignes_ticket`
              INNER JOIN products      ON products.id_product = lignes_ticket.id_product
                   WHERE `id_ticket`= $idTicket;";

       $result = mysqli_query($conn, $sql); 
       $totalCurrentTicket = mysqli_fetch_assoc($result);

       $totalTicket = $totalCurrentTicket['sumTicket'];

        array_push($arrayTicket,$totalTicket); 

       } //if(!empty($detailTiket)){ 

//>> Find nr_ticket           
        $sql="SELECT nr_ticket as nrTicket
                FROM tickets 
                WHERE id_ticket = $idTicket;";

        $result = mysqli_query($conn, $sql);

        $nrticket = mysqli_fetch_assoc($result);

        $nrTicket = $nrticket['nrTicket'];

        array_push($arrayTicket,$nrTicket); 

        array_push($arrayTicket,$maxIdLinesTicket); 

        array_push($arrayTicket,$selectedRowTicket); 

        array_push($arrayTicket,$pickedProduct);

        //>> Find maxIdProduct
        $sql="SELECT MAX(`id_product`) as maxIdProduct
                FROM `products`;";

        $result = mysqli_query($conn, $sql);

        $maxId = mysqli_fetch_assoc($result);

        $maxIdProduct = $maxId['maxIdProduct'];

        array_push($arrayTicket,$maxIdProduct);          

        print_r(json_encode($arrayTicket));    


//$arrayTicket :[ {
//                 id_ligne_ticket,
//                      id_product,
//                     id_category,
//                          imgSrc,
//                    name_product,
//                        quantity,
//                           price,
//                      totalItem
//                               },
//                     maxIdTicket,
//                     totalTicket,
//                        NrTicket,
//                maxIdLinesTicket,
//               selectedRowTicket,
//                   pickedProduct,
//                    maxIdProduct ]  

       
        ?>          