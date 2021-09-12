<div class="breadcrumbs breadcrumbs-style">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Actualizar cocinero</h2>
            <ol>
                <li><a href="configAdmin.php?view=cocinero">Nuevo cocinero</a></li>
                <li><a href="configAdmin.php?view=cocinero-list">Lista de cocineros</a></li>
            </ol>
        </div>
    </div>
</div>

<div id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">
        <?php
            $code=$_GET['code'];
            $cocinero=ejecutarSQL::consultar("SELECT * FROM cocinero WHERE DNI='$code'");
            $chef=mysqli_fetch_array($cocinero, MYSQLI_ASSOC);
        ?>
        <form action="process/up-cocinero.php" method="POST" class="FormCatElec" data-form="update">
            <div class="php-email-form">
                <input type="hidden" name="dni-chef-old" readonly="" class="form-control" value="<?php echo $chef['DNI']; ?>">
                <div class="form-row">
                    <div class="col-lg-3 col-md-3 form-group">
                        <label>DNI</label>
                        <input class="form-control" value="<?php echo $chef['DNI']; ?>" type="text" name="chef-dni" readonly pattern="[0-9]{1,20}" maxlength="20" required="">
                    </div>
                    <div class="col-lg-4 col-md-4 form-group">
                        <label>Nombre</label>
                        <input class="form-control" type="text" value="<?php echo $chef['Nombre']; ?>" name="chef-nom" maxlength="30" required="">
                    </div>
                    <div class="col-lg-5 col-md-5 form-group">
                        <label>Apellidos</label>
                        <input class="form-control" type="text" value="<?php echo $chef['Apellidos']; ?>" name="chef-ape" maxlength="30" required="">
                    </div>
                    <div class="col-lg-7 col-md-7 form-group">
                        <label>Dirección</label>
                        <input class="form-control" type="text" value="<?php echo $chef['Direccion']; ?>" name="chef-dir" required="">
                    </div>
                    <div class="col-lg-5 col-md-5 form-group">
                        <label>Teléfono</label>
                        <input class="form-control" value="<?php echo $chef['Telefono']; ?>" type="tel" name="chef-tel" pattern="[0-9]{1,20}" maxlength="20" required="">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit">Actualizar</button>
                </div>
            </div>
        </form>
    </div>
</div>