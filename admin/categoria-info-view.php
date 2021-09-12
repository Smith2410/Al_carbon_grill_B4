<div class="breadcrumbs breadcrumbs-style">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Actualizar categoría</h2>
            <ol>
                <li><a href="configAdmin.php?view=categoria">Nueva categoría</a></li>
                <li><a href="configAdmin.php?view=categoria-list">Lista de categorías</a></li>
            </ol>
        </div>
    </div>
</div>

<div id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">
        <?php
            $code=$_GET['code'];
            $categoria=ejecutarSQL::consultar("SELECT * FROM categoria WHERE id='$code'");
            $cate=mysqli_fetch_array($categoria, MYSQLI_ASSOC);
        ?>
        <form action="./process/up-categoria.php" method="POST" class="FormCatElec" data-form="update">
            <div class="php-email-form">
                <div class="form-row">
                    <div class="col-lg-6 col-md-6 form-group">
                        <label>ID</label>
                        <input class="form-control" type="text" value="<?php echo $cate['id']; ?>" name="categ-id" readonly>
                    </div>
                    <div class="col-lg-6 col-md-6 form-group">
                        <label>Nombre de la categoría</label>
                        <input class="form-control" value="<?php echo $cate['Categoria']; ?>" type="text" name="categ-name" maxlength="30" required="">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit">Actualizar</button>
                </div>
            </div>
        </form>
    </div>
</div>