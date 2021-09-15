<?php include 'include/header.php'; ?>

<section id="book-a-table" class="book-a-table book-a-table-padding">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Carrito</h2>
            <p>Carrito de compras</p>
        </div>
        <?php
            require_once "library/configServer.php";
            require_once "library/consulSQL.php";
            if(!empty($_SESSION['carro']))
            {
                $suma = 0;
                $sumaA = 0;
                ?>
                <div class="table-responsive table-style">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <?php
                            foreach($_SESSION['carro'] as $codeProd)
                            {
                                $consulta=ejecutarSQL::consultar("SELECT * FROM producto WHERE CodigoProd='".$codeProd['producto']."'");
                                while($fila = mysqli_fetch_array($consulta, MYSQLI_ASSOC))
                                {
                                    $pref=number_format($fila['Precio']);
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $fila['NombreProd']; ?></td>
                                            <td><?php echo $pref; ?></td>
                                            <td><?php echo $codeProd['cantidad']; ?></td>
                                            <td><?php echo $pref*$codeProd['cantidad']; ?></td>
                                            <td>
                                                <form action='<?php echo SERVERURL; ?>process/quitar-platillo.php' method='POST' class='FormCatElec' data-form=''>
                                                    <input type='hidden' value='<?php echo $codeProd['producto']; ?>' name='codigo'>
                                                    <button class='btn btn-danger'>Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php

                                    /** Calculos */
                                    $suma += $pref*$codeProd['cantidad'];
                                    $sumaA += $codeProd['cantidad'];
                                }
                                mysqli_free_result($consulta);
                            }
                            ?>
                            <tr>
                                <td>Total</td>
                                <td><strong><?php echo $sumaA; ?></strong></td>
                                <td><strong>s/.<?php echo number_format($suma,2); ?></strong></td>
                            </tr>
                    </table>
                </div>
                <div class="ResForm"></div>
                <!-- ===== Botones ===== -->
                <div class="text-center">
                    <a href="<?php echo SERVERURL; ?>platillos.php" class="btn btn-outline-warning btn-style">Seguir comprando</a>
                    <br class="d-lg-none d-md-none">
                    <a href="<?php echo SERVERURL; ?>process/vaciar-carrito.php" class="btn btn-outline-danger btn-style">Vaciar el carrito</a>
                    <br class="d-lg-none d-md-none">
                    <a href="pedido.php" class="btn btn-outline-light btn-style">Confirmar el pedido</a>
                </div>
                 <?php 
            }else{
                ?>
                <p class="text-center" style="color: #D9BA85;">El carrito de compras esta vacío</p>
                <a href="<?php echo SERVERURL; ?>platillos.php" class="btn btn-outline-warning">Ir a platillos</a>
                <?php                               
            }  
        ?>
    </div>
</section>

<?php include 'include/footer.php'; ?>