<?php
    session_start();
    include '../library/configServer.php';
    include '../library/consulSQL.php';

    $bancoCuenta=consultasSQL::clean_string($_POST['bancoCuenta']);
    $bancoNombre=consultasSQL::clean_string($_POST['bancoNombre']);
    $bancoBeneficiario=consultasSQL::clean_string($_POST['bancoBeneficiario']);
    $bancoTipo=consultasSQL::clean_string($_POST['bancoTipo']);

    if(consultasSQL::InsertSQL("cuentabanco", "Numero, Nombre, Beneficiario, Tipo", "'$bancoCuenta','$bancoNombre','$bancoBeneficiario','$bancoTipo'"))
    {
        echo '<script>
            swal({
                title: "Cuenta registrado",
                text: "La cuenta bancaria se registró con éxito",
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