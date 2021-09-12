<div class="breadcrumbs breadcrumbs-style">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Lista de cocineros</h2>
            <ol>
                <li><a href="configAdmin.php?view=cocinero">Nuevo cocinero</a></li>
            </ol>
        </div>
    </div>
</div>

<div id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">
		<div class="row">
	      	<div class="table-responsive table-style">
	            <table class="table table-striped">
	              	<thead>
	                  	<tr>
	                      	<th scope="col">DNI</th>
	                      	<th scope="col">Nombre</th>
	                        <th scope="col">Apellidos</th>
	                        <th scope="col">Teléfono</th>
	                      	<th scope="col">Dirección</th>
	                      	<th scope="col">Actualizar</th>
	                      	<th scope="col">Eliminar</th>
	                  	</tr>
	              	</thead>
	              	<tbody>
	                  	<?php
							$mysqli = mysqli_connect(SERVER, USER, PASS, BD);
							mysqli_set_charset($mysqli, "utf8");

							$proveedores=mysqli_query($mysqli,"SELECT SQL_CALC_FOUND_ROWS * FROM cocinero");

							$totalregistros = mysqli_query($mysqli,"SELECT FOUND_ROWS()");
							$totalregistros = mysqli_fetch_array($totalregistros, MYSQLI_ASSOC);

	                        while($prov=mysqli_fetch_array($proveedores, MYSQLI_ASSOC))
	                        {
	                            ?>
								<tr>
									<td><?php echo $prov['DNI']; ?></td>
									<td><?php echo $prov['Nombre']; ?></td>
	                                <td><?php echo $prov['Apellidos']; ?></td>
									<td><?php echo $prov['Telefono']; ?></td>
	                                <td><?php echo $prov['Direccion']; ?></td>
									<td class="text-center">
		                        		<a href="configAdmin.php?view=cocinero-info&code=<?php echo $prov['DNI']; ?>" class="btn btn-outline-primary"><i class="icofont-edit"></i></a>
		                        	</td>
		                        	<td class="text-center">
		                        		<form action="process/del-cocinero.php" method="POST" class="FormCatElec" data-form="delete">
		                        			<input type="hidden" name="chef-dni" value="<?php echo $prov['DNI']; ?>">
		                        			<button type="submit" class="btn btn-outline-danger">
	                                            <i class="icofont-trash"></i>
	                                        </button>	
		                        		</form>
		                        	</td>
								</tr>
	                            <?php
	                        }
	                    ?>
	              	</tbody>
	          	</table>
	        </div>
		</div>
	</div>
</div>