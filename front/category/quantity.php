    <?php 
      if(isset($idProduct)){
    ?>
        <p id="idProduct">
           <?php if(isset($idProduct)){echo "idProduct:".$idProduct;}?>
        </p>

        <p id="quantity<?=$idProduct?>" >
           <?php if(isset($quantityItem)){echo "quantity:".$quantityItem;}?>
        </p>

        <p id="price<?=$idProduct?>">
            <?php if(isset($price)){echo "price:".$price;}?>            
        </p>

        <p id="totalItem<?=$idProduct?>">
            <?php if(isset($totalItem)){echo "totalItem:".$totalItem;}?>
        </p>

        <p id="imgSrc<?=$idProduct?>">
            <?php if(isset($imgSrc)){echo "imgSrc:".$imgSrc;}?>           
        </p>

        <p id="emptyCart"></p>

    <?php
      }
    ?>
<div class="d-flex mb-3 justify-content-center"> 
  
    <!---red trash----->
    <button onclick="" type="submit" class="supItemCart btn btn-danger btn-sm">
            <i class="fa-solid fa-trash-can"></i>
    </button>
                                
    <button class="qtyMinus btn btn-primary btn-sm mx-2" id="qtyMinus<?=$idProduct?>"   onclick="minusQty('<?=$idProduct?>')">
        <strong>-</strong>
    </button>  
 
    <!---quantity of one item----->
    <input  class="qtyInput" id="qtyInput<?=$idProduct?>" type="text" value="<?=number_format($quantityItem)?>" readonly>
      
    <button class="qtyPlus btn btn-primary btn-sm mx-2" onclick="plusQty(<?=$idPanier?>)">
        <strong>+</strong>
    </button>  

</div>