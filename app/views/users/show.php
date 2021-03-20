<?php require_once APP_ROUTE . '/views/modules/header.php'; ?> 
<h3 class="text-center mb-3">Lista de todos los usuario</h3>
<table class="table">
  <thead class="thead-dark table-striped  ">
    <tr>
      <th scope="col">Documento</th>
      <th scope="col">Apellido y Nombre</th> 
      <th scope="col">Editar</th> 
    </tr>
  </thead>
  <tbody>
  <?php
    foreach ($param as $key => $value) {
      echo "<tr>
              <th>$key</th>
              <td>$value</td> 
              <td class='text-center'><a href=".URL_ROUTE."users/edit/$key><span class='material-icons'>edit</span></a></td> 
            </tr>";
    }
  ?> 
  </tbody>
</table> 
<?php require_once APP_ROUTE . '/views/modules/footer.php';?>