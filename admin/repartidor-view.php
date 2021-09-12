<div class="breadcrumbs breadcrumbs-style">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Agregar repartidor</h2>
            <ol>
                <li><a href="configAdmin.php?view=repartidor-list">Lista de repartidores</a></li>
            </ol>
        </div>
    </div>
</div>


<div id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">
        <form action="process/reg-repartidor.php" method="POST" role="form" class="FormCatElec" data-form="save">
            <div class="php-email-form">
                <div class="form-row">
                    <div class="col-lg-3 col-md-3 form-group">
                        <input class="form-control" type="text" name="repar-dni" required="" maxlength="9" minlength="8" placeholder="DNI">
                    </div>
                    <div class="col-lg-4 col-md-4 form-group">
                        <input class="form-control" type="text" name="repar-nom" required="" maxlength="50" minlength="2" placeholder="Nombre">
                    </div>
                    <div class="col-lg-5 col-md-5 form-group">
                        <input class="form-control" type="text" name="repar-ape" required="" maxlength="50" minlength="3" placeholder="Apellidos">
                    </div>
                    <div class="col-lg-7 col-md-7 form-group">
                        <input class="form-control" type="text" name="repar-dir" required="" maxlength="50" minlength="3" placeholder="Dirección">
                    </div>
                    <div class="col-lg-5 col-md-5 form-group">
                        <input class="form-control" type="text" name="repar-tel" required="" maxlength="11" placeholder="Teléfono">
                    </div>
                    <div class="col-lg-6 col-md-6 form-group">
                        <input class="form-control" type="password" name="repar-pass1" required="" maxlength="50" minlength="8" placeholder="Contraseña">
                    </div>
                    <div class="col-lg-6 col-md-6 form-group">
                        <input class="form-control" type="password" name="repar-pass2" required="" maxlength="50" minlength="8" placeholder="Repita contraseña">
                    </div>
                    <input type="hidden" name="repar-rol" required="" value="1" readonly="">
                </div>
                <div class="text-center">
                    <button type="submit">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>