<?php include 'include/header.php'; ?> 

<section id="book-a-table" class="book-a-table book-a-table-padding">
    <!-- ======= Pago pendiente ======= --> 
    <div class="container">
        <div>
            <?php
                require_once "library/configServer.php";
                require_once "library/consulSQL.php";
                if($_SESSION['adminID']!="" || $_SESSION['userDNI']!="")
                {
                    if(isset($_SESSION['carro']))
                    { ?>
                        <div class="section-title section-title-padding">
                            <p>Pedidos</p>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p class="text-center lead">Selecciona un método de pago</p>

                                    <div class="text-center">
                                        <button type="button" class="btn btn-outline-warning btn-style" data-toggle="modal" data-target="#TransaccionBancaria">
                                            Transaccion Bancaria
                                        </button>
                                        
                                        <button type="button" class="btn btn-outline-warning btn-style" data-toggle="modal" data-target="#PagoEfectivo">
                                            Pago en efectivo
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }else{
                        ?>
                        <p class="text-center">No tienes pedidos pendientes de pago</p>
                        <?php
                    }
                }else{
                    ?>
                    <script> location.href="index.php"; </script>
                    <?php
                }
            ?>
        </div>
    </div>

    <?php
        if($_SESSION['userType']=="User")
        { ?>
            <!-- ======= pedidos / pendientes / enviados / entregados ======= --> 
            <div id="specials" class="specials">
                <div class="container" data-aos="fade-up">
                    <div class="section-title section-title-padding">
                        <p>Mis pedidos</p>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-lg-3 col-md-3">
                            <!-- ======= Menu pedidos======= --> 
                            <ul class="nav nav-tabs flex-column">
                                <li class="nav-item">
                                    <a class="nav-link active show" data-toggle="tab" href="#tab-1">Todos mis pedidos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab-2">Pedidos pendientes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab-3">Pedidos Enviados</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab-4">Pedidos entregados</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-9 col-md-9 mt-4 mt-lg-0">
                            <!-- ======= Contenido Pedidos======= -->
                            <div class="tab-content">

                                <!-- ======= Todos los pedidos======= --> 
                                <div class="tab-pane active show" id="tab-1">
                                    <?php
                                        $consultaC=ejecutarSQL::consultar("SELECT * FROM venta WHERE Cliente_dni='".$_SESSION['userDNI']."'");
                                        if(mysqli_num_rows($consultaC)>=1)
                                        {
                                            ?> 
                                            <div class="row">
                                                <div class="col-lg-12 details order-2 order-lg-1">
                                                    <h3>Todos mis pedidos</h3>
                                                    <?php include 'pedido-contenido.php'; ?>
                                                </div>
                                            </div>
                                            <?php
                                        }else{
                                            ?><h3>Todos mis pedidos</h3>
                                            <p class="text-center lead">No realizaste ningun pedido</p>
                                            <?php
                                        }
                                        mysqli_free_result($consultaC);
                                    ?>
                                </div>

                                <!-- ======= Pendientes ======= -->
                                <div class="tab-pane" id="tab-2">
                                    <?php
                                        $consultaC=ejecutarSQL::consultar("SELECT * FROM venta WHERE Cliente_dni='".$_SESSION['userDNI']."' AND Estado='Pendiente'");
                                        if(mysqli_num_rows($consultaC)>=1)
                                        {
                                            ?> 
                                            <div class="row">
                                                <div class="col-lg-12 details order-2 order-lg-1">
                                                    <h3>Mis pedidos pendientes</h3>
                                                    <?php include 'pedido-contenido.php'; ?>
                                                </div>
                                            </div>
                                            <?php
                                        }else{
                                            ?><h3>Mis pedidos pendientes</h3>
                                            <p class="text-center lead">No tienes ningun pedido pendiente</p><?php 
                                        }
                                        mysqli_free_result($consultaC);
                                    ?>
                                </div>

                                <!-- ======= Enviados ======= --> 
                                <div class="tab-pane" id="tab-3">
                                    <?php
                                        $consultaC=ejecutarSQL::consultar("SELECT * FROM venta WHERE Cliente_dni='".$_SESSION['userDNI']."' AND Estado='Enviado'");
                                        if(mysqli_num_rows($consultaC)>=1)
                                        {
                                            ?> 
                                            <div class="row">
                                                <div class="col-lg-12 details order-2 order-lg-1">
                                                    <h3>Mis pedidos Enviados</h3>
                                                    <?php include 'pedido-contenido.php'; ?>
                                                </div>
                                            </div>
                                            <?php
                                        }else{
                                            ?><h3>Mis pedidos Enviados</h3>
                                            <p class="text-center lead">No tienes ningun pedido enviado</p><?php
                                        }
                                        mysqli_free_result($consultaC);
                                    ?>
                                </div>

                                <!-- ======= Entregados ======= -->  
                                <div class="tab-pane" id="tab-4">
                                    <?php
                                        $consultaC=ejecutarSQL::consultar("SELECT * FROM venta WHERE Cliente_dni='".$_SESSION['userDNI']."' AND Estado='Entregado'");
                                        if(mysqli_num_rows($consultaC)>=1)
                                        {
                                            ?> 
                                            <div class="row">
                                                <div class="col-lg-12 details order-2 order-lg-1">
                                                    <h3>Mis pedidos Entregados</h3>
                                                    <?php include 'pedido-contenido.php'; ?>
                                                </div>
                                            </div>
                                            <?php
                                        }else{
                                            ?><h3>Mis pedidos Entregados</h3>
                                            <p class="text-center lead">No tienes ningun pedido entregado</p><?php 
                                        }
                                        mysqli_free_result($consultaC);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
        }
    ?>
</section>

<?php include 'include/footer.php'; ?>