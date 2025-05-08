<?php

require_once "\htdocs\include\database.php";

$sql = "SELECT SUM(`total_ticket`) as totalTickets FROM `tickets`;";

$result = mysqli_query($conn, $sql);

$ticket =  mysqli_fetch_assoc($result);

/*
echo "<pre>";
var_dump($ticket);
echo "</pre>";
*/

echo "Total :".$ticket['totalTickets'];

?>



