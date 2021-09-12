<?php include 'include/header.php'; ?>

<section id="specials" class="specials specials-padding">
    <div class="container" data-aos="fade-up">
        <?php
            session_start();
            include 'library/configServer.php';
            include 'library/consulSQL.php';

            $SelectUser=ejecutarSQL::consultar("SELECT * FROM cliente WHERE DNI='".$_SESSION['userDNI']."'");
            $DataUser=mysqli_fetch_array($SelectUser, MYSQLI_ASSOC);

            if($_SESSION['userType']=="User")
            {
                ?>
                <div class="section-title">
                    <p>Mi cuenta</p>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="100">

                    <!-- ===== Menu lateral ===== -->
                    <div class="col-lg-3 col-md-3">
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item">
                                <a class="nav-link active show" data-toggle="tab" href="#tab-1">Mi cuenta</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo SERVERURL; ?>pedido.php">Mis pedidos</a>
                            </li>
                        </ul>
                    </div>

                    <!-- ===== Contenido Menu lateral ===== -->
                    <div class="col-lg-9 col-md-9 mt-4 mt-lg-0">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tab-1">
                                <div class="row">
                                    <div class="col-lg-12 details order-2 order-lg-1">
                                        <h3>Actualizar cuenta</h3>
                                        <div id="book-a-table" class="book-a-table">
                                            <form action="<?php echo SERVERURL; ?>process/up-cliente.php" method="POST" role="form" class="FormCatElec" data-form="update">
                                                <div class="php-email-form">
                                                    <div class="form-row">
                                                        <div class="col-lg-3 col-md-3 form-group">
                                                            <label>DNI</label>
                                                            <input class="form-control" type="text" required readonly name="clien-dni" value="<?php echo $DataUser['DNI']; ?>">
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 form-group">
                                                            <label>Nombre</label>
                                                            <input class="form-control" type="text" name="clien-nom" value="<?php echo $DataUser['Nombre']; ?>" pattern="[a-zA-Z]{4,9}" required="">
                                                        </div>
                                                        <div class="col-lg-5 col-md-5 form-group">
                                                            <label>Apellidos</label>
                                                            <input class="form-control" type="text" name="clien-ape" value="<?php echo $DataUser['Apellidos']; ?>" pattern="[a-zA-Z]{4,9}" required="">
                                                        </div>
                                                        <div class="col-lg-7 col-md-7 form-group">
                                                            <label>Teléfono</label>
                                                            <input class="form-control" type="text" name="clien-tel" value="<?php echo $DataUser['Telefono']; ?>" pattern="[0-9]{4,9}" required="">
                                                        </div>
                                                        <div class="col-lg-5 col-md-5 form-group">
                                                            <label>Dirección</label>
                                                            <input class="form-control" type="text" name="clien-dir" value="<?php echo $DataUser['Direccion']; ?>" pattern="[a-zA-Z0-9]{4,9}" required="">
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="text-warning text-center">No es necesario actualizar la contraseña, sin embargo si desea hacerlo debe de ingresar su contraseña actual, despues una nueva contraseña y volver a ingresar la nueva contraseña.</p>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 form-group">
                                                            <input class="form-control" type="password" name="clien-old-pass" placeholder="Contraseña actual">
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 form-group">
                                                            <input class="form-control" type="password"  name="clien-new-pass" placeholder="Nueva contraseña">
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 form-group">
                                                            <input class="form-control" type="password"  name="clien-new-pass2" placeholder="Repita la nueva contraseña">
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="submit" class="btn book-a-table-btn">Guardar cambios</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
            }else{
                ?>
                <script> location.href="index.php"; </script>
                <?php 
            }
        ?>
    </div>
</section>

<?php include './include/footer.php'; ?>