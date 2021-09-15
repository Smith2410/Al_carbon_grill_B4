<?php
    session_start();
    include '../library/configServer.php';
    include '../library/consulSQL.php';
    $codeOldProdUp=consultasSQL::clean_string($_POST['code-old-prod']);
    $nameProdUp=consultasSQL::clean_string($_POST['prod-name']);
    $catProdUp=consultasSQL::clean_string($_POST['prod-categoria']);
    $priceProdUp=consultasSQL::clean_string($_POST['prod-price']);
    $descripProdUp=consultasSQL::clean_string($_POST['prod-descrip']);
    $imgName=$_FILES['img']['name'];
    $imgType=$_FILES['img']['type'];
    $imgSize=$_FILES['img']['size'];
    $imgMaxSize=5120;

    if($imgName!="")
    {
        if($imgType=="image/jpeg" || $imgType=="image/png")
        {
            if(($imgSize/1024)<=$imgMaxSize)
            {
                chmod('../assets/img/platillos/', 0777);
                switch ($imgType) {
                    case 'image/jpeg':
                        $imgEx=".jpg";
                    break;
                    case 'image/png':
                        $imgEx=".png";
                    break;
                }
                $imgFinalName=$codeOldProdUp.$imgEx;
                if(!move_uploaded_file($_FILES['img']['tmp_name'],"../assets/img/platillos/".$imgFinalName))
                {
                    echo '<script>swal("ERROR", "Ha ocurrido un error al cargar la imagen", "error");</script>';
                    exit();
                }
            }else{
                echo '<script>swal("ERROR", "Ha excedido el tamaño máximo de la imagen, tamaño máximo es de 5MB", "error");</script>';
                exit();
            }
        }else{
            echo '<script>swal("ERROR", "El formato de la imagen del producto es invalido, solo se admiten archivos con la extensión .jpg y .png ", "error");</script>';
            exit();
        }
    }

    if(consultasSQL::UpdateSQL("producto", "NombreProd='$nameProdUp',Categoria_id='$catProdUp',Precio='$priceProdUp',Descripcion='$descripProdUp'", "CodigoProd='$codeOldProdUp'"))
    {
       echo '<script>
            swal({
                title: "Producto actualizado",
                text: "Los datos del platillo se actualizaron con éxito",
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
?>