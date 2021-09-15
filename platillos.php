<?php 
    include 'library/configServer.php';
    include 'library/consulSQL.php';
    include 'include/header.php';
?>

<section id="specials" class="specials specials-padding">
    <div class="container" data-aos="fade-up">
        <div class="chefs">
            <div class="container-fluid">
                <div class="row">

                    <!-- ===== Menu lateral ===== -->
                    <?php
                        $checkAllCat=ejecutarSQL::consultar("SELECT * FROM categoria");
                        if (mysqli_num_rows($checkAllCat)>=1) 
                        {   ?>
                            <!-- ======= Categorias ======= -->
                            <div class="col-lg-2 col-md-3 d-none d-lg-block d-md-block" data-aos="fade-up" data-aos-delay="100">
                                <ul class="nav nav-tabs flex-column">
                                    <li class="nav-item">
                                          <a href="<?php echo SERVERURL; ?>platillos.php" class="nav-link">Todos</a>
                                    </li>
                                    <?php 
                                        while($cate=mysqli_fetch_array($checkAllCat, MYSQLI_ASSOC))
                                        {   ?>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo SERVERURL; ?>platillos.php?categ=<?php echo $cate['id']; ?>"><?php echo $cate['Categoria']; ?></a>
                                            </li>
                                            <?php 
                                        }
                                    ?>
                                </ul>
                            </div>
                            <?php
                        }
                    ?>
                    <!-- ===== Menu lateral Movil ===== -->
                    <div class="container container-button d-lg-none d-md-none">
                        <button class="btn btn-outline-warning" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Categorias
                        </button>
                        <?php
                            $checkAllCat=ejecutarSQL::consultar("SELECT * FROM categoria");
                            if (mysqli_num_rows($checkAllCat)>=1) 
                            { ?>
                                <div class="collapse collapse-border" id="collapseExample">
                                    <div class="card card-body card-dark">
                                        <ul class="nav nav-tabs flex-column">
                                            <li class="nav-item">
                                                  <a href="<?php echo SERVERURL; ?>platillos.php" class="nav-link">Todos</a>
                                            </li>
                                            <?php 
                                                while($cate=mysqli_fetch_array($checkAllCat, MYSQLI_ASSOC))
                                                {   ?>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="<?php echo SERVERURL; ?>platillos.php?categ=<?php echo $cate['id']; ?>"><?php echo $cate['Categoria']; ?></a>
                                                    </li>
                                                    <?php 
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                    <!-- ======= Platillos por categoria ======= -->
                    <div class="col-lg-10 col-md-9">
                        <?php
                            $categoria=consultasSQL::clean_string($_GET['categ']);
                            if(isset($categoria) && $categoria!="")
                            {
                                $mysqli = mysqli_connect(SERVER, USER, PASS, BD);
                                mysqli_set_charset($mysqli, "utf8");

                                $consultar_productos=mysqli_query($mysqli,"SELECT SQL_CALC_FOUND_ROWS * FROM producto WHERE Categoria_id='$categoria'");

                                $selCat=ejecutarSQL::consultar("SELECT * FROM categoria WHERE id='$categoria'");
                                $datCat=mysqli_fetch_array($selCat, MYSQLI_ASSOC);

                                if(mysqli_num_rows($consultar_productos)>=1)
                                {   ?>
                                    <h2 class="text-center"><?php echo $datCat['Categoria']; ?></h2>
                                    <div class="row">
                                        <?php 
                                        while($prod=mysqli_fetch_array($consultar_productos, MYSQLI_ASSOC))
                                        {
                                            if($prod['Imagen']!="" && is_file("./assets/img/platillos/".$prod['Imagen']))
                                            {
                                                $imagenFile="assets/img/platillos/".$prod['Imagen']; 
                                            }else{ 
                                                $imagenFile="assets/img/platillos/default.png"; 
                                            } ?>
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
                                }else{
                                    ?>
                                    <h2 class="text-center">Lo sentimos, no hay platillos en esta categoría</h2>
                                    <?php 
                                }
                            }else{
                                ?>
                                <!-- ======= Todos los platillos ======= -->
                                <h2 class="text-center">Todos los platillos</h2>
                                <div class="row">
                                    <?php
                                        $consulta= ejecutarSQL::consultar("SELECT * FROM producto ORDER BY id DESC");
                                        $totalproductos = mysqli_num_rows($consulta);
                                        if($totalproductos>0)
                                        {
                                            while($fila=mysqli_fetch_array($consulta, MYSQLI_ASSOC))
                                            {
                                                if($fila['Imagen']!="" && is_file("./assets/img/platillos/".$fila['Imagen']))
                                                {
                                                    $imagenFile="assets/img/platillos/".$fila['Imagen']; 
                                                }else{ 
                                                    $imagenFile="assets/img/platillos/default.png"; 
                                                }
                                                ?>
                                                <div class="col-lg-3 col-md-4 col-6">
                                                    <div class="member" data-aos="zoom-in" data-aos-delay="100">

                                                        <img src="<?php echo $imagenFile ?>" class="img-fluid" alt="">

                                                        <div class="member-info">
                                                            <div class="member-info-content">
                                                                <h4><?php echo $fila['NombreProd']; ?></h4>
                                                                <span>s/.<?php echo $fila['Precio']; ?></span>
                                                            </div>
                                                            <div class="social">
                                                                <a href="<?php echo SERVERURL; ?>detalle-platillo.php?CodigoProd=<?php echo $fila['CodigoProd']; ?>">
                                                                    <i class="icofont-plus"></i> Detalles
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                    ?> 
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