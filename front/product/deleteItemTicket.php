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
                         WHERE `id_ligne_ticket`=$idLigneTicket;                                                    
                   ";

            $result = mysqli_query($conn, $sql);

            //=====================================
            $sql="SELECT sum(`price` * `quantity`) as sumTicket FROM `lignes_ticket`
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

    ?>                                        

