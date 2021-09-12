<?php
    include './library/configServer.php';
    include './library/consulSQL.php';
    include './include/header.php';
?>

<!-- ======= Informacion del Platillo ======= -->
<section id="about" class="about about-padding">
    <div class="container" data-aos="fade-up">
        <?php 
            $CodigoProducto=consultasSQL::clean_string($_GET['CodigoProd']);
            $productoinfo=  ejecutarSQL::consultar("SELECT producto.CodigoProd,producto.NombreProd,producto.Categoria_id,categoria.Categoria,producto.Precio,producto.Descuento,producto.Descripcion,producto.Imagen FROM categoria INNER JOIN producto ON producto.Categoria_id=categoria.id  WHERE CodigoProd='".$CodigoProducto."'");
            while($fila=mysqli_fetch_array($productoinfo, MYSQLI_ASSOC))
            {
                if($fila['Imagen']!="" && is_file("./assets/img/platillos/".$fila['Imagen']))
                {
                    $imagenFile="assets/img/platillos/".$fila['Imagen']; 
                }else{ 
                    $imagenFile="assets/img/platillos/default.png"; 
                }
                ?>
                <div class="row">
                    <div class="col-lg-6 col-md-6 order-1 order-lg-1" data-aos="zoom-in" data-aos-delay="100">
                        <div class="about-img">
                            <img src="<?php echo $imagenFile ?>" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 pt-4 pt-lg-0 order-2 order-lg-2 content">
                        <h3><?php echo $fila['NombreProd'] ?></h3>
                        <h2 class="font-italic">
                            s/.<?php echo ''.number_format(($fila['Precio']-($fila['Precio']*($fila['Descuento']/100))), 2, '.', '').'';?>
                        </h2>
                        <p class="font-italic">
                            <?php echo $fila['Descripcion'] ?>
                        </p>
                        <?php
                            if($_SESSION['adminID']!="" || $_SESSION['userDNI']!="")
                            { ?>
                                    <form action="<?php echo SERVERURL; ?>process/carrito.php" method="POST" class="FormCatElec" data-form="">
                                        <input type="hidden" value="<?php echo $fila['CodigoProd'] ?>" name="codigo">
                                        <p class="text-center text-warning">Agrega la cantidad de productos que añadiras al carrito</p>
                                        <div class="form-group">
                                            <input type="number" class="form-control" value="1" min="1" name="cantidad">
                                        </div>
                                        <div class="text-center">
                                            <button class="btn btn-outline-warning btn-style">Añadir al carrito</button>
                                        </div>
                                    </form>
                                    <div class="ResForm"></div>
                                <?php 
                            }else{
                                ?>
                                <p class="text-center text-warning">Para agregar productos al carrito, primero debes iniciar sesion.</p>
                            
                                <div class="text-center">
                                    <a class="btn btn-outline-warning" type="button" data-toggle="modal" data-target="#login">Iniciar sesión</a>
                                </div>
                                <?php 
                            }
                        ?>
                        <div class="text-center">
                            <a href="platillos.php" class="btn btn-outline-light btn-style">Ir a platillos</a>
                        </div>
                    </div>
                </div>
                <?php
            }
        ?>
    </div>
</section>

<!-- ===== Mas platillos ===== -->
<section class="chefs">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <p>Mas platillos</p>
        </div>
        <div class="row">
            <?php
                $consulta= ejecutarSQL::consultar("SELECT * FROM producto ORDER BY id DESC LIMIT 6");
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
                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="member" data-aos="zoom-in" data-aos-delay="100">
                                <img src="<?php echo $imagenFile ?>" class="img-fluid" alt="">
                                
                                <div class="member-info">
                                    <div class="member-info-content">
                                        <h4><?php echo $fila['NombreProd']; ?></h4>
                                        <?php
                                        if ($fila['Descuento']>0) {
                                            ?>
                                            <span>
                                                <?php
                                                    $pref=number_format($fila['Precio']-($fila['Precio']*($fila['Descuento']/100)), 2, '.', '');
                                                    echo $fila['Descuento']."% descuento: s/.".$pref; 
                                                ?>
                                            </span>
                                            <?php 
                                        }else{
                                            ?>
                                            <span>s/.<?php echo $fila['Precio']; ?></span>
                                            <?php
                                        } ?>
                                    </div>
                                    <div class="social">
                                        <a href="<?php echo SERVERURL; ?>detalle-platillo.php?CodigoProd=<?php echo $fila['CodigoProd']; ?>"><i class="bi bi-plus"></i>&nbsp; Detalles</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }   
                }
            ?> 
        </div>
    </div>
</section>

<?php include './include/footer.php'; ?>
