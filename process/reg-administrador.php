<?php
    session_start();
    include '../library/configServer.php';
    include '../library/consulSQL.php';

    $dniAdmin=consultasSQL::clean_string($_POST['admin-dni']);
    $nomAdmin=consultasSQL::clean_string($_POST['admin-nom']);
    $apeAdmin=consultasSQL::clean_string($_POST['admin-ape']);
    $telAdmin=consultasSQL::clean_string($_POST['admin-tel']);
    $dirAdmin=consultasSQL::clean_string($_POST['admin-dir']);

    $passAdmin1=consultasSQL::clean_string($_POST['admin-pass1']);
    $passAdmin2=consultasSQL::clean_string($_POST['admin-pass2']);

    $rolAdmin=consultasSQL::clean_string($_POST['admin-rol']);

    if($passAdmin1!=$passAdmin2){
        echo '<script>swal("ERROR", "Las contraseñas que acaba de ingresar no coinciden", "error");</script>';
        exit();
    }
    $passAdminFinal=md5($passAdmin1);

    $verificar=ejecutarSQL::consultar("SELECT * FROM administrador WHERE DNI='".$dniAdmin."'");
    
    if(mysqli_num_rows($verificar)<=0)
    {
        if(consultasSQL::InsertSQL("administrador", "DNI, Nombre, Apellidos, Telefono, Direccion, Clave, rol", "'$dniAdmin','$nomAdmin','$apeAdmin','$telAdmin','$dirAdmin','$passAdminFinal','$rolAdmin'"))
        {
            echo '<script>
                swal({
                    title: "Usuario registrado",
                    text: "El usuario se registró con éxito",
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