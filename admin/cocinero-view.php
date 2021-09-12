<div class="breadcrumbs breadcrumbs-style">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Agregar cocinero</h2>
            <ol>
                <li><a href="configAdmin.php?view=cocinero-list">Lista de cocineros</a></li>
            </ol>
        </div>
    </div>
</div>

<div id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">
        <form action="process/reg-cocinero.php" method="POST" class="FormCatElec" data-form="save">
            <div class="php-email-form">
                <div class="form-row">
                    <div class="col-lg-3 col-md-3 form-group">
                        <input class="form-control" type="text" name="chef-dni" maxlength="10" minlength="8" required="" placeholder="Numero de DNI">
                    </div>
                    <div class="col-lg-4 col-md-4 form-group">
                        <input class="form-control" type="text" name="chef-nom" maxlength="50" minlength="3" required="" placeholder="Nombre">
                    </div>
                    <div class="col-lg-5 col-md-5 form-group">
                        <input class="form-control" type="text" name="chef-ape" maxlength="50" minlength="3" required="" placeholder="Apellidos">
                    </div>
                    <div class="col-lg-7 col-md-7 form-group">
                        <input class="form-control" type="tel" name="chef-tel" maxlength="11" required="" minlength="9" placeholder="Teléfono">
                    </div>
                    <div class="col-lg-5 col-md-5 form-group">
                        <input class="form-control" type="text" name="chef-dir" required="" maxlength="50" minlength="3" placeholder="Dirección">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>