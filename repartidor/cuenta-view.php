<div class="breadcrumbs breadcrumbs-style">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Actualizar mi cuenta</h2>
        </div>
    </div>
</div>

<div id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">
        <?php
            $admin=ejecutarSQL::consultar("SELECT * FROM administrador WHERE DNI='".$_SESSION['adminID']."'");
            $dataAdmin=mysqli_fetch_array($admin, MYSQLI_ASSOC);
        ?>
        <form action="./process/up-administrador.php" method="POST" role="form" class="FormCatElec" data-form="update">
            <div class="php-email-form">
                <input type="hidden" readonly="" class="form-control" name="admin-code" value="<?php echo $_SESSION['adminID']; ?>">
                <div class="form-row">
                    <div class="col-lg-3 col-md-3 form-group">
                        <label>DNI</label>
                        <input class="form-control" type="text" name="admin-dni" value="<?php echo $dataAdmin['DNI']; ?>"required="" readonly="">
                    </div>
                    <div class="col-lg-4 col-md-4 form-group">
                        <label>Nombre</label>
                        <input class="form-control" type="text" name="admin-nom" value="<?php echo $dataAdmin['Nombre']; ?>"required="">
                    </div>
                    <div class="col-lg-5 col-md-5 form-group">
                        <label>Apellidos</label>
                        <input class="form-control" type="text" name="admin-ape" value="<?php echo $dataAdmin['Apellidos']; ?>"required="">
                    </div>
                    <div class="col-lg-7 col-md-7 form-group">
                        <label>Dirección</label>
                        <input class="form-control" type="text" name="admin-dir" value="<?php echo $dataAdmin['Direccion']; ?>"required="">
                    </div>
                    <div class="col-lg-5 col-md-5 form-group">
                        <label>Teléfono</label>
                        <input class="form-control" type="text" name="admin-tel" value="<?php echo $dataAdmin['Telefono']; ?>"required="">
                    </div>
                    <div class="form-group">
                        <p class="text-warning text-center">No es necesario actualizar la contraseña, sin embargo si desea hacerlo debe de ingresar una nueva contraseña y volver a ingresarla.</p>
                    </div>
                    <div class="col-lg-4 col-md-4 form-group">
                        <input class="form-control" type="password" name="admin-old-pass" required="" placeholder="Contraseña actual">
                    </div>
                    <div class="col-lg-4 col-md-4 form-group">
                        <input class="form-control" type="password" name="admin-pass1" required="" placeholder="Nueva contraseña">
                    </div>
                    <div class="col-lg-4 col-md-4 form-group">
                        <input class="form-control" type="password" name="admin-pass2" required="" placeholder="Repita la nueva contraseña">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit">Actualizar</button>
                </div>
            </div>
        </form>
    </div>
</div>