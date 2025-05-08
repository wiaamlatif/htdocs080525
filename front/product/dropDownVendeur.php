<?php

    require_once "\htdocs\include\database.php";

    //>> Get vendeurs
    $sql = "SELECT * FROM employees";
                  
    $result = mysqli_query($conn,$sql);
    
    $vendeurs = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>    
    <!-------Vendeurs--------->
    <div class="dropdown">
        <button id="btnVendeur" class="btn btn-dark rounded-pill dropdown-toggle fs-5" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Vendeurs
        </button>
        <ul class="dropdown-menu">
            <?php
                foreach ($vendeurs as $vendeur) { 
                $idEmployee= $vendeur['id_employee'];
                $firstName= $vendeur['first_name'];
            ?>
            <li>
                <button id="dropdownVendeur<?= $idTicket?>"  class="dropdown-item" 
                        onclick="displayHeadsTickets(<?=$idEmployee?>)">
                        <?= $firstName ?>
                </button>                
            </li>
            <?php
                }
            ?>               
        </ul>
    </div>
    <!------Vendeurs---------->               