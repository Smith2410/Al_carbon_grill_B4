<div class="breadcrumbs breadcrumbs-style">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Asignar repartidor a pedido</h2>
            <ol>
                <li><a href="configAdmin.php?view=pedido">Lista de pedidos</a></li>
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
                <form action="./process/up-repartidor-pedido.php" method="POST" class="FormCatElec" data-form="update">
                    <div class="php-email-form">
                        <input type="hidden" value="<?php echo $order['NumPedido']; ?>" name="num-pedido">
                        <div class="form-group">
                            <label>Elija un repartidor</label>
                            <select class="form-control" name="det-repar">
                                <option value="">Seleccione un repartidor</option>
                                <?php
                                    $repartidors= ejecutarSQL::consultar("SELECT * FROM administrador WHERE rol = 1");
                                    while($repar=mysqli_fetch_array($repartidors, MYSQLI_ASSOC)){

                                        if($order['Repartidor_dni']==$repar['DNI']){
                                        echo '<option selected="" value="'.$repar['DNI'].'">'.$repar['Nombre'].' '.$repar['Apellidos'].' (Actual)</option>';
                                        }else{
                                            echo '<option value="'.$repar['DNI'].'">'.$repar['Nombre']." ".$repar['Apellidos'].'</option>'; 
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit">Asignar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>