<div id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">
        <?php
            $mysqli = mysqli_connect(SERVER, USER, PASS, BD);
            mysqli_set_charset($mysqli, "utf8");

            $codigo=$_GET['code'];
            $detalle=ejecutarSQL::consultar("SELECT * FROM detalle  WHERE NumPedido='".$codigo."'");
            $detalleInf=mysqli_fetch_array($detalle, MYSQLI_ASSOC);
        ?>
        <h3 class="text-warning">Pedido #<?php echo $detalleInf['NumPedido']; ?></h3>
        <div>
            <h4>Platillo</h4>
        </div>
        <div class="table-responsive table-style">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Platillo</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $Consult_detalle=ejecutarSQL::consultar("SELECT * FROM detalle WHERE NumPedido='".$codigo."'");
                        while($fila1 = mysqli_fetch_array($Consult_detalle, MYSQLI_ASSOC)){
                            $consult_prod=ejecutarSQL::consultar("SELECT * FROM producto WHERE CodigoProd='".$fila1['CodigoProd']."'");
                            $fila=mysqli_fetch_array($consult_prod, MYSQLI_ASSOC);
                            ?>
                            <tr>
                                <td><?php echo $fila['NombreProd']; ?></td>
                                <td><?php echo $fila1['PrecioProd']; ?></td>
                                <td><?php echo $fila1['CantidadProductos']; ?></td>
                            </tr>
                            <?php 
                            mysqli_free_result($consult_prod);
                        }
                    ?>                   
                </tbody>
            </table>
        </div>
        <div>
            <h4>Detalle del pedido</h4>
        </div>
        <div class="row">
            <div class="col-lg-8 table-style">
                <table class="table table-striped">
                    <tbody>
                        <?php
                            $venta=ejecutarSQL::consultar("SELECT * FROM venta WHERE NumPedido='".$detalleInf['NumPedido']."'");
                            $ventaInf=mysqli_fetch_array($venta, MYSQLI_ASSOC);
                        ?>
                        <tr>
                            <td>Fecha</td>
                            <td><?php echo $ventaInf['Fecha']; ?></td>
                        </tr>
                        <tr>
                            <td>Total a pagar</td>
                            <td>s/.<?php echo $ventaInf['TotalPagar']; ?></td>
                        </tr>
                        <tr>
                            <td>Estado del pedido</td>
                            <td><?php echo $ventaInf['Estado']; ?></td>
                        </tr>
                        <tr>
                            <td>Tipo de pago</td>
                            <td><?php echo $ventaInf['NumeroDeposito']; ?></td>
                        </tr>
                        <tr>
                            <td>Tipo de envio</td>
                            <td><?php echo $ventaInf['TipoEnvio']; ?></td>
                        </tr>
                        <tr>
                            <td>Dirección / referencia de envio</td>
                            <td><?php echo $ventaInf['DirRef']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4 text-center">
                <?php 
                    if(is_file("./assets/img/comprobantes/".$ventaInf['Adjunto']))
                    {
                        ?>
                        <label>Adjunto</label><br>
                        <a href="./assets/img/comprobantes/<?php echo $ventaInf['Adjunto']; ?>" target="_blank" class="btn btn-outline-warning">
                            <img class="img-fluid" src="./assets/img/comprobantes/<?php echo $ventaInf['Adjunto']; ?>">
                        </a>
                        <?php
                    }else{
                        ?>
                        <label>Adjunto</label>
                        <p>No hay comprobante de pago</p>
                        <?php
                    }
                ?>
            </div>
        </div>
        <br>
            <div class="text-center">
                <a href="report/factura.php?id=<?php echo $ventaInf['NumPedido'];?>" target="_blank" class="btn btn-outline-warning">Descargar Factura</a>
                <a href="<?php echo $volver; ?>" class="btn btn-outline-danger">Volver</a>
            </div>
        </br>
    </div>
</div>