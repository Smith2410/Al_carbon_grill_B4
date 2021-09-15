<div class="breadcrumbs breadcrumbs-style">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Actualizar usuario</h2>
            <ol>
                <li><a href="configAdmin.php?view=administrador">Nuevo usuario</a></li>
                <li><a href="configAdmin.php?view=administrador-list">Lista de administradores</a></li>
                <li><a href="configAdmin.php?view=repartidor-list">Lista de repartidores</a></li>
            </ol>
        </div>
    </div>
</div>

<div id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">
        <?php
            $code=$_GET['code'];
            $admin=ejecutarSQL::consultar("SELECT * FROM administrador WHERE DNI='$code'");
            $data=mysqli_fetch_array($admin, MYSQLI_ASSOC);
        ?>
        <form action="./process/up-administrador.php" method="POST" role="form" class="FormCatElec" data-form="update">
            <div class="php-email-form">
                <div class="form-row">
                    <div class="col-lg-3 col-md-3 form-group">
                        <label>DNI</label>
                        <input class="form-control" type="text" name="admin-dni" value="<?php echo $data['DNI']; ?>"required="" readonly>
                    </div>
                    <div class="col-lg-4 col-md-4 form-group">
                        <label>Nombre</label>
                        <input class="form-control" type="text" name="admin-nom" value="<?php echo $data['Nombre']; ?>"required="">
                    </div>
                    <div class="col-lg-5 col-md-5 form-group">
                        <label>Apellidos</label>
                        <input class="form-control" type="text" name="admin-ape" value="<?php echo $data['Apellidos']; ?>"required="">
                    </div>
                    <div class="col-lg-3 col-md-3 form-group">
                        <label>Rol</label>
                        <select name="admin-rol" required="" class="form-control">
                            <?php 
                            if ($data['rol']==0) {
                                ?>
                                <option value="0">Administrador (Actual)</option>
                                <option value="1">Repartidor</option>
                                <?php
                            }else{?>
                                <option value="1">Repartidor (Actual)</option>
                                <option value="0">Administrador</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-5 col-md-5 form-group">
                        <label>Dirección</label>
                        <input class="form-control" type="text" name="admin-dir" value="<?php echo $data['Direccion']; ?>"required="">
                    </div>
                    <div class="col-lg-4 col-md-4 form-group">
                        <label>Teléfono</label>
                        <input class="form-control" type="text" name="admin-tel" value="<?php echo $data['Telefono']; ?>"required="">
                    </div>
                    <div class="form-group">
                        <p class="text-warning text-center">No es necesario actualizar la contraseña, sin embargo si desea hacerlo debe de ingresar una nueva contraseña y volver a ingresarla.</p>
                    </div>
                    <div class="col-lg-4 col-md-4 form-group">
                        <input class="form-control" type="password" name="admin-old-pass" placeholder="Contraseña actual">
                    </div>
                    <div class="col-lg-4 col-md-4 form-group">
                        <input class="form-control" type="password" name="admin-pass1" placeholder="Nueva contraseña">
                    </div>
                    <div class="col-lg-4 col-md-4 form-group">
                        <input class="form-control" type="password" name="admin-pass2" placeholder="Repita la nueva contraseña">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit">Actualizar</button>
                </div>
            </div>
        </form>
    </div>
</div>