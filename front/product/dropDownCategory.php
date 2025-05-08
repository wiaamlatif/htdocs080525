<?php
require_once "\htdocs\include\database.php";
     
//>> Get categories
$sql = "SELECT * FROM categories";
        
$result = mysqli_query($conn, $sql);
                
$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
   <!------Category---------->
    <div class="dropdown">
        <button class="btn btn-dark rounded-pill dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Category
        </button>
        <ul class="dropdown-menu">
        <?php
        foreach ($categories as $category) { 
        $idCategory = $category['id_category'];
        $categoryName = $category['name_category'];                                         
        ?>            
            <li>
                <button class="dropdown-item" id="dropDrownCategory<?=$idCategory?>"
                        onclick="displayProductsCategory(<?=$idCategory?>)"><?=$category['name_category']?>                        
                </button>                
            </li>
        <?php
        }
        ?>               
        </ul>
    </div>
    <!-------Category--------->   