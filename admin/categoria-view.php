<div class="breadcrumbs breadcrumbs-style">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Agregar categoría</h2>
            <ol>
                <li><a href="configAdmin.php?view=categoria-list">Lista de categorias</a></li>
            </ol>
        </div>
    </div>
</div>

<div id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">
        <form action="process/reg-categoria.php" method="POST" class="FormCatElec" data-form="save">
            <div class="php-email-form">
                <div class="form-row">
                    <div class="col-lg-12 col-md-12 form-group">
                        <input class="form-control" type="text" name="categ-name" maxlength="30" required="" placeholder="Nombre de la categoría">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>