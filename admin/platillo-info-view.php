<div class="breadcrumbs breadcrumbs-style">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Actualizar platillo</h2>
            <ol>
                <li><a href="configAdmin.php?view=platillo">Nuevo platillo</a></li>
                <li><a href="configAdmin.php?view=platillo-list">Lista de platillos</a></li>
            </ol>
        </div>
    </div>
</div>

<div id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">
        <?php
            $code=$_GET['code'];
            $producto=ejecutarSQL::consultar("SELECT * FROM producto WHERE CodigoProd='$code'");
            $prod=mysqli_fetch_array($producto, MYSQLI_ASSOC);
        ?>
        <form action="./process/up-platillo.php" method="POST" enctype="multipart/form-data" class="FormCatElec" data-form="update">
            <div class="php-email-form">
                <div class="form-row">
                    <input type="hidden" class="form-control" value="<?php echo $prod['CodigoProd']; ?>" readonly="" name="code-old-prod">
                    <input type="hidden" class="form-control" value="<?php echo $prod['CodigoProd']; ?>" readonly="" name="prod-codigo">
                    <div class="col-lg-6 col-md-6 form-group">
                        <label class="control-label">Platillo</label>
                        <input type="text" class="form-control" value="<?php echo $prod['NombreProd']; ?>" required maxlength="30" name="prod-name">
                    </div>
                    <div class="col-lg-6 col-md-6 form-group">
                        <label class="control-label">Precio</label>
                        <input type="text" class="form-control" value="<?php echo $prod['Precio']; ?>" required maxlength="20" pattern="[0-9.]{1,20}" name="prod-price">
                    </div>
                </div>
                <div class="form-group">
                    <label>Descripción</label> 
                    <textarea class="form-control" name="prod-descrip" rows="5"><?php echo $prod['Descripcion']; ?></textarea>
                </div>
                <div class="form-row">
                    <div class="col-lg-4 col-md-4 form-group">
                        <label>Categoría</label>
                        <select class="form-control" name="prod-categoria">
                            <?php
                                $categoria=ejecutarSQL::consultar("SELECT * FROM categoria");
                                while($catec=mysqli_fetch_array($categoria, MYSQLI_ASSOC)){
                                    if($prod['Categoria_id']==$catec['id']){
                                        echo '<option selected="" value="'.$catec['id'].'">'.$catec['Categoria'].' (Actual)</option>';
                                    }else{
                                        echo '<option value="'.$catec['id'].'">'.$catec['Categoria'].'</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-8 col-md-8 form-row">
                        <div class="col-lg-5 col-md-5 form-group">
                            <label>Imagen</label>
                             <input class="form-control" type="file" name="img">
                            <small>Formato .png y .jpg tamaño max 5MB.</small>
                        </div>
                        <div class="col-lg-7 col-md-7 form-group">
                            <label>Información</label>
                            <p>Las imagenes se veran mejor si son de las mismas dimenciones. <small class="text-warning">Ej: Una imagen con las dimenciones de 500px * 500px.</small></p>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn book-a-table-btn">Actualizar</button>
                </div>
            </div>
        </form>
    </div>
</div>