<?php
    session_start();
    include '../library/configServer.php';
    include '../library/consulSQL.php';

    $codeProd=consultasSQL::clean_string($_POST['prod-codigo']);
    $nameProd=consultasSQL::clean_string($_POST['prod-name']);
    $cateProd=consultasSQL::clean_string($_POST['prod-categoria']);
    $priceProd=consultasSQL::clean_string($_POST['prod-price']);
    $descripProd=consultasSQL::clean_string($_POST['prod-descrip']);
    $imgName=$_FILES['img']['name'];
    $imgType=$_FILES['img']['type'];
    $imgSize=$_FILES['img']['size'];
    $imgMaxSize=5120;

    if($codeProd!="" && $nameProd!="" && $cateProd!="" && $priceProd!="")
    {
        $verificar=  ejecutarSQL::consultar("SELECT * FROM producto WHERE CodigoProd='".$codeProd."'");
        $verificaltotal = mysqli_num_rows($verificar);
        if($verificaltotal<=0)
        {
            if($imgType=="image/jpeg" || $imgType=="image/png")
            {
                if(($imgSize/1024)<=$imgMaxSize){
                    chmod('../assets/img/platillos/', 0777);
                    switch ($imgType) {
                      case 'image/jpeg':
                        $imgEx=".jpg";
                      break;
                      case 'image/png':
                        $imgEx=".png";
                      break;
                    }
                    $imgFinalName=$codeProd.$imgEx;
                    if(move_uploaded_file($_FILES['img']['tmp_name'],"../assets/img/platillos/".$imgFinalName))
                    {
                        if(consultasSQL::InsertSQL("producto", "CodigoProd, NombreProd, Categoria_id, Precio, Descripcion, Imagen", "'$codeProd','$nameProd','$cateProd','$priceProd', '$descripProd','$imgFinalName'"))
                        {
                            echo '<script>
                                swal({
                                    title: "Platillo registrado",
                                    text: "El platillo se registró con éxito",
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
                                        location.href="configAdmin.php?view=platillo-list";
                                    } else {
                                        location.reload();
                                    }
                                });
                            </script>';
                        }else{
                            echo '<script>swal("ERROR", "Ocurrió un error inesperado, por favor intente nuevamente", "error");</script>';
                        }   
                    }else{
                        echo '<script>swal("ERROR", "Ha ocurrido un error al cargar la imagen", "error");</script>';
                    }  
                }else{
                    echo '<script>swal("ERROR", "Ha excedido el tamaño máximo de la imagen, tamaño máximo es de 5MB", "error");</script>';
                }
            }else{
                echo '<script>swal("ERROR", "El formato de la imagen del producto es invalido, solo se admiten archivos con la extensión .jpg y .png ", "error");</script>';
            }
        }else{
            echo '<script>swal("ERROR", "El código del platillo ya está registrado en el sistema, por favor recargue la pagina para actualizar el codigo", "error");</script>';
        }
    }else {
        echo '<script>swal("ERROR", "Los campos no deben de estar vacíos, por favor verifique e intente nuevamente", "error");</script>';
    }
?>