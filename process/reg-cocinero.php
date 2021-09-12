<?php
    session_start();
    include '../library/configServer.php';
    include '../library/consulSQL.php';

    $dniChef=consultasSQL::clean_string($_POST['chef-dni']);
    $nomChef=consultasSQL::clean_string($_POST['chef-nom']);
    $apeChef=consultasSQL::clean_string($_POST['chef-ape']);
    $dirChef=consultasSQL::clean_string($_POST['chef-dir']);
    $telChef=consultasSQL::clean_string($_POST['chef-tel']);

    $verificar=  ejecutarSQL::consultar("SELECT * FROM cocinero WHERE DNI='".$dniChef."'");
    if(mysqli_num_rows($verificar)<=0)
    {
        if(consultasSQL::InsertSQL("cocinero", "DNI, Nombre, Apellidos, Telefono, Direccion", "'$dniChef','$nomChef','$apeChef','$telChef','$dirChef'"))
        {
            echo '<script>
                swal({
                    title: "Cocinero registrado",
                    text: "El cocinero se registró con éxito",
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
    }else{
        echo '<script>swal("ERROR", "El DNI que acaba de ingresar ya se encuentra registrado, por favor ingrese otro", "error");</script>';
    }
    mysqli_free_result($verificar);