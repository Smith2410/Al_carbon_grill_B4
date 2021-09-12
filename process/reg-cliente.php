<?php
    include '../library/configServer.php';
    include '../library/consulSQL.php';

    $dniClient=consultasSQL::clean_string($_POST['clien-dni']);
    $nomClient=consultasSQL::clean_string($_POST['clien-nom']);
    $apeClient=consultasSQL::clean_string($_POST['clien-ape']);
    $dirClient=consultasSQL::clean_string($_POST['clien-dir']);
    $telClient=consultasSQL::clean_string($_POST['clien-tel']);

    $passClient=consultasSQL::clean_string(md5($_POST['clien-pass']));
    $passClient2=consultasSQL::clean_string(md5($_POST['clien-pass2']));

    if(!$dniClient=="" && !$apeClient=="" && !$dirClient=="" && !$telClient=="" && !$nomClient=="")
    {
        if($passClient==$passClient2)
        {
            $verificar= ejecutarSQL::consultar("SELECT * FROM cliente WHERE DNI='".$dniClient."'");
            $verificaltotal = mysqli_num_rows($verificar);
            if($verificaltotal<=0)
            {
                if(consultasSQL::InsertSQL("cliente", "DNI, Nombre, Apellidos, Direccion, Clave, Telefono", "'$dniClient','$nomClient','$apeClient','$dirClient', '$passClient','$telClient'"))
                {
                    echo '<script>
                        swal({
                            title: "Registro completado",
                            text: "El registro se completó con éxito, ya puedes iniciar sesión en el sistema",
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
                echo '<script>swal("ERROR", "El DNI que ha ingresado ya está registrado en el sistema, por favor ingrese otro", "error");</script>';
            }
            mysqli_free_result($verificar);
        }else{
            echo '<script>swal("ERROR", "Las contraseñas no coinciden, por favor verifique e intente nuevamente", "error");</script>';
        }
    }else {
        echo '<script>swal("ERROR", "Los campos no pueden estar vacíos", "error");</script>';
    }
?>