<?php
           session_start();
        
           if(isset($_GET['idLigneTicket'])){

                $idLigneTicket = $_GET['idLigneTicket'];     
            }

            if(isset($_SESSION['idTicket'])){
                $idTicket=$_SESSION['idTicket'];
            }

            if(isset($_SESSION['idEmployee'])){
                $idEmployee=$_SESSION['idEmployee'];
            }


            require_once "\htdocs\include\database.php";

            //>> Get produits       
            $sql ="DELETE FROM `lignes_ticket` 
                         WHERE `id_ticket`=$idTicket;                                                    
                   ";

            $result = mysqli_query($conn, $sql);

            $sql=" UPDATE  `tickets`
                      SET   total_ticket = 0
                    WHERE   id_ticket   = $idTicket;";

            $result = mysqli_query($conn, $sql);
            
            $sql="SELECT nr_ticket
                    FROM tickets 
                     WHERE   id_ticket   = $idTicket;";
             
             
            $result = mysqli_query($conn, $sql);
        
            $currentNrTicket = mysqli_fetch_assoc($result);
        
            $nrTicket = $currentNrTicket['nr_ticket']; 

            $toSend = [
                  "idTicket" => $idTicket,
                  "nrTicket" => $nrTicket,
                "idEmployee" => $idEmployee
              ];

            print_r(json_encode($toSend));

    ?>                                        

