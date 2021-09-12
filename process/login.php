<?php
    session_start();
    include '../library/configServer.php';
    include '../library/consulSQL.php';

    $dni=consultasSQL::clean_string($_POST['dni-login']);
    $clave=consultasSQL::clean_string(md5($_POST['clave-login']));
    $radio=consultasSQL::clean_string($_POST['optionsRadios']);
    if($dni!="" && $clave!="")
    {
        if($radio=="option2")
        {
            $verAdmin=ejecutarSQL::consultar("SELECT * FROM administrador WHERE DNI='$dni' AND Clave='$clave'");
            $AdminC=mysqli_num_rows($verAdmin);
            if($AdminC>0)
            {
                $filaU=mysqli_fetch_array($verAdmin, MYSQLI_ASSOC);
                $_SESSION['claveAdmin']=$clave;
                $_SESSION['adminID']=$filaU['DNI'];

                if ($filaU['rol'] == 0) {               
                    $_SESSION['userType']="Admin";
                    echo '<script> location.href="index.php"; </script>';
                }else{
                    $_SESSION['userType']="Repartidor";
                    echo '<script> location.href="index.php"; </script>';
                }
            }else{
              echo '<p class="text-danger p-style">Error DNI y/o contraseña invalido</p>';
            }
        }
        if($radio=="option1")
        {
            $verUser=ejecutarSQL::consultar("SELECT * FROM cliente WHERE DNI='$dni' AND Clave='$clave'");
            $filaU=mysqli_fetch_array($verUser, MYSQLI_ASSOC);
            $UserC=mysqli_num_rows($verUser);
            if($UserC>0)
            {
                $_SESSION['claveUser']=$clave;
                $_SESSION['userType']="User";
                $_SESSION['userDNI']=$filaU['DNI'];
                echo '<script> location.href="index.php"; </script>';
            }else{
                echo '<p class="text-danger p-style">Error DNI y/o contraseña invalido</p>';
            }
        }
    }else{
        echo 'Error campo vacío<br>Intente nuevamente';
    }
?>