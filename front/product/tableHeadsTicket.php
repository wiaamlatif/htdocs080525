<table class="table table-striped table-sm border border-dark table-hover">

    <thead>
        <tr>
            <th colspan="3">
            <?php include 'dropDownVendeur.php';?>
            </th>                                                         
        </tr>
        <tr><!-- table row--->
            <th class="border border-dark" style="font-size:12px;" >Nr Ticket</th>
            <th class="border border-dark">Total</th>
            <th colspan="2">Action</th>            
        </tr>
    </thead>

    <!---$(".dropDownVendeur").click------------------>
    <tbody id="showHeadsTickets">

      

    </tbody> 

    <tfoot>
        <td class="border border-dark">
         <span class="badge text-bg-dark fw-bold fs-6">Total</span>
        </td>

        <td class="border border-dark">
         <span class="badge text-bg-dark fw-bold fs-6" id="totalTickets">0.00</span>
        </td>        
        
        <td>
            <button class="btn btn-success" onclick="ajouterTicket()"><i>+</i></button>                    
        </td>
    </tfoot>
</table>

