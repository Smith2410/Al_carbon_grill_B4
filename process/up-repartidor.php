<?php
    session_start();
    include '../library/configServer.php';
    include '../library/consulSQL.php';

    $dniRepar=consultasSQL::clean_string($_POST['repar-dni']);
    $nomRepar=consultasSQL::clean_string($_POST['repar-nom']);
    $apeRepar=consultasSQL::clean_string($_POST['repar-ape']);
    $telRepar=consultasSQL::clean_string($_POST['repar-tel']);
    $dirRepar=consultasSQL::clean_string($_POST['repar-dir']);

    $oldPass=consultasSQL::clean_string($_POST['repar-old-pass']);
    $password1=consultasSQL::clean_string($_POST['repar-pass1']);
    $password2=consultasSQL::clean_string($_POST['repar-pass2']);

    $rolRepar=consultasSQL::clean_string($_POST['repar-rol']);

    if($oldPass!="" && $password1!="" && $password2!=""){
    	if($password1!=$password2){
    		echo '<script>swal("ERROR", "Las contraseñas que acaba de ingresar no coinciden", "error");</script>';
    		exit();
        	}else{
        		$oldPass=md5($oldPass);
                $CheckLog=ejecutarSQL::consultar("SELECT * FROM administrador WHERE DNI='".$dniRepar."' AND Clave='$oldPass'");

                if(mysqli_num_rows($CheckLog)==1)
                {
                    $password1=md5($password1);
                    $campos="Nombre='$nomRepar',Apellidos='$apeRepar',Telefono='$telRepar',Direccion='$dirRepar',Clave='$password1',rol='$rolRepar'";
                }else{
                    echo '<script>swal("Ocurrio un error inesperado", "La contraseña actual no coincide con la que se encuentra registrada en el sistema", "error");</script>';
                    exit();
                }
        	}
        }else{
            $campos="Nombre='$nomRepar',Apellidos='$apeRepar',Telefono='$telRepar',Direccion='$dirRepar',rol='$rolRepar'";
        }

    if(consultasSQL::UpdateSQL("administrador", $campos, "DNI='$dniRepar'"))
    {
        echo '<script>
            swal({
                title: "Repartidor actualizado",
                text: "Los datos del repartidor se actualizaron con éxito",
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
                }else {
                    location.reload();
                }
            });
        </script>';
    }else{
       echo '<script>swal("ERROR", "Ocurrió un error inesperado, por favor intente nuevamente", "error");</script>';
    }
?>