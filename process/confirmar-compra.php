<?php
    session_start(); 
    include '../library/configServer.php';
    include '../library/consulSQL.php';
    $tipopago=consultasSQL::clean_string($_POST['TipoPago']);
    $NumDepo=consultasSQL::clean_string($_POST['NumDepo']);
    $tipoenvio=consultasSQL::clean_string($_POST['tipo-envio']);
    $Cedclien=consultasSQL::clean_string($_POST['Cedclien']);
    $DirRef=consultasSQL::clean_string($_POST['clien-dir-ref']);

    $comprobanteTMP=$_FILES['comprobante']['tmp_name'];
    $comprobanteName=$_FILES['comprobante']['name'];
    $comprobanteType=$_FILES['comprobante']['type'];
    $comprobanteSize=$_FILES['comprobante']['size'];
    $comprobanteMaxSize=5120;
    $comprobanteDir="../assets/img/comprobantes/";

    $verdata=  ejecutarSQL::consultar("SELECT * FROM cliente WHERE DNI='".$Cedclien."'");
    if(mysqli_num_rows($verdata)>=1)
    {
        if(!empty($comprobanteType))
        {
            if($comprobanteType=="image/jpeg" || $comprobanteType=="image/png")
            {
                if(($comprobanteSize/1024)<=$comprobanteMaxSize){
                    chmod($comprobanteDir, 0777);
                    switch ($comprobanteType) {
                        case 'image/jpeg':
                            $extPicture=".jpg";
                        break;
                        case 'image/png':
                            $extPicture=".png";
                        break;
                    }
                    $comV=ejecutarSQL::consultar("SELECT * FROM venta");
                    $numV=mysqli_num_rows($comV);
                    $comprobanteF="comprobante_".($numV+1).$extPicture;
                    mysqli_free_result($comV);
                    if(!move_uploaded_file($_FILES['comprobante']['tmp_name'], $comprobanteDir.$comprobanteF))
                    {
                        echo '<script>swal("ERROR", "No se pudo subir el archivo adjunto", "error");</script>';
                        exit();
                    }
                }else{
                    echo '<script>swal("ERROR", "El tamaño del adjunto es muy grande", "error");</script>';
                    exit();
                }
            }else{
                echo '<script>swal("ERROR", "El formato del adjunto es invalido, por favor verifica e intenta nuevamente", "error");</script>';
                exit();
            }
        }else{
            $comprobanteF="Sin adjunto";
        }
        if(!empty($_SESSION['carro']))
        {
            $StatusV="Pendiente";
            $suma = 0;
            foreach($_SESSION['carro'] as $codess){
                $consulta=ejecutarSQL::consultar("SELECT * FROM producto WHERE CodigoProd='".$codess['producto']."'");
                while($fila = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
                    $tp = $fila['Precio'];
                    $suma += $tp*$codess['cantidad'];
                }
                mysqli_free_result($consulta);
            }
            if(consultasSQL::InsertSQL("venta", "Fecha, Cliente_dni, TotalPagar, Estado, TipoPago, NumeroDeposito, TipoEnvio, Adjunto, DirRef", "'".date('d-m-Y')."','$Cedclien','$suma','$StatusV','$tipopago','$NumDepo','$tipoenvio','$comprobanteF','$DirRef'"))
            {

                /*recuperando el número del pedido actual*/
                $verId=ejecutarSQL::consultar("SELECT * FROM venta WHERE Cliente_dni='$Cedclien' ORDER BY NumPedido desc limit 1");
                $fila=mysqli_fetch_array($verId, MYSQLI_ASSOC);
                $Numpedido=$fila['NumPedido'];

                /*Insertando datos en detalle de la venta*/
                foreach($_SESSION['carro'] as $carro){
                		$preP=ejecutarSQL::consultar("SELECT * FROM producto WHERE CodigoProd='".$carro['producto']."'");
                		$filaP=mysqli_fetch_array($preP, MYSQLI_ASSOC);
                    $pref=number_format($filaP['Precio']);
                    	consultasSQL::InsertSQL("detalle", "NumPedido, CodigoProd, CantidadProductos, PrecioProd", "'$Numpedido', '".$carro['producto']."', '".$carro['cantidad']."', '$pref'");
                    	mysqli_free_result($preP);
                }
        
                /*Vaciando el carrito*/
                unset($_SESSION['carro']);
                echo '<script>
                    swal({
                        title: "Pedido realizado",
                        text: "El pedido se ha realizado con éxito",
                        type: "success",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Aceptar",
                        cancelButtonText: "Cancelar",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            location.reload();
                        } else {
                            location.reload();
                        }
                    });
                </script>';
            }else{
                echo '<script>swal("ERROR", "Ha ocurrido un error inesperado", "error");</script>';
            }
        }else{
            echo '<script>swal("ERROR", "No has seleccionado ningún producto, revisa el carrito de compras", "error");</script>';
        }
    }else{
        echo '<script>swal("ERROR", "El DNI es incorrecto, no esta registrado con ningun cliente", "error");</script>';
    }
    mysqli_free_result($verdata);
?>