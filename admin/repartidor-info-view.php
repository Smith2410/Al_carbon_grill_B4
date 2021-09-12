<div class="breadcrumbs breadcrumbs-style">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Actualizar repartidor</h2>
            <ol>
                <li><a href="configAdmin.php?view=repartidor">Nuevo repartidor</a></li>
                <li><a href="configAdmin.php?view=repartidor-list">Lista de repartidores</a></li>
            </ol>
        </div>
    </div>
</div>

<div id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">
        <?php
            $code=$_GET['code'];
            $repar=ejecutarSQL::consultar("SELECT * FROM administrador WHERE DNI='$code'");
            $dataRepar=mysqli_fetch_array($repar, MYSQLI_ASSOC);
        ?>
        <form action="./process/up-repartidor.php" method="POST" role="form" class="FormCatElec" data-form="update">
            <div class="php-email-form">
                <div class="form-row">
                    <div class="col-lg-3 col-md-3 form-group">
                        <label>DNI</label>
                        <input class="form-control" type="text" name="repar-dni" value="<?php echo $dataRepar['DNI']; ?>"required="" readonly>
                    </div>
                    <div class="col-lg-4 col-md-4 form-group">
                        <label>Nombre</label>
                        <input class="form-control" type="text" name="repar-nom" value="<?php echo $dataRepar['Nombre']; ?>"required="">
                    </div>
                    <div class="col-lg-5 col-md-5 form-group">
                        <label>Apellidos</label>
                        <input class="form-control" type="text" name="repar-ape" value="<?php echo $dataRepar['Apellidos']; ?>"required="">
                    </div>
                    <div class="col-lg-7 col-md-7 form-group">
                        <label>Dirección</label>
                        <input class="form-control" type="text" name="repar-dir" value="<?php echo $dataRepar['Direccion']; ?>"required="">
                    </div>
                    <div class="col-lg-5 col-md-5 form-group">
                        <label>Teléfono</label>
                        <input class="form-control" type="text" name="repar-tel" value="<?php echo $dataRepar['Telefono']; ?>"required="">
                    </div>
                    <div class="form-group">
                        <p class="text-warning text-center">No es necesario actualizar la contraseña, sin embargo si desea hacerlo debe de ingresar una nueva contraseña y volver a ingresarla.</p>
                    </div>
                    <div class="col-lg-4 col-md-4 form-group">
                        <input class="form-control" type="password" name="repar-old-pass" placeholder="Contraseña actual">
                    </div>
                    <div class="col-lg-4 col-md-4 form-group">
                        <input class="form-control" type="password" name="repar-pass1" placeholder="Nueva contraseña">
                    </div>
                    <div class="col-lg-4 col-md-4 form-group">
                        <input class="form-control" type="password" name="repar-pass2" placeholder="Repita la nueva contraseña">
                    </div>
                    <input type="hidden" name="repar-rol" required="" value="1" readonly="">
                </div>
                <div class="text-center">
                    <button type="submit">Actualizar</button>
                </div>
            </div>
        </form>
    </div>
</div>