<?php
    include '../library/configServer.php';
    include '../library/consulSQL.php';

    $numPediUp=consultasSQL::clean_string($_POST['num-pedido']);
    $reparPediUp=consultasSQL::clean_string($_POST['det-repar']);

    if($reparPediUp!="")
    {
        if(consultasSQL::UpdateSQL("venta", "Repartidor_dni='$reparPediUp'", "NumPedido='$numPediUp'"))
        {
            echo '<script>
                swal({
                    title: "Repartidor asignado",
                    text: "Se asigno un repartidor al pedido con éxito",
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
            echo '<script>swal("ERROR", "Ocurrió un error inesperado, por favor intente nuevamente", "error");</script>';
        }
      
    }
    else{
        echo '<script>swal("ERROR", "No se asigno un repartidor", "error");</script>';
    }
?>