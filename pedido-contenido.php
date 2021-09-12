<div class="table-responsive table-style">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Total</th>
                <th scope="col">Estado</th>
                <th scope="col">Envío</th>
                <th scope="col">Detalles</th>
                <th scope="col">Factura</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($rw=mysqli_fetch_array($consultaC, MYSQLI_ASSOC))
            { 
                ?> 
                <tr>
                    <td scope="row"><?php echo $rw['Fecha']; ?></td>
                    <td>s/.<?php echo $rw['TotalPagar']; ?></td>
                    <td>
                        <?php
                            switch ($rw['Estado'])
                            {
                                case 'Enviado':
                                echo "En camino";
                                break;
                                case 'Pendiente':
                                echo "En espera";
                                break;
                                case 'Entregado':
                                echo "Entregado";
                                break;
                                default:
                                echo "Sin informacion";
                                break;
                            }
                        ?>
                    </td>
                    <td>
                        <?php echo $rw['TipoEnvio']; ?>
                    </td>
                    <td class="text-center">
                        <a href="<?php echo SERVERURL; ?>detalle.php?code=<?php echo $rw['NumPedido']; ?>" class="btn btn-outline-primary"><i class="icofont-eye"></i></a>
                    </td>
                    <td class="text-center">
                        <a href="<?php echo SERVERURL; ?>report/factura.php?id=<?php echo $rw['NumPedido'];?>" target="_blank" class="btn btn-outline-success"><i class="icofont-printer"></i></a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>