<div class="breadcrumbs breadcrumbs-style">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Pedidos enviados</h2>
            <ol>
                <li><a href="configAdmin.php?view=pedido-pendiente">Pendientes</a></li>
                <li><a href="configAdmin.php?view=pedido-entregado">Entregados</a></li>
                <li><a href="configAdmin.php?view=pedido">Todos</a></li>
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
                            <th scope="col">Tipo pago</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Total</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Envío</th>
                            <th scope="col">Repartidor</th>
                            <th scope="col">Factura</th>
                            <th scope="col">Detalle</th>
                            <th scope="col">Actualizar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $mysqli = mysqli_connect(SERVER, USER, PASS, BD);
                            mysqli_set_charset($mysqli, "utf8");

                            $link ="configAdmin.php?view=pedido-enviado&pag";
                            $pagina = isset($_GET['pag']) ? (int)$_GET['pag'] : 1;
                            $regpagina = 10;
                            $inicio = ($pagina > 1) ? (($pagina * $regpagina) - $regpagina) : 0;

                            $pedidos=mysqli_query($mysqli,"SELECT SQL_CALC_FOUND_ROWS * FROM venta WHERE Estado='Enviado' LIMIT $inicio, $regpagina");

                            $totalregistros = mysqli_query($mysqli,"SELECT FOUND_ROWS()");
                            $totalregistros = mysqli_fetch_array($totalregistros, MYSQLI_ASSOC);

                            $numeropaginas = ceil($totalregistros["FOUND_ROWS()"]/$regpagina);

                            $cr=$inicio+1;
                            while($order=mysqli_fetch_array($pedidos, MYSQLI_ASSOC))
                            {
                                include 'pedido-contenido.php';
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