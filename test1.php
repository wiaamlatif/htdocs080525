<?php $title ="Home"; ?>

<?php ob_start();?>

<div class="container py-2">

   <div class="row">

      <div class="col-md-3">
        <table  table-striped>
          <thead>
              <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Prenom</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                <td>1</td>
                <td>ESSADRY</td>
                <td>Abdellatif</td>
              </tr>
          </tbody>
          <tfoot>
              <tr>
                <td>1</td>
                <td>TOTAL</td>
                <td>152</td>
              </tr>
          </tfoot>
        </table>
      </div>

      <div class="col-md-9">

        <table  table-striped>
          <thead>
            <tr>
              <th>Id</th>
              <th>Nom</th>
              <th>Prenom</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>ESSADRY</td>
              <td>Abdellatif</td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td>1</td>
              <td>TOTAL</td>
              <td>152</td>
            </tr>
          </tfoot>
        </table>
      
      </div>  

   </div>

</div>




     
<?php $content = ob_get_clean(); ?>

<?php require_once "layout.php";?>     