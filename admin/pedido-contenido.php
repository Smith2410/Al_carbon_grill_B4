<tr>
    <td><?php echo $cr; ?></td>
    <td><?php echo $order['Fecha']; ?></td>
    <td>
        <?php 
            $conUs= ejecutarSQL::consultar("SELECT Nombre, Apellidos FROM cliente WHERE DNI='".$order['Cliente_dni']."'");
            $UsP=mysqli_fetch_array($conUs, MYSQLI_ASSOC);
            echo $UsP['Nombre'].' '.$UsP['Apellidos'];
        ?>
    </td>
    <td><?php echo $order['TotalPagar']; ?></td>
    <td><?php echo $order['TipoPago']; ?></td>
    <td><?php echo $order['Estado']; ?></td>
    <td><?php echo $order['TipoEnvio']; ?></td>
    <td class="text-center">
        <a href="./report/factura.php?id=<?php echo $order['NumPedido'];?>" target="_blank" class="btn btn-outline-success"><i class="icofont-printer"></i></a>
    </td>
    <td class="text-center">
        <a href="configAdmin.php?view=pedido-detalle&code=<?php echo $order['NumPedido']; ?>" class="btn btn-outline-primary"><i class="icofont-eye"></i></a>
    </td>
    <td class="text-center">
        <a href="configAdmin.php?view=pedido-info&code=<?php echo $order['NumPedido']; ?>" class="btn btn-outline-primary"><i class="icofont-edit"></i></a>
    </td>
    <?php 
    if ($dataAdmin['rol']==0)
    {   ?>
        <td class="text-center">
            <form action="process/del-pedido.php" method="POST" class="FormCatElec" data-form="delete">
                <input type="hidden" name="num-pedido" value="<?php echo $order['NumPedido']; ?>">
                <button type="submit" class="btn btn-outline-danger"><i class="icofont-trash"></i></button>
            </form>
        </td>
        <?php 
    } ?>
</tr>