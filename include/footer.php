        <div class="ResForm"></div>
        <div class="ResbeforeSend"></div>

    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="footer-info logo-cont">
                            <a href="<?php echo SERVERURL; ?>">
                                <img src="<?php echo SERVERURL; ?>assets/img/logo.png" class="logo-footer" alt="">
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-4">
                        <div class="footer-info logo-cont">
                            <h3>Al carbon grill</h3>
                            <p>
                               APV Los libertadores<br>
                                Huadquiña - Santa Teresa<br><br>
                                <strong>Teléfono:</strong> +51 987 654 321<br>
                                <strong>E-mail:</strong> alcarbongrill@gmail.com<br>
                            </p>
                            <div class="social-links mt-3">
                                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 d-none d-lg-block d-md-block">
                        <div class="footer-links">
                            <ul>
                                <li>
                                    <form action="<?php echo SERVERURL; ?>buscar.php" method="GET">
                                        <div class="container input-group">
                                            <input type="text" id="addon1" class="form-control" name="term" required="" placeholder="Buscar">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-warning" type="submit"><i class="icofont-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                                <li>
                                    <i class="bx bx-chevron-right"></i>
                                    <a href="<?php echo SERVERURL; ?>platillos.php">Platillos</a>
                                </li>
                                <?php 
                                if (!empty($_SESSION['activo'])) {
                                    ?>
                                    <li>
                                        <i class="bx bx-chevron-right"></i>
                                        <a href="<?php echo SERVERURL; ?>carrito.php">Carrito</a>
                                    </li>

                                    <?php 
                                    if ($_SESSION['userType']=="User") {
                                        ?>
                                        <li>
                                            <i class="bx bx-chevron-right"></i>
                                            <a href="<?php echo SERVERURL; ?>pedido.php">Pedidos</a>
                                        </li>
                                        <li>
                                            <i class="bx bx-chevron-right"></i>
                                            <a href="<?php echo SERVERURL; ?>my-account.php">Mi cuenta</a>
                                        </li>
                                        <?php
                                    }else{
                                        ?>
                                        <li>
                                            <i class="bx bx-chevron-right"></i>
                                            <a href="<?php echo SERVERURL; ?>configAdmin.php">Administración</a>
                                        </li>
                                        <?php
                                    } ?>
                                    <li>
                                        <i class="bx bx-chevron-right"></i>
                                        <a href="#" data-toggle="modal" data-target="#logout">Cerrar sesion</a>
                                    </li>
                                    <?php
                                }else{
                                    ?>
                                    <li>
                                        <i class="bx bx-chevron-right"></i>
                                        <a href="#" data-toggle="modal" data-target="#login">Iniciar sesión</a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ======= Nav Bar ======= -->
    <?php include 'modals.php'; ?>

    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>

    <!-- JS Files -->
    <script src="<?php echo SERVERURL; ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo SERVERURL; ?>assets/js/autohidingnavbar.min.js"></script>
    <script src="<?php echo SERVERURL; ?>assets/js/sweetalert.min.js"></script>
    <script src="<?php echo SERVERURL; ?>assets/js/main.js"></script>

    <script src="<?php echo SERVERURL; ?>assets/js/bootstrap.min.js"></script> 
    <script src="<?php echo SERVERURL; ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo SERVERURL; ?>assets/js/jquery.easing.min.js"></script>
    <script src="<?php echo SERVERURL; ?>assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo SERVERURL; ?>assets/js/isotope.pkgd.min.js"></script>
    <script src="<?php echo SERVERURL; ?>assets/js/venobox.min.js"></script>
    <script src="<?php echo SERVERURL; ?>assets/js/aos.js"></script>

    <script src="<?php echo SERVERURL; ?>assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo SERVERURL; ?>assets/js/jquery.dataTables.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/mains.js"></script>
</body>
</html>