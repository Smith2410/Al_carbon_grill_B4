<div class="breadcrumbs breadcrumbs-style">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Lista de clientes</h2>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $mysqli = mysqli_connect(SERVER, USER, PASS, BD);
                            mysqli_set_charset($mysqli, "utf8");

                            $link ="configAdmin.php?view=client&pag";
                            $pagina = isset($_GET['pag']) ? (int)$_GET['pag'] : 1;
                            $regpagina = 15;
                            $inicio = ($pagina > 1) ? (($pagina * $regpagina) - $regpagina) : 0;

                            $clientes=mysqli_query($mysqli,"SELECT SQL_CALC_FOUND_ROWS * FROM cliente LIMIT $inicio, $regpagina");

                            $totalregistros = mysqli_query($mysqli,"SELECT FOUND_ROWS()");
                            $totalregistros = mysqli_fetch_array($totalregistros, MYSQLI_ASSOC);

                            $numeropaginas = ceil($totalregistros["FOUND_ROWS()"]/$regpagina);

                            $cr=$inicio+1;
                            while($adm=mysqli_fetch_array($clientes, MYSQLI_ASSOC))
                            {
                                ?>
                                <tr>
                                    <td><?php echo $adm['DNI']; ?></td>
                                    <td><?php echo $adm['Nombre']; ?></td>
                                    <td><?php echo $adm['Apellidos']; ?></td>
                                    <td><?php echo $adm['Telefono']; ?></td>
                                    <td><?php echo $adm['Direccion']; ?></td>
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