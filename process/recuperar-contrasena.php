<?php
    session_start();
    include '../library/configServer.php';
    include '../library/consulSQL.php';

    $dniUser=consultasSQL::clean_string($_POST['user-dni']);
    $telUser=consultasSQL::clean_string($_POST['user-tel']);
    $password1=consultasSQL::clean_string($_POST['user-pass1']);
    $password2=consultasSQL::clean_string($_POST['user-pass2']);

    $finalDni=$dniOld;
    $finalTel=$telOld;

    if($dniOld==$dniUser && $telOld==$telUser)
    {
        $verificar=ejecutarSQL::consultar("SELECT * FROM cliente WHERE DNI='".$dniUser."' AND Telefono='".$telUser."'");
        if(mysqli_num_rows($verificar)<=0){
            $finalDni=$dniUser;
            $finalTel=$telUser;
        }else{
            echo '<script>swal("ERROR", "El DNI y/o Telefono que acaba de ingresar no existen en el sistema", "error");</script>';
            exit();
        }
    }

    if($password1!="" && $password2!=""){
        if($password1!=$password2){
            echo '<script>swal("ERROR", "Las contraseñas que acaba de ingresar no coinciden", "error");</script>';
            exit();
        }else{
            $finalPass=md5($password1);
            $campos="Clave='$finalPass'";
        }
    }

    if(consultasSQL::UpdateSQL("cliente", $campos, "DNI='$dniUser'"))
    {
        echo '<script>
            swal({
                title: "Contraseña actualizado",
                text: "Tu contraseña se actualizo con éxito",
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