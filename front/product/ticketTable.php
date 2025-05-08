<table class="table table-striped table-sm border border-dark">    
    <thead>
        <tr>
            <th class="border border-dark"colspan="4" height="">              
             <span>Ticket Nr:<span id ="displayNrTicket" class="badge text-bg-dark"></span></span>
            </th>
            <th class="border border-dark" colspan="4" height=""> 
             <span class='fs-5'>Total ticket :<span id ="totalHeadTicket" class="badge text-bg-dark fs-5"></span></span>
            </th>

        </tr>
        <tr><!-- table row--->           
            <th>IL</th><!-- id Ligne Ticket--->       
            <th>IP</th><!-- id Produit--->       
            <th>IC</th><!-- id Category-->       
            <th>imgSrc</th>          
            <th>Product</th>          
            <th>Quantite</th> 
            <th>Prix</th> 
            <th>Total</th>                             
        </tr>
    </thead>

    <tbody id="showDetailTicket">

    </tbody>

    <tfoot>               
        <tr>  
            <td colspan="6"></td>              
            <td><strong>Total</strong></td>
            <td><strong id="totalFootTicket"></strong></td>
        </tr>    
        <tr>                     
            <td colspan="8">
                <div class="d-flex justify-content-center">                                               
                    <button class="vider btn btn-danger rounded-pill mx-1" onclick="deleteItemsTicket()">Vider</button>                    
                    <button class="valider btn btn-success rounded-pill">Ticket</button>  
                </div>                       
            </td>                                 
        </tr>    
    </tfoot> 
</table>


