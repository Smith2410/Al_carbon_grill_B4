<?php
    session_start();
    include '../library/configServer.php';
    include '../library/consulSQL.php';

    $nameCateg=consultasSQL::clean_string($_POST['categ-name']);

    $verificar=ejecutarSQL::consultar("SELECT * FROM categoria WHERE Categoria='".$nameCateg."'");
    if(mysqli_num_rows($verificar)<=0)
    {
        if(consultasSQL::InsertSQL("categoria", "Categoria", "'$nameCateg'"))
        {
            echo '<script>
                swal({
                    title: "Categoría registrada",
                    text: "La categoría se registró con éxito",
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
        echo '<script>swal("ERROR", "La categoria que ha ingresado ya se encuentra registrado en el sistema, por favor verifique e intente nuevamente", "error");</script>';
    }
    mysqli_free_result($verificar);
?>