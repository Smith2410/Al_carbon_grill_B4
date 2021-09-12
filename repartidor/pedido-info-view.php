<div class="breadcrumbs breadcrumbs-style">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Actualizar pedidos</h2>
            <ol>
                <li><a href="configRepartidor.php?view=pedido">Todos los pedidos</a></li>
            </ol>
        </div>
    </div>
</div>

<div id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">
        <?php
            $code=$_GET['code'];
            $selOrder=ejecutarSQL::consultar("SELECT * FROM venta WHERE NumPedido='$code'");
            $order=mysqli_fetch_array($selOrder, MYSQLI_ASSOC);

            $conUs= ejecutarSQL::consultar("SELECT Nombre, Apellidos FROM cliente WHERE DNI='".$order['Cliente_dni']."'");
            $UsP=mysqli_fetch_array($conUs, MYSQLI_ASSOC);
            $nombreCompletoCliente = $UsP['Nombre'].' '.$UsP['Apellidos'];
        ?>
        <div class="row">
            <div class="col-lg-6 table-responsive table-style">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>Cliente</td>
                            <td><?php echo $nombreCompletoCliente; ?></td>
                        </tr>
                        <tr>
                            <td>Tipo de pago</td>
                            <td><?php echo $order['NumeroDeposito']; ?></td>
                        </tr>
                        <tr>
                            <td>Fecha</td>
                            <td><?php echo $order['Fecha']; ?></td>
                        </tr>
                        <tr>
                            <td>Total a pagar</td>
                            <td>s/.<?php echo $order['TotalPagar']; ?></td>
                        </tr>
                        <tr>
                            <td>Estado</td>
                            <td><?php echo $order['Estado']; ?></td>
                        </tr>
                        <tr>
                            <td>Tipo de envio</td>
                            <td><?php echo $order['TipoEnvio']; ?></td>
                        </tr>
                        <tr>
                            <td>Dirección de envio</td>
                            <td><?php echo $order['DirRef']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-lg-6">
                <form action="./process/up-estado-pedido.php" method="POST" class="FormCatElec" data-form="update">
                    <input type="hidden" readonly="" value="<?php echo $order['NumPedido']; ?>" name="num-pedido">
                    <div class="php-email-form">
                            <div class="form-group">
                            <label>Estado del pedido</label>
                            <select class="form-control" name="pedido-status" >
                                <?php  
                                    if($order['Estado']=="Pendiente")
                                    {
                                        ?>
                                        <option value="Pendiente">Pendiente (Actual)</option>
                                        <option value="Entregado">Entregado</option>
                                        <option value="Enviado">Enviado</option>
                                        <?php  
                                    }
                                    if($order['Estado']=="Entregado")
                                    {
                                        ?>
                                        <option value="Entregado">Entregado (Actual)</option>
                                        <option value="Pendiente">Pendiente</option>
                                        <option value="Enviado">Enviado</option>
                                        <?php  
                                    }
                                    if($order['Estado']=="Enviado")
                                    {
                                        ?>
                                        <option value="Enviado">Enviado (Actual)</option>
                                        <option value="Entregado">Entregado</option>
                                        <option value="Pendiente">Pendiente</option>
                                        <?php  
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit">Actualizar estado</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>