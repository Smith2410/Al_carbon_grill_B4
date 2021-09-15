<?php
    include 'library/configServer.php';
    include 'library/consulSQL.php';
    include 'process/security-panel.php';
    include 'include/header.php';
?> 

<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <?php
                $admin=ejecutarSQL::consultar("SELECT * FROM administrador WHERE DNI='".$_SESSION['adminID']."'");
                $dataAdmin=mysqli_fetch_array($admin, MYSQLI_ASSOC);
                $nombreCompleto = $dataAdmin['Nombre'].' '.$dataAdmin['Apellidos'];
            ?>
            <h2><?php echo $nombreCompleto; ?></h2>
            <ol>
                <li>
                    <i class="icofont-user"></i>
                    <a href="<?php echo SERVERURL; ?>configAdmin.php?view=cuenta"> Mi cuenta</a>
                </li>
            </ol>
        </div>
    </div>
</section>

<section id="specials" class="specials specials-top">
    <div class="container" data-aos="fade-up">
        <div class="row" data-aos="fade-up" data-aos-delay="100">

            <!-- ===== Menu lateral ===== -->
            <div class="col-lg-2 col-md-3 d-none d-lg-block d-md-block">
                <ul class="nav nav-tabs flex-column">
                    <li class="nav-item">
                        <a class="nav-link active show" href="configAdmin.php">Administración</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo SERVERURL; ?>configAdmin.php?view=pedido" class="nav-link">Pedidos</a>
                    </li>
                    <?php 
                    if ($dataAdmin['rol']==0)
                    {   ?>
                        <li class="nav-item">
                            <a href="<?php echo SERVERURL; ?>configAdmin.php?view=platillo-list" class="nav-link">Platillos</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo SERVERURL; ?>configAdmin.php?view=categoria-list" class="nav-link">Categorías</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo SERVERURL; ?>configAdmin.php?view=administrador-list" class="nav-link">Administradores</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo SERVERURL; ?>configAdmin.php?view=repartidor-list" class="nav-link">Repartidores</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo SERVERURL; ?>configAdmin.php?view=cliente-list" class="nav-link">Clientes</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo SERVERURL; ?>configAdmin.php?view=cuenta-banco" class="nav-link">Cuenta bancaria</a>
                        </li>
                        <?php 
                    } ?>
                </ul>
            </div>

            <!-- ===== menu movil ===== -->
            <div class="container container-button d-lg-none d-md-none">
                <button class="btn btn-outline-warning" type="button" data-toggle="collapse" data-target="#administracion" aria-expanded="false" aria-controls="administracion">
                    Administración
                </button>
                <div class="collapse collapse-border" id="administracion">
                    <div class="card card-body card-dark">
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item">
                                <a class="nav-link active show" href="configAdmin.php">Administración</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo SERVERURL; ?>configAdmin.php?view=pedido" class="nav-link">Pedidos</a>
                            </li>
                            <?php 
                            if ($dataAdmin['rol']==0)
                            {   ?>
                                <li class="nav-item">
                                    <a href="<?php echo SERVERURL; ?>configAdmin.php?view=platillo-list" class="nav-link">Platillos</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo SERVERURL; ?>configAdmin.php?view=categoria-list" class="nav-link">Categorías</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo SERVERURL; ?>configAdmin.php?view=administrador-list" class="nav-link">Administradores</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo SERVERURL; ?>configAdmin.php?view=repartidor-list" class="nav-link">Repartidores</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo SERVERURL; ?>configAdmin.php?view=cliente-list" class="nav-link">Clientes</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo SERVERURL; ?>configAdmin.php?view=cuenta-banco" class="nav-link">Cuenta bancaria</a>
                                </li>
                                <?php 
                            } ?>
                            <li class="nav-item">
                                <a href="<?php echo SERVERURL; ?>configAdmin.php?view=cuenta" class="nav-link">Mi cienta</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- ===== Contenido del menu lateral ===== -->
            <div class="col-lg-10 col-md-9 tab-content">
                <div class="tab-pane active show">
                    <div class="details order-2 order-lg-1">
                        <?php
                            $content=$_GET['view'];

                            if ($dataAdmin['rol']==0)
                            {
                                /** Lista blanca */
                                $WhiteList=["platillo","platillo-list","platillo-info","categoria-list","categoria-info","administrador","administrador-list","administrador-info","cuenta","pedido","pedido-detalle","pedido-pendiente","pedido-enviado","pedido-entregado","pedido-info","pedido-repartidor","cuenta-banco","cliente-list","repartidor-list"];
                            }else{
                                /** Lista blanca **/
                                $WhiteList=["pedido","pedido-detalle","pedido-info","pedido-pendiente","pedido-enviado","pedido-entregado","cuenta"];
                            }
                            if(isset($content))
                            {
                                if(in_array($content, $WhiteList) && is_file("./admin/".$content."-view.php"))
                                {
                                    include "./admin/".$content."-view.php";
                                }else{
                                    ?>
                                    <h3 class="text-center">Lo sentimos, la opción que ha seleccionado no se encuentra disponible</h3>
                                    <?php
                                }
                            }else{
                               ?>
                                <!-- ===== Accesos directos ===== -->
                                <div class="tab-pane active show">
                                    <div class="details order-2 order-lg-1">
                                        <h3>Panel de Administración</h3>
                                        <!-- =======  ======= -->
                                        <div class="row">

                                            <div class="card card-dark col-lg-4 col-md-3">
                                                <div class="card-body">
                                                    <a href="<?php echo SERVERURL; ?>configAdmin.php?view=pedido">
                                                        Pedidos
                                                    </a>
                                                </div>
                                            </div>

                                            <?php 
                                            if ($dataAdmin['rol']==0)
                                            {   ?>

                                                <div class="card card-dark col-lg-4 col-md-3">
                                                    <div class="card-body">
                                                        <a href="<?php echo SERVERURL; ?>configAdmin.php?view=platillo-list">
                                                            Platillos
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="card card-dark col-lg-3 col-md-3">
                                                    <div class="card-body">
                                                        <a href="<?php echo SERVERURL; ?>configAdmin.php?view=categoria-list">
                                                            Categorias
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="card card-dark col-lg-4 col-md-3">
                                                    <div class="card-body">
                                                        <a href="<?php echo SERVERURL; ?>configAdmin.php?view=administrador-list">
                                                            Administradores
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="card card-dark col-lg-4 col-md-3">
                                                    <div class="card-body">
                                                        <a href="<?php echo SERVERURL; ?>configAdmin.php?view=repartidor-list"
                                                            >
                                                            Repartidores
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="card card-dark col-lg-3 col-md-3">
                                                    <div class="card-body">
                                                        <a href="<?php echo SERVERURL; ?>configAdmin.php?view=cliente-list">
                                                            Clientes
                                                        </a>
                                                    </div>
                                                </div>
                                                <?php 
                                            } ?>

                                            <div class="card card-dark col-lg-3 col-md-3">
                                                <div class="card-body">
                                                    <a href="<?php echo SERVERURL; ?>configAdmin.php?view=cuenta">
                                                        Mi cuenta
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                               <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'include/footer.php'; ?>