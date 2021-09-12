<?php
    include './library/configServer.php';
    include './library/consulSQL.php';
    include './process/security-panel.php';
    include './include/header.php';
?>

<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <?php
                $repart=ejecutarSQL::consultar("SELECT * FROM administrador WHERE DNI='".$_SESSION['adminID']."'");
                $dataRepar=mysqli_fetch_array($repart, MYSQLI_ASSOC);
                $nombreCompletoRepar = $dataRepar['Nombre'].' '.$dataRepar['Apellidos'];
            ?>
            <h2><?php echo $nombreCompletoRepar ?></h2>
            <ol>
                <li>
                    <i class="icofont-user"></i>
                    <a href="<?php echo SERVERURL; ?>configRepartidor.php?view=cuenta"> Mi cuenta</a>
                </li>
            </ol>
        </div>
    </div>
</section>

<section id="specials" class="specials">
    <div class="container" data-aos="fade-up">
        <div class="row" data-aos="fade-up" data-aos-delay="100">

            <!-- ===== Menu lateral ===== -->
            <div class="col-lg-2 col-md-3 d-none d-lg-block d-md-block">
                <ul class="nav nav-tabs flex-column">
                    <li class="nav-item">
                        <a href="#" class="nav-link active show">Administración</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo SERVERURL; ?>configRepartidor.php?view=pedido" class="nav-link">Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo SERVERURL; ?>configRepartidor.php?view=cuenta" class="nav-link">Mi cuenta</a>
                    </li>
                </ul>
            </div>

            <!-- ===== menu movil ===== -->
            <div class="container d-lg-none d-md-none">
                <button class="btn btn-outline-warning" type="button" data-toggle="collapse" data-target="#administracion" aria-expanded="false" aria-controls="administracion">
                    Administración
                </button>
                <div class="collapse" id="administracion">
                    <div class="card card-body card-dark">
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item">
                                <a href="<?php echo SERVERURL; ?>configRepartidor.php?view=pedido" class="nav-link">Pedidos</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo SERVERURL; ?>configRepartidor.php?view=cuenta" class="nav-link">Mi cuenta</a>
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

                            /** Lista blanca **/
                            $WhiteList=["pedido","pedido-detalle","pedido-info","pedido-pendiente","pedido-enviado","pedido-entregado","cuenta"];
                            if(isset($content))
                            {
                                if(in_array($content, $WhiteList) && is_file("./repartidor/".$content."-view.php"))
                                {
                                    include "./repartidor/".$content."-view.php";
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
                                        <div class="row">

                                            <div class="card card-dark col-lg-4 col-md-3">
                                                <div class="card-body">
                                                    <a href="<?php echo SERVERURL; ?>configRepartidor.php?view=pedido">
                                                        Pedidos
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="card card-dark col-lg-3 col-md-3">
                                                <div class="card-body">
                                                    <a href="<?php echo SERVERURL; ?>configRepartidor.php?view=cuenta">
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

<?php include './include/footer.php'; ?>