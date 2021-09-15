<?php
    include 'library/configServer.php';
    include 'library/consulSQL.php';
    include 'include/header.php'; 
?>

<section id="chefs" class="chefs chefs-padding">
    <?php
    $search=consultasSQL::clean_string($_GET['term']);
    if(isset($search) && $search!="")
    { ?>
        <div class="container" data-aos="fade-up">
            <?php
            $mysqli = mysqli_connect(SERVER, USER, PASS, BD);
            mysqli_set_charset($mysqli, "utf8");

            $consultar_productos=mysqli_query($mysqli,"SELECT SQL_CALC_FOUND_ROWS * FROM producto WHERE NombreProd LIKE '%".$search."%'");

            if(mysqli_num_rows($consultar_productos)>=1)
            { ?>
                <div class="section-title title-search">
                    <h2>Busqueda relacionada con</h2>
                    <p><?php echo $search; ?></p>
                </div>
                <div class="row">
                    <?php 
                    while($prod=mysqli_fetch_array($consultar_productos, MYSQLI_ASSOC))
                    { 
                        if($prod['Imagen']!="" && is_file("./assets/img/platillos/".$prod['Imagen']))
                        {
                            $imagenFile="assets/img/platillos/".$prod['Imagen']; 
                        }else{ 
                            $imagenFile="assets/img/platillos/default.png"; 
                        }
                        ?>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="member" data-aos="zoom-in" data-aos-delay="100">
                                <img src="<?php echo $imagenFile ?>" class="img-fluid" alt="">
                                <div class="member-info">
                                    <div class="member-info-content">
                                        <h4><?php echo $prod['NombreProd']; ?></h4>
                                        <span>s/.<?php echo $prod['Precio']; ?></span>
                                    </div>
                                    <div class="social">
                                        <a href="<?php echo SERVERURL; ?>detalle-platillo.php?CodigoProd=<?php echo $prod['CodigoProd']; ?>">
                                            <i class="icofont-plus"></i> Detalles
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php    
                    } ?>
                </div>
                <?php 
            }else{ ?>
                <h2 class="text-center">Lo sentimos, no hemos encontrado ningun platillos con este nombre</h2>
                <?php
            } ?>
        </div>
        <?php
    }else{ ?>
        <h2 class="text-center">Por favor escriba el nombre del platillo que desea buscar.</h2>
        <?php
    } ?>
</section>

<?php include 'include/footer.php'; ?>