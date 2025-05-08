//displayNrTicket
        var NrTicket = data.pop();
        document.getElementById('displayNrTicket').innerText=NrTicket;


        //totalTickets
        var totalTicket = data.pop();
        document.getElementById('totalHeadTicket').innerText=totalTicket.toFixed(2);
        document.getElementById('totalFootTicket').innerText=totalTicket.toFixed(2);

        console.log(data);
  
        if (data.length > 0) {
            document.getElementById('displayTicket').innerHTML="";    

            data.forEach(element => {
                    
            //  console.log(element.id_ticket);           
            var idLigneTicket=element.id_ligne_ticket
            var idProduct=element.id_product
            var idCategory=element.id_category
            var imgSrc = element.imgSrc
            var nameProduct=element.name_product
            var quantity = element.quantity
            var price = element.price
            var totalItem = element.totalItem 
                          
            var datailTicket=`<tr id="trDetailTicket`+idLigneTicket+`" class="border border-dark fw-bold">
                                <td id="tdIdTicket">`+idLigneTicket+`</td>
                                <td>`+idProduct+`</td>

                                <td>`+idCategory+`</td>

                                <td>`+
                                `<img class="img img-fluid" src="/uploads/products/`+imgSrc+`" width="70px" alt="`+`">`+
                                `</td>

                                <td>`+nameProduct+`</td>

                                <td><!---Quantity------> 
                                  <div class="d-flex border-top border-bottom border-dark">
                                    <button id="supItemCart`+idLigneTicket+`" class="supItemCart btn btn-danger btn-sm"
                                    onclick="deleteItemTicket(`+idLigneTicket+`)">
                                    <i class="fa-solid fa-trash-can"></i>
                                    </button>               
                                    <button id="decrementQuantity`+idLigneTicket+`" class="decrementQuantity btn btn-primary"
                                    onclick="getQuantity(`+idLigneTicket+`,`+0+`)">
                                    -
                                    </button>
                                    <span id="quantity`+idLigneTicket+`" class="quantity">`+quantity+`</span>
                                    <button id="incrementQuantity`+idLigneTicket+`" class="incrementQuantity btn btn-primary"
                                    onclick="getQuantity(`+idLigneTicket+`,`+1+`)">
                                    +
                                    </button> 
                                  </div>
                                </td>

                                <td>`+price+`</td>

                                <td>`+totalItem+`</td>
                              </tr>`; 
                        
              document.getElementById('displayTicket').innerHTML+=datailTicket; 

              if(idProduct==idProduit && !newProduct){
                document.getElementById('trDetailTicket'+idLigneTicket).classList.add('table-danger');
              }   
            
            });//forEach

            if(newProduct){

              const last = data[data.length - 1];
              lastLigneTicket = last['id_ligne_ticket'];
              document.getElementById('trDetailTicket'+lastLigneTicket).classList.add('table-success');
            
              console.log(last['id_ligne_ticket']);
            }
          
        } else {

          var msg = `<tr>
                      <td colspan="8">
                        <span><strong class="text text-danger">This ticket  Nr: `+NrTicket+` is Empty</strong></span>
                      </td>
                    </tr>
                    `
          document.getElementById('displayTicket').innerHTML=msg;      
          
        }//else if( data.length > 0) 