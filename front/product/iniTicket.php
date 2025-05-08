<?php
        session_start();

        if(isset($_SESSION['idEmployee'])){        

          $idEmployee=$_SESSION['idEmployee'];

        } else {
                //come back
        }

//**************************/
//* find the $lastNrTicket */
//**************************/
require_once "\htdocs\include\database.php";

$sql = "SELECT * FROM  `tickets`
             ORDER BY  `id_ticket`DESC
                LIMIT 1;";

$result = mysqli_query($conn,$sql);

$ticket  =  $result -> fetch_assoc();

if(isset($ticket['nr_ticket'])){
    $lastNrTicket=$ticket['nr_ticket'];
} else {
    $lastNrTicket="0";
}

$lastNrTicket= (int) $lastNrTicket + 1;

$lastNrTicket = str_pad( $lastNrTicket, 8, '0', STR_PAD_LEFT);

//print_r($lastNrTicket);

//***************************************************************************************/
//* Insert a new empty ticket at the end of the file tickets for the current idEmployee */
//***************************************************************************************/

$idZ      =  0;
$nrTicket = $lastNrTicket;
$totalTicket= 0;
$validated = 0 ;

require_once "\htdocs\include\database.php";

$sql= "INSERT INTO `tickets`
                 (`id_employee`,
                  `id_z`,
                  `nr_ticket`,
                  `total_ticket`,
                  `validated`)
          VALUES ('$idEmployee',
                  '$idZ',
                  '$nrTicket',
                  '$totalTicket',
                  '$validated');";
                  
$result = mysqli_query($conn,$sql);

//***********************************************/
//* Add new empties fields in the file tickets  */
//***********************************************/

$sql ="SELECT * FROM tickets
WHERE tickets.id_employee = $idEmployee;";
 
$result = mysqli_query($conn, $sql);
         
$tickets = mysqli_fetch_all($result, MYSQLI_ASSOC);

array_push($tickets, $lastNrTicket);

//*****************************************************************/
//* Get sum total tickets and add it to the array tickets */
//*****************************************************************/

$sql = "SELECT SUM(`total_ticket`) as totalTickets FROM `tickets`;";

$result = mysqli_query($conn, $sql);

$ticket =  mysqli_fetch_assoc($result);

array_push($tickets, $ticket['totalTickets']);

//send the array tickets + lastNrTicket + totalTickets
print_r(json_encode($tickets));

?>