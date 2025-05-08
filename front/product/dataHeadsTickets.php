<?php
    session_start();
    
   if(isset($_GET['idEmployee'])){
      $idEmployee =$_GET['idEmployee'];

      $_SESSION['idEmployee']=$idEmployee;      
        
   }
        
require_once "\htdocs\include\database.php";

//>>Get list tickets 
//>> Get tickets       
$sql ="SELECT * FROM tickets
       WHERE id_employee = $idEmployee;";
      
        
$result = mysqli_query($conn,$sql);
                
$headTickets = mysqli_fetch_all($result, MYSQLI_ASSOC);

$arrayHeadTicket=[];
if(!empty($headTickets)){ 

   foreach ($headTickets as $headTicket){ 

         $idTicket = $headTicket['id_ticket'];
         $nrTicket = $headTicket['nr_ticket'];
      $totalTicket = $headTicket['total_ticket'];

      $elementHeadTicket = [  
            "idTicket" => $idTicket,
            "nrTicket" => $nrTicket,
         "totalTicket" => $totalTicket
                           ];
      
      array_push($arrayHeadTicket,$elementHeadTicket);      
   }
}

//>> Get Total ticket
$sql="SELECT SUM(total_ticket) as totalTickets FROM tickets
       WHERE `id_employee`= $idEmployee;";

$result = mysqli_query($conn, $sql); 

$sumTickets = mysqli_fetch_assoc($result);

$totalTickets = $sumTickets['totalTickets'];

array_push($arrayHeadTicket,$totalTickets);

//>> Get firsName
$sql="SELECT first_name FROM employees 
       WHERE id_employee = $idEmployee;";
                    
  $result = mysqli_query($conn, $sql);

  $employee = mysqli_fetch_assoc($result);

  $firstName = $employee['first_name'];  

  $_SESSION['firstName']=$firstName;

  array_push($arrayHeadTicket,$firstName);  

  print_r(json_encode($arrayHeadTicket));

//[{…}, {…}, {…}, {…}, '0.00', 'Abdellatif']
//0:{idTicket: '1', nrTicket: '00000001', totalTicket: '0.00'}
//1:{idTicket: '2', nrTicket: '00000002', totalTicket: '0.00'}
//2:{idTicket: '4', nrTicket: '00000004', totalTicket: '0.00'}
//3:{idTicket: '5', nrTicket: '00000005', totalTicket: '0.00'}
?>  

