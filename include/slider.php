<?php 
    session_start(); 
    error_reporting(E_PARSE);
?>

<section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-left" data-aos="zoom-in" data-aos-delay="100">

        <div class="row">

            <div class="col-lg-8">
                <h1>Bienvenido <span>Al Carbón Grill</span></h1>
                <h2>Pollos y parrillas</h2>
                <div class="btns">
                    <?php
                        if ($_SESSION['adminID']=="" && $_SESSION['userDNI']=="") {
                            ?>
                            <a class="btn-menu animated fadeInUp scrollto" type="button" data-toggle="modal" data-target="#login">Iniciar sesión</a>
                            <?php 
                        }else{
                            ?>
                            <a href="<?php echo SERVERURL; ?>platillos.php" class="btn-menu animated fadeInUp scrollto">Platillos</a>
                            <?php
                        }
                    ?>
                    <a href="<?php echo SERVERURL; ?>assets/pdf/Carta_Al_Carbon_Grill.pdf" target="_blank" class="btn-book animated fadeInUp scrollto">Descarga nuestra carta</a>
                </div>
            </div>

        </div>
        
    </div>
</section>                            