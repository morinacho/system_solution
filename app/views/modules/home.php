<?php require_once APP_ROUTE . '/views/modules/header.php'; ?>

<div class="row justify-content-around">
	<div class="col-12 mb-5 mt-4 text-center">
		<h2>Administrador de Usuarios</h2>
	</div>
	<div class="col-2">
		<a href="<?php echo URL_ROUTE; ?>users/create" class="badge"> 
			<img src="<?php echo URL_ROUTE; ?>media/system/icons/add-users.png" class="mx-auto d-block">
			<p class="card-text mt-2">Agregar nuevo usuario</p>
		</a>
	</div>
	<div class="col-2">
		<a href="<?php echo URL_ROUTE; ?>users/show" class="badge"> 
			<img src="<?php echo URL_ROUTE; ?>media/system/icons/list-users.png" class="mx-auto d-block">
			<p class="card-text mt-2">Ver Usuarios</p>
		</a>
	</div> 
	<?php
		if(isset($_GET['success']) && $_GET['success']){
			echo "<div class='col-12 mt-5 alert alert-success alert-dismissible fade show' role='alert'> 
					Nuevo usuario agregado con éxito!
					<button type='button' class='close' data-dismiss='alert'>
						<span>&times;</span>
					</button>
				</div>";
		}
	?>
</div> 	

<?php require_once APP_ROUTE . '/views/modules/footer.php'; ?>
	
