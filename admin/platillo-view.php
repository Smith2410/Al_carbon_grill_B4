<div class="breadcrumbs breadcrumbs-style">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Agregar platillo</h2>
            <ol>
                <li>
                    <a href="configAdmin.php?view=platillo-list">Lista de platillos</a>
                </li>
            </ol>
        </div>
    </div>
</div>

<div id="book-a-table" class="book-a-table">
    <div class="container">
        <form action="./process/reg-platillo.php" method="POST" enctype="multipart/form-data" class="FormCatElec" data-form="save">
            <div class="php-email-form">
                <div class="form-row">
                    <?php
                        $codigoproduct = substr( md5(microtime()), 1, 5);
                    ?>
                    <input type="hidden" class="form-control" name="prod-codigo" value="<?php echo $codigoproduct; ?>">

                    <div class="col-lg-6 col-md-6 form-group">
                        <input type="text" class="form-control" required="" name="prod-name" placeholder="Nombre del platillo">
                    </div>

                    <div class="col-lg-3 col-md-3 form-group">
                        <input type="text" class="form-control" required="" pattern="[0-9.]{1,20}" name="prod-price" placeholder="Precio del platillo">
                    </div>

                    <div class="col-lg-3 col-md-3 form-group">
                        <input type="text" class="form-control" required="" maxlength="2" pattern="[0-9]{1,2}" name="prod-desc-price" value="0" placeholder="Descuento del platillo en (%)">
                    </div>
                </div>
                <div class="form-group">
                    <textarea type="text" class="form-control" name="prod-descrip" rows="5" placeholder="Descripción del platillo"></textarea>
                    <div class="validate"></div>
                </div>
                <div class="form-row">
                    <div class="col-lg-6 col-md-6 form-group">
                        <select class="form-control" name="prod-categoria">
                            <?php
                                $categoriac= ejecutarSQL::consultar("SELECT * FROM categoria");
                                while($catec=mysqli_fetch_array($categoriac, MYSQLI_ASSOC)){
                                    echo '<option value="'.$catec['id'].'">'.$catec['Categoria'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-6 col-md-6 form-group">
                        <select class="form-control" name="prod-codigo-chef">
                            <?php
                                $cocinerosc=  ejecutarSQL::consultar("SELECT * FROM cocinero");
                                while($provc=mysqli_fetch_array($cocinerosc, MYSQLI_ASSOC)){
                                    echo '<option value="'.$provc['DNI'].'">'.$provc['Nombre']." ".$provc['Apellidos'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-12 col-md-12 form-row">
                        <div class="col-lg-6 col-md-6">
                            <input class="form-control" type="file" name="img">
                            <small>Formato de imágenes admitido png y jpg. Tamaño máximo 5MB.</small>
                        </div>
                        <div class="col-lg-6 col-md-6 row">
                            <div class="col-lg-3 text-center">
                                <i class="icofont-info-circle" style="font-size: 80px;"></i>
                            </div>
                            <div class="col-lg-9">
                                <p>Las imagenes se veran mejor si son de las mismas dimenciones. <small class="text-warning">Ej: Una imagen con las dimenciones de 500px * 500px.</small></p>
                            </div>
                        </div>
                    </div>        
                </div>
                <div class="text-center">
                    <button type="submit" class="btn book-a-table-btn">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>