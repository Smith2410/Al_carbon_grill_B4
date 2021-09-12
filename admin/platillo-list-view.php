<div class="breadcrumbs breadcrumbs-style">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Lista de platillos</h2>
            <ol>
                <li><a href="configAdmin.php?view=platillo">Nuevo platillo</a></li>
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
                          	<th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cocinero</th>
                            <th scope="col">Actualizar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        	$mysqli = mysqli_connect(SERVER, USER, PASS, BD);
            				mysqli_set_charset($mysqli, "utf8");

                            $link ="configAdmin.php?view=platillo-list&pag";
            				$pagina = isset($_GET['pag']) ? (int)$_GET['pag'] : 1;
            				$regpagina = 10;
            				$inicio = ($pagina > 1) ? (($pagina * $regpagina) - $regpagina) : 0;

            				$productos=mysqli_query($mysqli,"SELECT SQL_CALC_FOUND_ROWS * FROM producto LIMIT $inicio, $regpagina");

            				$totalregistros = mysqli_query($mysqli,"SELECT FOUND_ROWS()");
            				$totalregistros = mysqli_fetch_array($totalregistros, MYSQLI_ASSOC);

            				$numeropaginas = ceil($totalregistros["FOUND_ROWS()"]/$regpagina);

            				$cr=$inicio+1;
                            while($prod=mysqli_fetch_array($productos, MYSQLI_ASSOC))
                            {
                                ?>
                                <tr>
                                	<td><?php echo $cr; ?></td>
                                	<td><?php echo $prod['NombreProd']; ?></td>
                                	<td>
                                		<?php 
                                			$categ=ejecutarSQL::consultar("SELECT Categoria FROM categoria WHERE id='".$prod['Categoria_id']."'");
                                			$datc=mysqli_fetch_array($categ, MYSQLI_ASSOC);
                                			echo $datc['Categoria'];
                                		?>
                                	</td>
                                	<td><?php echo $prod['Precio']; ?></td>
                                    <td>
                                        <?php
                                            $chef=ejecutarSQL::consultar("SELECT Nombre,Apellidos FROM cocinero WHERE DNI='".$prod['Cocinero_dni']."'");
                                            $datC=mysqli_fetch_array($chef, MYSQLI_ASSOC);
                                            echo $datC['Nombre']." ".$datC['Apellidos'];
                                        ?>
                                    </td>
                                	<td class="text-center">
                                		<a href="configAdmin.php?view=platillo-info&code=<?php echo $prod['CodigoProd']; ?>" class="btn btn-outline-primary"><i class="icofont-edit"></i></a>
                                	</td>
                                	<td class="text-center">
                                		<form action="process/del-platillo.php" method="POST" class="FormCatElec" data-form="delete">
                                			<input type="hidden" name="prod-code" value="<?php echo $prod['CodigoProd']; ?>">
                                			<button type="submit" class="btn btn-outline-danger"><i class="icofont-trash"></i></button>	
                                		</form>
                                	</td>
                                </tr>
                                <?php 
                        	   $cr++;
                        	}
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- ======= Paginacion ======= -->
            <?php include './include/pagination.php'; ?>
    	</div>
    </div>
</div>