<?php require '/home/vol9_5/infinityfree.com/if0_38168562/htdocs/config.php'; ?>
<?php
$title ="Add a product";
ob_start();
?>

    <?php $varSell="Sell";$varData="Data";?>
    <?php include ROOT_DIRECTORY.'/include/navAdmin.php'; ?>

<?php       
    require_once ROOT_DIRECTORY.'/include/database.php';

    if(isset($_POST['AddProduct'])){

      $name_product = $_POST['name_product'];
      $id_category = $_POST['id_category'] ;
      $description = $_POST['description'];
            $price = $_POST['price'];

     //echo "<pre>";
     //var_dump($_POST);
     //echo "</pre>";

     if(!empty($name_product) && !empty($id_category)){

      if(empty($_FILES['imgSrc']['name'])){
        $myImage='default_product.png';
       } else {
         $myImage=uniqid().$_FILES['imgSrc']['name'];           
         move_uploaded_file($_FILES['imgSrc']['tmp_name'],ROOT_DIRECTORY.'/uploads/products/'.$myImage);
       }

       $sql = "INSERT INTO products (
                                    name_product,
                                    id_category,
                                    description,
                                    price,                                   
                                    imgSrc                                
                                    )
                VALUES (?,?,?,?,?)";

       $stmt = $pdo->prepare($sql);

       try {
        $stmt->execute([
                         $name_product,
                         $id_category,
                         $description,
                         $price,                         
                         $myImage
                      ]);
        echo "Data inserted successfully!";
          } catch (\PDOException $e) {
        echo "Error: " . $e->getMessage();
        }
    
     //  $pdo = null;
      
       //Redirection
       header('location:index.php');

     } else {
      echo "
             <div class='alert alert-danger' role='alert'>
               Le nom du produit, la categorie sont obligatoires !
             </div>
           ";
    }          
     
    }//AddProduct
        
?>      

    <div class="container py-2 w-50">

      <form method="post" enctype="multipart/form-data">

        <label class="form-label">Name product</label>
        <input type="text" class="form-control" name="name_product">

        <label class="form-label" >Category:</label>
        <select class="form-control" name="id_category" id="id_category">
            <option value="">Choisir une Categorie ...</option>
          <?php 
              $sqlstm = $pdo -> query('SELECT * FROM categories')      
              -> fetchAll(PDO::FETCH_ASSOC);      
              foreach ($sqlstm as $row) {  
          ?>              
            <option value='<?=$row['id_category']?>'><?=$row['name_category']?></option>;
          <?php     
              }                             
          ?>          
        </select>
        
        <label class="form-label">Description</label>
        <input type="text" class="form-control" name="description">

        <label class="form-label">Price</label>
        <input type="text" class="form-control" name="price">

        <label class="form-label">Discount</label>
        <input type="number" class="form-control" name="discount" min="0" max="100">

        <label class="form-label">Image</label>
        <input type="file" class="form-control" name="imgSrc">

        <input type="submit" value="AddProduct" class="btn btn-primary my-2" name="AddProduct">

      </form>

      <a href="index.php" class="btn btn-danger btn-sm">Your Add</a>

    </div>

<?php $content = ob_get_clean(); ?>


<?php include ROOT_DIRECTORY."/layout.php" ?>