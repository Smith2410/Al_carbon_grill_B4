<div class="breadcrumbs breadcrumbs-style">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Lista de categorías</h2>
            <ol>
                <li><a href="configAdmin.php?view=categoria">Nueva categoría</a></li>
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
                            <th scope="col">Categoría</th>
                            <th scope="col">Actualizar</th>
                          	<th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        	$mysqli = mysqli_connect(SERVER, USER, PASS, BD);
    						mysqli_set_charset($mysqli, "utf8");

                            $link ="configAdmin.php?view=categoria-list&pag";
                            $pagina = isset($_GET['pag']) ? (int)$_GET['pag'] : 1;
                            $regpagina = 10;
                            $inicio = ($pagina > 1) ? (($pagina * $regpagina) - $regpagina) : 0;

    						$categorias=mysqli_query($mysqli,"SELECT SQL_CALC_FOUND_ROWS * FROM categoria LIMIT $inicio, $regpagina");

                            $totalregistros = mysqli_query($mysqli,"SELECT FOUND_ROWS()");
                            $totalregistros = mysqli_fetch_array($totalregistros, MYSQLI_ASSOC);

                            $numeropaginas = ceil($totalregistros["FOUND_ROWS()"]/$regpagina);
    						
                            while($cate=mysqli_fetch_array($categorias, MYSQLI_ASSOC))
                            {
                                ?>
                                <tr>
                                    <td><?php echo $cate['id']; ?></td>
    	                        	<td><?php echo $cate['Categoria']; ?></td>
    	                        	<td>
    	                        		<a href="configAdmin.php?view=categoria-info&code=<?php echo $cate['id']; ?>" class="btn btn-outline-primary"><i class="icofont-edit"></i></a>
    	                        	</td>
    	                        	<td>
    	                        		<form action="process/del-categoria.php" method="POST" class="FormCatElec" data-form="delete">
    	                        			<input type="hidden" name="categ-id" value="<?php echo $cate['id']; ?>">
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
            <!-- ======= Paginacion ======= -->
            <?php include './include/pagination.php'; ?>
    	</div>
    </div>
</div>