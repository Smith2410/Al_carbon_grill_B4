<?php
    session_start();
    include '../library/configServer.php';
    include '../library/consulSQL.php';

    $dniRepar=consultasSQL::clean_string($_POST['repar-dni']);
    $nomRepar=consultasSQL::clean_string($_POST['repar-nom']);
    $apeRepar=consultasSQL::clean_string($_POST['repar-ape']);
    $telRepar=consultasSQL::clean_string($_POST['repar-tel']);
    $dirRepar=consultasSQL::clean_string($_POST['repar-dir']);

    $passRepar1=consultasSQL::clean_string($_POST['repar-pass1']);
    $passRepar2=consultasSQL::clean_string($_POST['repar-pass2']);

    $rolRepar=consultasSQL::clean_string($_POST['repar-rol']);

    if($passRepar1!=$passRepar2){
        echo '<script>swal("ERROR", "Las contraseñas que acaba de ingresar no coinciden", "error");</script>';
        exit();
    }
    $passAdminFinal=md5($passRepar1);

    $verificar=ejecutarSQL::consultar("SELECT * FROM administrador WHERE DNI='".$dniRepar."'");

    if(mysqli_num_rows($verificar)<=0)
    {
        if(consultasSQL::InsertSQL("administrador", "DNI, Nombre, Apellidos, Telefono, Direccion, Clave, rol", "'$dniRepar','$nomRepar','$apeRepar','$telRepar','$dirRepar','$passAdminFinal','$rolRepar'"))
        {
            echo '<script>
                swal({
                    title: "Repartidor registrado",
                    text: "El repartidor se registró con éxito",
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
?>