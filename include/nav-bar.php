<?php 
    session_start(); 
    error_reporting(E_PARSE);
?>

<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo mr-auto d-none d-md-none d-lg-block "><a href="<?php echo SERVERURL; ?>">Al Carbón Grill</a></h1>

        <a href="<?php echo SERVERURL; ?>" class="logo mr-auto d-md-block d-lg-none">
            <img src="<?php echo SERVERURL; ?>assets/img/logo.png" alt="" class="img-fluid logo-nav">
        </a>

        <nav class="nav-menu d-lg-none d-md-none">
            <ul>
                <li>
                    <form action="<?php echo SERVERURL; ?>buscar.php" method="GET">
                        <div class="input-group">
                            <input type="text" id="addon1" class="form-control" name="term" required="" placeholder="Buscar">
                            <div class="input-group-append">
                                <button class="btn btn-outline-warning" type="submit"><i class="icofont-search"></i></button>
                            </div>
                        </div>
                    </form>
                </li>
                <li class="d-lg-none d-md-none">
                    <a class="btn btn-outline-warning" data-toggle="modal" data-target="#menu">
                        <i class="icofont-navigation-menu"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <nav class="nav-menu d-none d-lg-block d-md-block">
            <ul>
                <li><a href="<?php echo SERVERURL; ?>">Inicio</a></li>
                <li><a href="<?php echo SERVERURL; ?>platillos.php">Platillos</a></li>

                <?php
                    if ($_SESSION['userType']=="Repartidor")
                    {
                        ?>
                        <li><a href="<?php echo SERVERURL; ?>carrito.php">Carrito</a></li>
                        <li><a href="<?php echo SERVERURL; ?>configRepartidor.php">Administración</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#logout">Cerrar sesion</a></li>
                        <?php 
                    }
                    else if($_SESSION['userType']=="Admin")
                    {
                        ?>
                        <li><a href="<?php echo SERVERURL; ?>carrito.php">Carrito</a></li>
                        <li><a href="<?php echo SERVERURL; ?>configAdmin.php">Administración</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#logout">Cerrar sesion</a></li>
                        <?php  
                    }else if($_SESSION['userType']=="User")
                    {
                        ?>
                        <li><a href="<?php echo SERVERURL; ?>pedido.php">Pedidos</a></li>
                        <li><a href="<?php echo SERVERURL; ?>carrito.php">Carrito</a></li>
                        <li><a href="<?php echo SERVERURL; ?>my-account.php">Mi cuenta</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#logout">Cerrar sesion</a></li>
                        <?php
                    }else{
                        ?>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#login">Iniciar sesión</a>
                        </li>
                        <?php
                    }
                ?>
                <li>
                    <form action="<?php echo SERVERURL; ?>buscar.php" method="GET">
                        <div class="input-group">
                            <input type="text" id="addon1" class="form-control" name="term" required="" placeholder="Buscar">
                            <div class="input-group-append">
                                <button class="btn btn-outline-warning" type="submit"><i class="icofont-search"></i></button>
                            </div>
                        </div>
                    </form>
                </li>
                <li class="d-lg-none d-md-none">
                    <a href="#" class="btn btn-outline-warning" data-toggle="modal" data-target="#menu">
                        <i class="icofont-navigation-menu"></i>
                    </a>
                </li>
            </ul>
        </nav>

    </div>
</header>