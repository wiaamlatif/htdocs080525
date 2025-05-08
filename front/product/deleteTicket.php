<?php
session_start();

if(isset($_GET['idTicket'])){

    $idTicket = $_GET['idTicket'];     
}

if(isset($_SESSION['idEmployee'])){
    $idEmployee=$_SESSION['idEmployee'];
}

 
require_once "\htdocs\include\database.php";

$sql ="DELETE FROM tickets
             WHERE id_ticket  = $idTicket;";

$result = mysqli_query($conn, $sql);

if($result){
    
    $sql =" DELETE FROM lignes_ticket
             WHERE  id_ticket  = $idTicket;";

            $result = mysqli_query($conn, $sql);
}//$result


print_r(json_encode([$idEmployee]));    

                                            

