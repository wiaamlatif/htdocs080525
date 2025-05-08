<?php
    session_start();

    $idLigneTicket=0;
    if(isset($_GET['idLigneTicket'])){
        $idLigneTicket = $_GET['idLigneTicket'];  
        $_SESSION['idLigneTicket']=$idLigneTicket;             
    }

    if(isset($_GET['plusMinus'])){
        $plusMinus = $_GET['plusMinus'];     
    }

    if(isset($_SESSION['idTicket'])){
        $idTicket=$_SESSION['idTicket'];       
    }

    if(isset($_SESSION['idEmployee'])){
        $idEmployee=$_SESSION['idEmployee'];
    }

    $_SESSION['selectedRowTicket'] = $idLigneTicket;
    $_SESSION['maxIdLinesTicket'] = 0;
    

  require_once "\htdocs\include\database.php";

  $sql="SELECT quantity
          FROM lignes_ticket 
         WHERE id_ligne_ticket = $idLigneTicket;";
                      
  $result = mysqli_query($conn, $sql);

  $Quantity = mysqli_fetch_assoc($result);

  $currentQuantity = (int) $Quantity['quantity']; 

  if( $plusMinus == 1){

    if($currentQuantity<100){
        $currentQuantity= $currentQuantity + 1;
    }

  }  elseif ($plusMinus == 0) {

    if($currentQuantity>0){
        $currentQuantity= $currentQuantity - 1;
    }

  }
  
  if($currentQuantity>0){

    $sql=" UPDATE lignes_ticket
              SET quantity = $currentQuantity                                                      
            WHERE id_ligne_ticket  = $idLigneTicket ;";

  } else {
    $sql =" DELETE FROM `lignes_ticket` 
                  WHERE `id_ligne_ticket`=$idLigneTicket;";
  } 
      
  $result = mysqli_query($conn, $sql); 
  
  $sql="SELECT SUM(`price` * `quantity`) as sumTicket FROM `lignes_ticket`
        INNER JOIN products ON products.id_product = lignes_ticket.id_product
        WHERE `id_ticket`= $idTicket;";

  $result = mysqli_query($conn, $sql); 
  $totalCurrentTicket = mysqli_fetch_assoc($result);

  $totalTicket = $totalCurrentTicket['sumTicket'];

   $sql=" UPDATE  `tickets`
             SET   total_ticket = $totalTicket               
           WHERE   id_ticket   = $idTicket;";
 
   $result = mysqli_query($conn, $sql); 
  
   $toSend = [
                    "idTicket" => $idTicket,             
                  "idEmployee" => $idEmployee
             ];
  
  print_r(json_encode($toSend));