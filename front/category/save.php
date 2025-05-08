            <!--==============================--->
            <div class="card mb-3 col-md-9 m-1">
                <img src="/uploads/products/<?=$produit['imgSrc']?>" class="card-img-top w-50 mx-auto" alt="...">
                <div class="card-body">
                    <a href="detail_produit.php?idPrd=<?=$produit['id_product']?>" class="btn stretched-link">Afficher detail</a>                   
                    <h5 class="card-title"><?=$produit['name_product']?></h5>
                    <p class="card-text"><?=$produit['description']?></p>
                    <p class="card-text"><small class="text-muted"> <?=$produit['price']?> MAD</small></p>
                    <p class="card-text"> <?= date_format(date_create($produit['date_product']),format:'Y/m/d' )  ?></p>
                </div>
                <div class="card-footer" style="z-index:10">                 
                    <!---Quantity---> 
                    <div class="card-btns d-flex mb-3 justify-content-center">
                          <input class="idProduct" type="hidden" value="<?=$produit['id_product']?>">
                          <input class="price" type="hidden" value="<?=$produit['price']?>">
                          <button class="supItem btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></button>               
                          <button class="decrement btn btn-primary">-</button>
                          <span id="quantity" class="quantity"><?=number_format($quantityItem,0)?></span>
                          <button class="increment btn btn-primary">+</button>                                                       
                    </div>
                    <!---/Quantity--->
                </div>       
            </div>              
            <!--==============================---> 


                    <!--==============================--->                     
                     <div class="card">
                        <div class="card">
                           <img src="..." class="card-img-top" alt="...">
                           <div class="card-body">
                           <h5 class="card-title">Card title</h5>            
                           <a href="#" class="btn btn-primary">Go somewhere</a>
                           </div>
                        </div>               
                     </div>
                    <!--==============================---> 