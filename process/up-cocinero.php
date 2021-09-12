<?php
    include '../library/configServer.php';
    include '../library/consulSQL.php';

    $dniOldProveUp=consultasSQL::clean_string($_POST['dni-chef-old']);
    $nomProveUp=consultasSQL::clean_string($_POST['chef-nom']);
    $apeProveUp=consultasSQL::clean_string($_POST['chef-ape']);
    $telProveUp=consultasSQL::clean_string($_POST['chef-tel']);
    $dirProveUp=consultasSQL::clean_string($_POST['chef-dir']);

    if(consultasSQL::UpdateSQL("cocinero", "Nombre='$nomProveUp',Apellidos='$apeProveUp',Telefono='$telProveUp',Direccion='$dirProveUp'", "DNI='$dniOldProveUp'"))
    {
        echo '<script>
            swal({
                title: "Cocinero actualizado",
                text: "Los datos del cocinero se actualizaron con éxito",
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
?>